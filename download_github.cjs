const https = require('https');
const fs = require('fs');
const path = require('path');

const dir = path.join(__dirname, 'public', 'audio', 'tour');
if (!fs.existsSync(dir)) {
    fs.mkdirSync(dir, { recursive: true });
}

const animals = ['chimpanzee', 'elephant', 'penguin', 'tiger', 'leopard', 'gorilla', 'underwater', 'macaw', 'bear', 'komodo'];

async function searchGithub(query) {
    return new Promise((resolve) => {
        const options = {
            hostname: 'api.github.com',
            path: `/search/code?q=${query}+in:path+extension:mp3`,
            headers: { 'User-Agent': 'VirtualZooBot/1.0' }
        };
        https.get(options, (res) => {
            let data = '';
            res.on('data', chunk => data += chunk);
            res.on('end', () => {
                if(res.statusCode === 403) {
                    return resolve(null); // Rate limited
                }
                try {
                    const json = JSON.parse(data);
                    if (json.items && json.items.length > 0) {
                        const item = json.items[0];
                        // Convert to raw.githubusercontent.com URL
                        const rawUrl = `https://raw.githubusercontent.com/${item.repository.full_name}/master/${item.path}`;
                        resolve(rawUrl);
                    } else {
                        resolve(null);
                    }
                } catch(e) { resolve(null); }
            });
        }).on('error', () => resolve(null));
    });
}

function downloadFile(url, dest) {
    return new Promise((resolve, reject) => {
        const file = fs.createWriteStream(dest);
        https.get(url, (response) => {
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
    for (const animal of animals) {
        console.log(`Searching GitHub for ${animal}.mp3...`);
        const url = await searchGithub(animal);
        if (url) {
            console.log(`Found! Downloading ${url}...`);
            const dest = path.join(dir, `${animal}.mp3`);
            try {
                await downloadFile(url, dest);
                console.log(`Saved ${animal}.mp3`);
            } catch(e) { console.error(`Failed to download: ${e.message}`); }
        } else {
            console.log(`Could not find ${animal}.mp3 on GitHub.`);
        }
        await new Promise(r => setTimeout(r, 2500)); // Be gentle with API
    }
}
run();
