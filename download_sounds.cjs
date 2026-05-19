const https = require('https');
const fs = require('fs');
const path = require('path');

const dir = path.join(__dirname, 'public', 'audio', 'tour');
if (!fs.existsSync(dir)) {
    fs.mkdirSync(dir, { recursive: true });
}

const sounds = {
    'chimp': 'https://upload.wikimedia.org/wikipedia/commons/e/ec/Chimpanzee_sounds.ogg',
    'elephant': 'https://upload.wikimedia.org/wikipedia/commons/0/05/Elephant_trumpet.ogg',
    'penguin': 'https://upload.wikimedia.org/wikipedia/commons/2/2d/Emperor_Penguin_calls.ogg',
    'tiger': 'https://upload.wikimedia.org/wikipedia/commons/8/87/Tiger_roaring.ogg',
    'leopard': 'https://upload.wikimedia.org/wikipedia/commons/e/e9/Snow_Leopard_Growl.ogg',
    'gorilla': 'https://upload.wikimedia.org/wikipedia/commons/a/a2/Gorilla_chest_beat.ogg',
    'shark': 'https://upload.wikimedia.org/wikipedia/commons/9/91/Underwater_soundscape.ogg',
    'macaw': 'https://upload.wikimedia.org/wikipedia/commons/6/6f/Scarlet_Macaw.ogg',
    'bear': 'https://upload.wikimedia.org/wikipedia/commons/2/23/Grizzlybear55.ogg',
    'komodo': 'https://upload.wikimedia.org/wikipedia/commons/3/36/Wind_in_trees.ogg'
};

function downloadFile(url, dest) {
    return new Promise((resolve, reject) => {
        const file = fs.createWriteStream(dest);
        const options = {
            headers: { 
                'User-Agent': 'VirtualZooBot/1.0 (https://virtualzoo.local; dev@virtualzoo.local)' 
            }
        };
        https.get(url, options, (response) => {
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

const sleep = ms => new Promise(r => setTimeout(r, ms));

async function run() {
    for (const [name, url] of Object.entries(sounds)) {
        const dest = path.join(dir, `${name}.ogg`);
        console.log(`Downloading ${name}.ogg...`);
        try {
            await downloadFile(url, dest);
            console.log(`Successfully downloaded ${name}.ogg`);
        } catch (e) {
            console.error(`Failed to download ${name}: ${e.message}`);
        }
        await sleep(1000); // 1 second delay to avoid rate limits
    }
    console.log("All downloads complete.");
}

run();
