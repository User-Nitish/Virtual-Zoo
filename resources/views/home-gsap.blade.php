<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Zoo - Immersive Experience</title>
    
    <!-- Tailwind CSS (via CDN as requested, structured for Vite workflow) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #050505;
            color: #ffffff;
            overflow-x: hidden;
            margin: 0;
        }

        /* Hide scrollbar for seamless cinematic experience */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #000;
        }
        ::-webkit-scrollbar-thumb {
            background: #333;
            border-radius: 4px;
        }

        /* Habitat Sections */
        .habitat-section {
            height: 100vh;
            width: 100vw;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .habitat-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            z-index: 1;
            /* Scale up slightly to allow room for scrub scale-down effects */
            transform: scale(1.1); 
        }

        /* Habitat specific overlays */
        .habitat-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
        }

        .habitat-content {
            position: relative;
            z-index: 10;
            width: 100%;
        }

        /* Elements to animate (hidden by default to prevent FOUC) */
        .anim-title, .anim-card, .anim-desc {
            opacity: 0;
            visibility: hidden;
        }

        .scrub-element {
            position: absolute;
            z-index: 5;
            pointer-events: none;
        }
    </style>
</head>
<body class="antialiased">

    <!-- 1. HERO SECTION -->
    <section class="h-screen w-full flex flex-col items-center justify-center relative overflow-hidden" id="hero">
        <!-- Hero Background Parallax -->
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1549480017-d76466a4b8e8?q=80&w=2000&auto=format&fit=crop')] bg-cover bg-center" id="hero-bg"></div>
        <div class="absolute inset-0 bg-black/60"></div>
        
        <div class="relative z-10 text-center px-4">
            <h1 class="text-6xl md:text-8xl font-extrabold tracking-tighter mb-4 text-transparent bg-clip-text bg-gradient-to-b from-white to-gray-500" id="hero-title">Virtual Zoo</h1>
            <p class="text-xl md:text-2xl text-gray-300 font-light max-w-2xl mx-auto" id="hero-subtitle">An immersive scrolling journey into the wild.</p>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex flex-col items-center animate-bounce" id="scroll-indicator">
            <span class="text-sm uppercase tracking-widest text-gray-400 mb-2">Scroll to Enter</span>
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
        </div>
    </section>

    <!-- HABITATS CONTAINER -->
    <div id="habitats-wrapper">
        
        <!-- 2. THE SAVANNA -->
        <section class="habitat-section" id="savanna">
            <div class="habitat-bg" style="background-image: url('https://images.unsplash.com/photo-1516426122078-c23e76319801?q=80&w=2000&auto=format&fit=crop');"></div>
            <div class="habitat-overlay bg-gradient-to-r from-black/80 to-black/20"></div>
            
            <div class="habitat-content container mx-auto px-6 md:px-12">
                <div class="max-w-2xl">
                    <span class="anim-title text-yellow-500 font-bold tracking-[0.3em] uppercase text-sm mb-2 block">Habitat 01</span>
                    <h2 class="anim-title text-5xl md:text-7xl font-extrabold mb-6">The Savanna</h2>
                    <p class="anim-desc text-lg text-gray-300 mb-10 leading-relaxed">Experience the vast, golden plains where majestic herds roam under the endless sun.</p>
                    
                    <div class="anim-card bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl w-full md:w-96 shadow-2xl">
                        <h3 class="text-2xl font-bold text-white mb-2">African Elephant</h3>
                        <p class="text-gray-400 text-sm mb-4">The gentle giants of the plains, moving in profound silence across the golden grass.</p>
                        <button class="text-yellow-400 text-sm font-semibold uppercase hover:text-white transition-colors">Enter Habitat &rarr;</button>
                    </div>
                </div>
            </div>
            <!-- Scrub Element: Floating Savanna Leaves/Dust -->
            <img src="https://cdn-icons-png.flaticon.com/512/3233/3233497.png" class="scrub-element w-32 md:w-64 opacity-20 right-10 bottom-10" alt="Leaves" id="savanna-leaves">
        </section>

        <!-- 3. THE RAINFOREST -->
        <section class="habitat-section" id="rainforest">
            <div class="habitat-bg" style="background-image: url('https://images.unsplash.com/photo-1540573133985-87b6da6d54a9?q=80&w=2000&auto=format&fit=crop');"></div>
            <div class="habitat-overlay bg-gradient-to-l from-black/90 to-black/30"></div>
            
            <div class="habitat-content container mx-auto px-6 md:px-12 flex justify-end">
                <div class="max-w-2xl text-right">
                    <span class="anim-title text-green-400 font-bold tracking-[0.3em] uppercase text-sm mb-2 block">Habitat 02</span>
                    <h2 class="anim-title text-5xl md:text-7xl font-extrabold mb-6">The Rainforest</h2>
                    <p class="anim-desc text-lg text-gray-300 mb-10 leading-relaxed">Deep in the emerald canopy, life thrives in layers of vibrant green and dense mist.</p>
                    
                    <div class="anim-card bg-black/40 backdrop-blur-md border border-green-500/30 p-6 rounded-2xl w-full md:w-96 shadow-2xl ml-auto text-left">
                        <h3 class="text-2xl font-bold text-white mb-2">Mountain Gorilla</h3>
                        <p class="text-gray-400 text-sm mb-4">Silverbacks guard their families with quiet strength in the misty high altitudes.</p>
                        <button class="text-green-400 text-sm font-semibold uppercase hover:text-white transition-colors">Enter Habitat &rarr;</button>
                    </div>
                </div>
            </div>
            <!-- Scrub Element: Mist layer moving opposite to scroll -->
            <div class="scrub-element w-full h-full bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-30 top-0 left-0" id="rainforest-mist"></div>
        </section>

        <!-- 4. THE AQUARIUM -->
        <section class="habitat-section" id="aquarium">
            <div class="habitat-bg" style="background-image: url('https://images.unsplash.com/photo-1582967788606-a171c1080cb0?q=80&w=2000&auto=format&fit=crop');"></div>
            <div class="habitat-overlay bg-gradient-to-t from-[#001428]/90 to-[#001428]/30"></div>
            
            <div class="habitat-content container mx-auto px-6 md:px-12 text-center">
                <div class="max-w-3xl mx-auto">
                    <span class="anim-title text-blue-400 font-bold tracking-[0.3em] uppercase text-sm mb-2 block">Habitat 03</span>
                    <h2 class="anim-title text-5xl md:text-7xl font-extrabold mb-6">The Aquarium</h2>
                    <p class="anim-desc text-lg text-gray-300 mb-10 leading-relaxed">Submerge into the alien depths of the ocean, where bioluminescence and ancient currents rule.</p>
                    
                    <div class="anim-card bg-blue-900/20 backdrop-blur-md border border-blue-500/30 p-6 rounded-2xl w-full md:w-96 shadow-2xl mx-auto text-left">
                        <h3 class="text-2xl font-bold text-white mb-2">Great White Shark</h3>
                        <p class="text-gray-400 text-sm mb-4">The apex predator of the deep, gliding effortlessly through the dark, cold waters.</p>
                        <button class="text-blue-400 text-sm font-semibold uppercase hover:text-white transition-colors">Enter Habitat &rarr;</button>
                    </div>
                </div>
            </div>
            
            <!-- Scrub Element: Floating Bubbles rising on scroll -->
            <div class="scrub-element right-1/4 bottom-0 w-16 h-16 rounded-full border-2 border-white/20" id="aqua-bubble-1"></div>
            <div class="scrub-element left-1/4 bottom-10 w-8 h-8 rounded-full border border-white/20" id="aqua-bubble-2"></div>
        </section>

    </div>

    <!-- GSAP Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Register ScrollTrigger Plugin
            gsap.registerPlugin(ScrollTrigger);

            // ==========================================
            // 1. HERO PARALLAX SCROLL
            // ==========================================
            gsap.to('#hero-bg', {
                yPercent: 30, // Moves background down slightly slower than scroll
                ease: "none",
                scrollTrigger: {
                    trigger: "#hero",
                    start: "top top",
                    end: "bottom top",
                    scrub: true
                }
            });

            gsap.to(['#hero-title', '#hero-subtitle', '#scroll-indicator'], {
                y: 100,
                opacity: 0,
                scrollTrigger: {
                    trigger: "#hero",
                    start: "top top",
                    end: "center top",
                    scrub: true
                }
            });

            // ==========================================
            // 2. HABITAT SECTIONS - PINNING & TIMELINES
            // ==========================================
            const habitats = document.querySelectorAll('.habitat-section');

            habitats.forEach((section, index) => {
                const bg = section.querySelector('.habitat-bg');
                const titles = section.querySelectorAll('.anim-title');
                const desc = section.querySelector('.anim-desc');
                const card = section.querySelector('.anim-card');

                // Create a master timeline for the pinning effect
                const tl = gsap.timeline({
                    scrollTrigger: {
                        trigger: section,
                        start: "top top", // Pin when section reaches top of viewport
                        end: "+=150%",    // Keep pinned for 1.5x the screen height
                        pin: true,        // Pin the element
                        scrub: 1,         // Smooth 1 second delay on scrub
                        anticipatePin: 1
                    }
                });

                // Subtle background scale-down during the pin
                tl.to(bg, {
                    scale: 1, // Scales down from 1.1 set in CSS
                    duration: 2,
                    ease: "power1.inOut"
                }, 0);

                // Animate titles in
                tl.fromTo(titles, 
                    { y: 50, autoAlpha: 0 }, 
                    { y: 0, autoAlpha: 1, duration: 0.8, stagger: 0.2, ease: "power2.out" }, 
                0.2); // Start slightly after pin begins

                // Animate description in
                tl.fromTo(desc, 
                    { y: 30, autoAlpha: 0 }, 
                    { y: 0, autoAlpha: 1, duration: 0.8, ease: "power2.out" }, 
                0.6);

                // Animate the animal card in from the side (alternating based on index)
                tl.fromTo(card, 
                    { x: index % 2 === 0 ? 100 : -100, autoAlpha: 0 }, 
                    { x: 0, autoAlpha: 1, duration: 1, ease: "back.out(1.7)" }, 
                0.8);

                // Fade out elements before unpinning to create a seamless transition to the next section
                tl.to([titles, desc, card], {
                    y: -50,
                    autoAlpha: 0,
                    duration: 0.5,
                    stagger: 0.1
                }, 1.5);
            });

            // ==========================================
            // 3. SCRUB EFFECTS (TIED DIRECTLY TO SCROLL)
            // ==========================================
            
            // Savanna: Leaves floating up and across
            gsap.to('#savanna-leaves', {
                y: -300,
                x: -100,
                rotation: 45,
                scrollTrigger: {
                    trigger: "#savanna",
                    start: "top bottom",
                    end: "bottom top",
                    scrub: 1
                }
            });

            // Rainforest: Mist shifting downwards
            gsap.to('#rainforest-mist', {
                yPercent: 50,
                scrollTrigger: {
                    trigger: "#rainforest",
                    start: "top bottom",
                    end: "bottom top",
                    scrub: true
                }
            });

            // Aquarium: Bubbles rising at different speeds
            gsap.to('#aqua-bubble-1', {
                y: -800,
                x: 100,
                scrollTrigger: {
                    trigger: "#aquarium",
                    start: "top bottom",
                    end: "bottom top",
                    scrub: 0.5
                }
            });

            gsap.to('#aqua-bubble-2', {
                y: -600,
                x: -50,
                scrollTrigger: {
                    trigger: "#aquarium",
                    start: "top bottom",
                    end: "bottom top",
                    scrub: 1.5
                }
            });
        });
    </script>
</body>
</html>
