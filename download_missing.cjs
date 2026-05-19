const puppeteer = require('puppeteer');
const https = require('https');
const fs = require('fs');
const path = require('path');

const dir = path.join(__dirname, 'public', 'audio', 'tour');

const queries = [
    { name: 'chimp', query: 'chimpanzee' },
    { name: 'elephant', query: 'elephant trumpet' },
    { name: 'leopard', query: 'leopard' },
    { name: 'gorilla', query: 'gorilla' },
    { name: 'komodo', query: 'desert wind' }
];

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

(async () => {
    console.log("Launching Freesound Scraper for missing files...");
    const browser = await puppeteer.launch({ 
        headless: "new",
        args: ['--no-sandbox', '--disable-setuid-sandbox']
    });
    const page = await browser.newPage();
    
    await page.setUserAgent('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');

    for (const item of queries) {
        console.log(`Searching Freesound for: ${item.query}`);
        const dest = path.join(dir, `${item.name}.mp3`);
        
        try {
            await page.goto(`https://freesound.org/search/?q=${encodeURIComponent(item.query)}&f=duration%3A%5B0+TO+30%5D`, { waitUntil: 'domcontentloaded', timeout: 30000 });
            
            const audioUrl = await page.evaluate(() => {
                const links = Array.from(document.querySelectorAll('a[href$="-lq.mp3"], source[src$="-lq.mp3"], [data-mp3]'));
                if (links.length > 0) {
                    return links[0].getAttribute('href') || links[0].getAttribute('src') || links[0].getAttribute('data-mp3');
                }
                const html = document.body.innerHTML;
                const match = html.match(/https:\/\/cdn\.freesound\.org\/previews\/[0-9]+\/[0-9]+_[0-9]+-lq\.mp3/);
                return match ? match[0] : null;
            });
            
            if (audioUrl) {
                console.log(`Found audio URL for ${item.name}: ${audioUrl}`);
                await downloadFile(audioUrl, dest);
                console.log(`Saved ${item.name}.mp3`);
            } else {
                console.log(`No audio found for ${item.name}`);
            }
        } catch (e) {
            console.error(`Error processing ${item.name}: ${e.message}`);
        }
        await new Promise(r => setTimeout(r, 2000));
    }
    
    await browser.close();
    console.log("Done missing.");
})();
