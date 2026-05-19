const https = require('https');

const urls = [
    'https://actions.google.com/sounds/v1/animals/gorilla.ogg',
    'https://actions.google.com/sounds/v1/animals/monkey_chatter.ogg',
    'https://actions.google.com/sounds/v1/animals/leopard.ogg',
    'https://actions.google.com/sounds/v1/animals/lion_roar.ogg',
    'https://actions.google.com/sounds/v1/animals/penguin.ogg',
    'https://actions.google.com/sounds/v1/animals/snake_hiss.ogg',
    'https://actions.google.com/sounds/v1/animals/hiss.ogg',
    'https://actions.google.com/sounds/v1/animals/alligator_hiss.ogg',
    'https://actions.google.com/sounds/v1/water/underwater.ogg'
];

async function checkUrl(url) {
    return new Promise((resolve) => {
        https.request(url, { method: 'HEAD' }, (res) => {
            resolve(`${url} -> ${res.statusCode}`);
        }).on('error', () => resolve(`${url} -> ERROR`)).end();
    });
}

async function run() {
    for (const url of urls) {
        console.log(await checkUrl(url));
    }
}
run();
