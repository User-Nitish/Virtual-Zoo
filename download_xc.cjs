const https = require('https');
const fs = require('fs');
const path = require('path');

const dir = path.join(__dirname, 'public', 'audio', 'tour');
if (!fs.existsSync(dir)) {
    fs.mkdirSync(dir, { recursive: true });
}

const queries = {
    'chimp': 'Chimpanzee',
    'elephant': 'Elephant',
    'penguin': 'Emperor Penguin',
    'tiger': 'Tiger',
    'leopard': 'Snow Leopard',
    'gorilla': 'Gorilla',
    'shark': 'Whale', // Sharks don't make noise, whale is good ocean sound
    'macaw': 'Scarlet Macaw',
    'bear': 'Brown Bear',
    'komodo': 'Dragon' // Just testing
};

function fetchJson(url) {
    return new Promise((resolve, reject) => {
        https.get(url, { headers: { 'User-Agent': 'VirtualZooBot/1.0' } }, (res) => {
            let data = '';
            res.on('data', chunk => data += chunk);
            res.on('end', () => resolve(JSON.parse(data)));
        }).on('error', reject);
    });
}

function downloadFile(url, dest) {
    return new Promise((resolve, reject) => {
        const file = fs.createWriteStream(dest);
        https.get(url, { headers: { 'User-Agent': 'VirtualZooBot/1.0' } }, (response) => {
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
    for (const [name, q] of Object.entries(queries)) {
        console.log(`Searching Xeno-canto for ${q}...`);
        try {
            const api = `https://xeno-canto.org/api/2/recordings?query=${encodeURIComponent(q)}`;
            const data = await fetchJson(api);
            if (data.recordings && data.recordings.length > 0) {
                const rec = data.recordings[0];
                let fileUrl = rec.file;
                if(fileUrl.startsWith('//')) fileUrl = 'https:' + fileUrl;
                
                const dest = path.join(dir, `${name}.mp3`);
                console.log(`Downloading ${fileUrl} to ${name}.mp3...`);
                await downloadFile(fileUrl, dest);
                console.log(`Successfully downloaded ${name}.mp3`);
            } else {
                console.log(`No recordings found for ${q}`);
            }
        } catch (e) {
            console.error(`Failed on ${name}: ${e.message}`);
        }
        await new Promise(r => setTimeout(r, 1000));
    }
    console.log("All downloads complete.");
}

run();
