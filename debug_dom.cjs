const puppeteer = require('puppeteer');

(async () => {
    const browser = await puppeteer.launch({ headless: "new" });
    const page = await browser.newPage();
    
    await page.setViewport({ width: 1280, height: 800 });
    
    console.log("Navigating to tour page...");
    await page.goto('http://127.0.0.1:8000/tour', { waitUntil: 'networkidle2' });
    
    console.log("Clicking Enter Journey to dismiss preloader...");
    await page.waitForSelector('#enter-btn', { visible: true });
    await page.click('#enter-btn');
    
    // Wait for GSAP preloader animation to finish (1.2s duration)
    await new Promise(r => setTimeout(r, 2000));
    
    // Check .nav-return element
    const navReturnCoords = await page.evaluate(() => {
        const el = document.querySelector('.nav-return');
        if (!el) return null;
        const rect = el.getBoundingClientRect();
        return { x: rect.left + rect.width / 2, y: rect.top + rect.height / 2 };
    });
    
    if (navReturnCoords) {
        const blockingNavReturn = await page.evaluate(({ x, y }) => {
            const el = document.elementFromPoint(x, y);
            return el ? { tag: el.tagName, id: el.id, className: el.className, style: el.getAttribute('style') } : null;
        }, navReturnCoords);
        console.log("Element blocking .nav-return at", navReturnCoords, ":", blockingNavReturn);
    }
    
    // Scroll a little bit to trigger GSAP
    await page.evaluate(() => window.scrollBy(0, 100));
    await new Promise(r => setTimeout(r, 500));
    
    // Check #chapter-1 .panorama-btn
    const btnCoords = await page.evaluate(() => {
        const el = document.querySelector('#chapter-1 .panorama-btn');
        if (!el) return null;
        const rect = el.getBoundingClientRect();
        return { x: rect.left + rect.width / 2, y: rect.top + rect.height / 2 };
    });
    
    if (btnCoords) {
        const blockingBtn = await page.evaluate(({ x, y }) => {
            const el = document.elementFromPoint(x, y);
            return el ? { tag: el.tagName, id: el.id, className: el.className, style: el.getAttribute('style') } : null;
        }, btnCoords);
        console.log("Element blocking #chapter-1 .panorama-btn at", btnCoords, ":", blockingBtn);
    }

    await browser.close();
})();
