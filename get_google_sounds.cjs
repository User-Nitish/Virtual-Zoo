const https = require('https');

https.get('https://developers.google.com/assistant/tools/sound-library/animals', (res) => {
    let data = '';
    res.on('data', chunk => data += chunk);
    res.on('end', () => {
        const matches = data.match(/https:\/\/actions\.google\.com\/sounds\/v1\/animals\/[^"']+\.ogg/g);
        if (matches) {
            console.log(Array.from(new Set(matches)).join('\n'));
        } else {
            console.log("No animal sounds found on the page.");
        }
    });
});
