const https = require('https');
const fs = require('fs');
const path = require('path');

const dir = path.join(__dirname, 'public', 'audio', 'tour');
if (!fs.existsSync(dir)) {
    fs.mkdirSync(dir, { recursive: true });
}

// Exact file names on Wikimedia Commons
const files = {
    'chimp': 'File:Chimpanzee_sounds.ogg',
    'elephant': 'File:Elephant_trumpet.ogg',
    'penguin': 'File:Emperor_Penguin_calls.ogg',
    'tiger': 'File:Tiger_roaring.ogg',
    'leopard': 'File:Snow_Leopard_Growl.ogg',
    'gorilla': 'File:Gorilla_chest_beat.ogg',
    'shark': 'File:Underwater_soundscape.ogg',
    'macaw': 'File:Scarlet_Macaw.ogg',
    'bear': 'File:Grizzlybear55.ogg',
    'komodo': 'File:Wind_in_trees.ogg' // komodos don't really make noise, wind is fine
};

function fetchJson(url) {
    return new Promise((resolve, reject) => {
        https.get(url, { headers: { 'User-Agent': 'VirtualZooBot/1.0 (test@example.com)' } }, (res) => {
            let data = '';
            res.on('data', chunk => data += chunk);
            res.on('end', () => resolve(JSON.parse(data)));
        }).on('error', reject);
    });
}

function downloadFile(url, dest) {
    return new Promise((resolve, reject) => {
        const file = fs.createWriteStream(dest);
        const req = https.get(url, { headers: { 'User-Agent': 'VirtualZooBot/1.0 (test@example.com)' } }, (response) => {
            if (response.statusCode === 301 || response.statusCode === 302) {
                return downloadFile(response.headers.location, dest).then(resolve).catch(reject);
            }
            if (response.statusCode !== 200) {
                return reject(new Error('Status code: ' + response.statusCode));
            }
            response.pipe(file);
            file.on('finish', () => {
                file.close(resolve);
            });
        }).on('error', err => {
            fs.unlink(dest, () => reject(err));
        });
    });
}

async function run() {
    for (const [name, filename] of Object.entries(files)) {
        console.log(`Resolving URL for ${name}...`);
        try {
            const api = `https://commons.wikimedia.org/w/api.php?action=query&titles=${encodeURIComponent(filename)}&prop=imageinfo&iiprop=url&format=json`;
            const data = await fetchJson(api);
            const pages = data.query.pages;
            const pageId = Object.keys(pages)[0];
            
            if (pages[pageId].imageinfo && pages[pageId].imageinfo.length > 0) {
                const url = pages[pageId].imageinfo[0].url;
                const dest = path.join(dir, `${name}.ogg`);
                console.log(`Downloading ${url} to ${name}.ogg...`);
                await downloadFile(url, dest);
                console.log(`Successfully downloaded ${name}.ogg`);
            } else {
                console.log(`Could not resolve URL for ${filename}`);
            }
        } catch (e) {
            console.error(`Failed on ${name}: ${e.message}`);
        }
        await new Promise(r => setTimeout(r, 1000));
    }
    console.log("All downloads complete.");
}

run();
