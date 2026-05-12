import './bootstrap';
import * as bootstrap from 'bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    // Navbar Scroll Effect
    const navbar = document.querySelector('.navbar-minimal');
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }

    // Dynamic Parallax on Mouse Move
    const scenes = document.querySelectorAll('.scene-section');
    scenes.forEach(scene => {
        scene.addEventListener('mousemove', (e) => {
            const x = (window.innerWidth / 2 - e.pageX) / 50;
            const y = (window.innerHeight / 2 - e.pageY) / 50;
            
            const bg = scene.querySelector('.scene-bg');
            if (bg) {
                bg.style.transform = `translate(${x}px, ${y}px) scale(1.05)`;
                bg.style.transition = 'transform 0.1s ease-out';
            }

            const lightShafts = scene.querySelectorAll('.light-shaft');
            lightShafts.forEach(shaft => {
                shaft.style.transform = `rotate(15deg) translate(${x * 2}px, ${y * 2}px)`;
            });
        });

        // Reset on mouse leave
        scene.addEventListener('mouseleave', () => {
            const bg = scene.querySelector('.scene-bg');
            if (bg) {
                bg.style.transform = `translate(0px, 0px) scale(1)`;
                bg.style.transition = 'transform 0.5s ease-out';
            }
            
            const lightShafts = scene.querySelectorAll('.light-shaft');
            lightShafts.forEach(shaft => {
                shaft.style.transform = `rotate(15deg) translate(0px, 0px)`;
                shaft.style.transition = 'transform 0.5s ease-out';
            });
        });
    });

    // Add ambient particles dynamically to the first hero scene
    const heroScene = document.querySelector('.scene-section');
    if (heroScene) {
        for(let i = 0; i < 30; i++) {
            let particle = document.createElement('div');
            particle.classList.add('floating-particle');
            
            // Randomize properties
            const size = Math.random() * 4 + 2;
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.top = `${Math.random() * 100}%`;
            particle.style.animationDuration = `${Math.random() * 15 + 8}s`;
            particle.style.animationDelay = `-${Math.random() * 10}s`;
            particle.style.opacity = Math.random() * 0.5 + 0.1;
            
            heroScene.appendChild(particle);
        }
    }

    // Counter animation logic
    const counters = document.querySelectorAll('.counter-value');
    if (counters.length > 0) {
        const speed = 100; // The lower the slower
        
        const animateCounters = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = +counter.getAttribute('data-target');
                    const updateCount = () => {
                        const count = +counter.innerText;
                        const inc = target / speed;
                        
                        if (count < target) {
                            counter.innerText = Math.ceil(count + inc);
                            setTimeout(updateCount, 15);
                        } else {
                            counter.innerText = target + (target > 10 ? '+' : '');
                        }
                    };
                    updateCount();
                    observer.unobserve(counter); // only animate once
                }
            });
        };
        
        const counterObserver = new IntersectionObserver(animateCounters, {
            threshold: 0.5
        });
        
        counters.forEach(counter => {
            counterObserver.observe(counter);
        });
    }
});
