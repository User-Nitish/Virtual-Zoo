const https = require('https');
const fs = require('fs');
const path = require('path');

const dir = path.join(__dirname, 'public', 'audio', 'tour');
if (!fs.existsSync(dir)) {
    fs.mkdirSync(dir, { recursive: true });
}

// Highly reliable hardcoded Freesound Preview URLs
const sounds = {
    'chimp': 'https://cdn.freesound.org/previews/415/415510_758593-lq.mp3',
    'elephant': 'https://cdn.freesound.org/previews/339/339326_5121236-lq.mp3',
    'penguin': 'https://cdn.freesound.org/previews/140/140660_2437358-lq.mp3',
    'tiger': 'https://cdn.freesound.org/previews/119/119106_2112448-lq.mp3',
    'leopard': 'https://cdn.freesound.org/previews/204/204289_2004245-lq.mp3',
    'gorilla': 'https://cdn.freesound.org/previews/192/192251_3500201-lq.mp3',
    'shark': 'https://cdn.freesound.org/previews/264/264566_4545226-lq.mp3',
    'macaw': 'https://cdn.freesound.org/previews/351/351662_6304675-lq.mp3',
    'bear': 'https://cdn.freesound.org/previews/415/415494_758593-lq.mp3',
    'komodo': 'https://cdn.freesound.org/previews/376/376662_6919248-lq.mp3'
};

function downloadFile(url, dest) {
    return new Promise((resolve, reject) => {
        const file = fs.createWriteStream(dest);
        const options = {
            headers: { 
                'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
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

async function run() {
    for (const [name, url] of Object.entries(sounds)) {
        const dest = path.join(dir, `${name}.mp3`);
        console.log(`Downloading ${name}.mp3...`);
        try {
            await downloadFile(url, dest);
            console.log(`Successfully downloaded ${name}.mp3`);
        } catch (e) {
            console.error(`Failed to download ${name}: ${e.message}`);
        }
    }
    console.log("All downloads complete.");
}

run();
