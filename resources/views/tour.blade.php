<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Zoo - Immersive Experience</title>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Pannellum 360 Viewer -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    
    <!-- Google Fonts for Premium Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700;900&family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --glass-bg: rgba(10, 15, 25, 0.65);
            --glass-border: rgba(255, 255, 255, 0.1);
            --glow-color: rgba(0, 240, 255, 0.4);
        }

        body {
            overflow-x: hidden;
            margin: 0;
            background-color: #000000;
            font-family: 'Outfit', sans-serif;
            color: #ffffff;
        }
        
        body.no-scroll {
            overflow: hidden !important;
        }

        /* Hide scrollbar for seamless cinematic experience */
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: #050505; }
        ::-webkit-scrollbar-thumb { background: #444; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #666; }

        /* Typography upgrades */
        .hero-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(4rem, 10vw, 9rem);
            font-weight: 900;
            line-height: 0.9;
            text-transform: uppercase;
            background: linear-gradient(135deg, #ffffff 0%, #aaaaaa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 50px rgba(255,255,255,0.15);
            margin-bottom: 2rem;
        }

        .chapter-number {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 8rem;
            font-weight: 900;
            line-height: 0.8;
            opacity: 0.15;
            background: linear-gradient(180deg, #fff 0%, transparent 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: absolute;
            top: 2rem;
            right: 2rem;
            pointer-events: none;
        }

        .chapter-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(3rem, 6vw, 5.5rem);
            font-weight: 900;
            line-height: 1;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
            letter-spacing: -1px;
            text-shadow: 0 5px 20px rgba(0,0,0,0.5);
        }

        /* Habitat Sections */
        .chapter-section {
            min-height: 100vh;
            width: 100vw;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            z-index: 10;
        }

        .anim-element {
            /* Handled by GSAP, but ensure initial state is invisible */
            visibility: hidden; 
        }

        /* Full Screen Animated Backgrounds */
        .bg-wrapper {
            position: absolute;
            top: 0; 
            height: 100vh;
            z-index: 0;
            overflow: hidden;
        }

        .chapter-bg-img {
            width: 100%; height: 100%;
            object-fit: cover;
            transform-origin: center;
            will-change: transform;
            animation: cinematic-pan 40s infinite alternate ease-in-out;
            image-rendering: -webkit-optimize-contrast;
            image-rendering: crisp-edges;
            filter: contrast(1.05) saturate(1.1);
        }

        @keyframes cinematic-pan {
            0% { transform: scale(1.0) translate(0, 0); }
            50% { transform: scale(1.05) translate(-1%, 1%); }
            100% { transform: scale(1.0) translate(1%, -1%); }
        }

        /* Premium Glassmorphism Panel */
        .glass-panel {
            background: var(--glass-bg);
            backdrop-filter: blur(35px);
            -webkit-backdrop-filter: blur(35px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 4rem;
            box-shadow: 0 40px 80px rgba(0,0,0,0.8), inset 0 0 0 1px rgba(255,255,255,0.05);
            position: relative;
            overflow: hidden;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            z-index: 20;
        }

        .glass-panel::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 50%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.04), transparent);
            transform: skewX(-20deg);
            transition: 0.7s;
            pointer-events: none;
        }

        .glass-panel:hover::before {
            left: 200%;
        }
        
        .glass-panel:hover {
            transform: translateY(-5px);
            box-shadow: 0 50px 100px rgba(0,0,0,0.9), 0 0 50px var(--glow-color), inset 0 0 0 1px rgba(255,255,255,0.2);
        }

        /* Pulsing Holographic Button */
        .panorama-btn {
            background: linear-gradient(135deg, rgba(255,255,255,0.15), rgba(255,255,255,0.05));
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            padding: 20px 45px;
            border-radius: 50px;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.5);
            text-decoration: none;
            cursor: pointer;
            z-index: 50; /* Bulletproof clickable */
        }

        .panorama-btn::after {
            content: '';
            position: absolute;
            top: -50%; left: -50%;
            width: 200%; height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.3s;
            pointer-events: none;
        }

        .panorama-btn:hover {
            background: white;
            color: black;
            border-color: white;
            transform: translateY(-4px) scale(1.03);
            box-shadow: 0 20px 50px var(--glow-color);
        }

        .panorama-btn:hover::after {
            opacity: 1;
        }

        .panorama-btn i {
            transition: transform 0.3s ease;
            pointer-events: none;
        }

        .panorama-btn:hover i {
            transform: scale(1.3);
        }

        /* Return Nav */
        .nav-return {
            position: fixed;
            top: 2.5rem;
            left: 2.5rem;
            z-index: 100;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255,255,255,0.15);
            color: white;
            width: 64px; height: 64px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .nav-return:hover {
            background: white;
            color: black;
            transform: scale(1.1);
            box-shadow: 0 0 35px rgba(255,255,255,0.5);
        }

        /* 360 Viewer Overlay */
        #panorama-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            background: rgba(0, 0, 0, 0.98);
            z-index: 2000;
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        #panorama-container {
            width: 100vw;
            height: 100vh;
            position: absolute;
            top: 0; left: 0;
            z-index: 0;
        }

        #panorama-title {
            position: absolute;
            top: 3rem;
            left: 3rem;
            z-index: 2;
            text-shadow: 0 5px 30px rgba(0,0,0,1);
        }

        .close-panorama {
            position: absolute;
            top: 2.5rem; right: 2.5rem;
            color: white;
            font-size: 2.5rem;
            cursor: pointer;
            z-index: 2001;
            transition: all 0.3s;
            background: rgba(0,0,0,0.6);
            width: 70px; height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .close-panorama:hover {
            transform: scale(1.1) rotate(90deg);
            background: white;
            color: black;
        }

        /* Particle Animations */
        .bg-particles {
            position: absolute; top: 0; left: 0; width: 100vw; height: 100vh; pointer-events: none; z-index: 2; overflow: hidden;
        }
        .particle { position: absolute; border-radius: 50%; }

        @keyframes float-firefly {
            0%, 100% { transform: translate(0, 0) scale(0.8); opacity: 0.1; }
            50% { transform: translate(60px, -150px) scale(1.3); opacity: 0.9; }
        }
        @keyframes float-snow {
            0% { transform: translate(0, -20px) rotate(0deg); opacity: 0.8; }
            100% { transform: translate(-80px, 110vh) rotate(360deg); opacity: 0; }
        }
        @keyframes float-bubble {
            0% { transform: translate(0, 110vh) scale(0.5); opacity: 0; }
            20% { opacity: 0.7; }
            80% { opacity: 0.7; }
            100% { transform: translate(80px, -20px) scale(1.3); opacity: 0; }
        }
        @keyframes float-dust {
            0%, 100% { transform: translate(0, 0) rotate(0deg); opacity: 0.1; }
            50% { transform: translate(-40px, -70px) rotate(180deg); opacity: 0.6; }
        }

        /* Vignette overlay */
        .vignette { background: radial-gradient(circle at center, transparent 30%, rgba(0,0,0,0.9) 100%); pointer-events: none; }

        /* PRELOADER STYLES */
        #preloader {
            background: radial-gradient(circle at center, #111 0%, #000 100%);
            z-index: 9999;
        }
    </style>
</head>
<body class="no-scroll">

    <!-- CINEMATIC PRELOADER -->
    <div id="preloader" class="position-fixed w-100 h-100 d-flex flex-column align-items-center justify-content-center">
        <div class="text-uppercase tracking-widest text-white-50 fw-bold mb-4" style="letter-spacing: 6px; font-size: 1rem;">Neo Apex Presents</div>
        <div class="hero-title" style="font-size: clamp(3rem, 6vw, 6rem); margin-bottom: 4rem;">Virtual Zoo</div>
        
        <div id="loader-container" style="width: 300px; height: 2px; background: rgba(255,255,255,0.1); position: relative; overflow: hidden; border-radius: 2px;">
            <div id="loader-bar" style="width: 0%; height: 100%; background: #fff; transition: width 0.3s ease;"></div>
        </div>
        <div id="loader-text" class="mt-3 text-white-50 text-uppercase" style="letter-spacing: 3px; font-size: 0.8rem; transition: opacity 0.3s;">Loading Assets... <span id="loader-percent">0</span>%</div>

        <button id="enter-btn" class="panorama-btn mt-4" style="opacity: 0; display: none; transform: translateY(20px); --glow-color: rgba(255, 255, 255, 0.4);">
            <i class="fa-solid fa-play"></i> Enter Journey
        </button>
    </div>

    <!-- Back Navigation -->
    <a href="{{ route('home') }}" class="nav-return">
        <i class="fa-solid fa-arrow-left fs-3"></i>
    </a>

    <!-- 1. HERO SECTION -->
    <section class="h-screen w-full d-flex flex-column align-items-center justify-content-center position-relative overflow-hidden" id="hero" style="height: 100vh;">
        <div class="bg-wrapper" style="width: 100vw; left: 0;">
            <img src="{{ asset('images/placeholders/rainforest.png?v=2') }}" class="chapter-bg-img" alt="Rainforest" style="filter: brightness(0.4);">
        </div>
        <div class="position-absolute w-100 h-100 z-1 vignette"></div>
        <div class="bg-particles" data-type="fireflies"></div>

        <div class="position-relative z-2 text-center px-4 d-flex flex-column align-items-center w-100" style="opacity: 0;" id="hero-content-wrapper">
            <span class="text-uppercase tracking-widest text-white-50 fw-bold mb-4 anim-hero" style="letter-spacing: 6px; font-size: 1.2rem;">Neo Apex Presents</span>
            <h1 class="hero-title anim-hero" id="hero-title">Virtual<br>Zoo Tour</h1>
            <p class="fs-3 text-white-50 mb-0 anim-hero mt-3" id="hero-subtitle" style="max-width: 800px; font-weight: 300;">A ten-chapter immersive cinematic journey into the wild. Experience nature's most majestic habitats.</p>
        </div>

        <!-- Scroll Indicator -->
        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-5 d-flex flex-column align-items-center anim-hero z-2" id="scroll-indicator" style="opacity: 0;">
            <span class="small fw-bold text-uppercase text-white-50 mb-4" style="letter-spacing: 4px;">Initiate Journey</span>
            <div style="width: 2px; height: 80px; background: linear-gradient(to bottom, rgba(255,255,255,0.8), transparent);"></div>
        </div>
    </section>

    <!-- CHAPTERS CONTAINER -->
    <div id="chapters-wrapper">
        
        <!-- CHAPTER 1: THE DEEP CANOPY (RIGHT Card) -->
        <section class="chapter-section position-relative" id="chapter-1" style="--glow-color: rgba(0, 255, 150, 0.5);">
            <div class="bg-wrapper anim-bg" style="width: 130vw; right: 0; left: auto;">
                <img src="{{ asset('images/placeholders/chimp.png?v=2') }}" class="chapter-bg-img" alt="Chimpanzee">
            </div>
            <div class="position-absolute w-100 h-100 z-1" style="background: linear-gradient(270deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 40%, transparent 100%); pointer-events: none;"></div>
            <div class="position-absolute w-100 h-100 z-1 vignette"></div>
            <div class="bg-particles" data-type="fireflies"></div>
            
            <div class="container-fluid h-100 d-flex align-items-center justify-content-end position-relative z-2 px-0">
                <div class="row w-100 m-0 justify-content-end">
                    <div class="col-12 col-xl-5 px-4 px-md-5 me-md-5">
                        <div class="anim-element glass-panel">
                            <div class="chapter-number">01</div>
                            <span class="text-uppercase fw-bold mb-3 d-block" style="color: #00ffaa; letter-spacing: 4px; font-size: 1.1rem;">The Emerald Shadows</span>
                            <h2 class="chapter-title">The Deep Canopy</h2>
                            <p class="fs-4 text-white-50 mb-5 lh-lg fw-light">In the emerald shadows of the Virunga Mountains, life moves at a different pace. Every rustle of leaves tells a story of survival, heritage, and the delicate balance of the deep jungle ecosystem.</p>
                            
                            <a href="javascript:void(0);" class="panorama-btn" onclick="openPanorama('https://upload.wikimedia.org/wikipedia/commons/e/e1/Rainforest_trail_-_Panorama_%28Dimitrios_Savva_and_Jarod_Guest_via_Poly_Haven%29.jpg', 'The Deep Canopy')" style="position: relative; z-index: 9999; pointer-events: auto;">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter Habitat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 2: THE GOLDEN PLAINS (LEFT Card) -->
        <section class="chapter-section position-relative" id="chapter-2" style="--glow-color: rgba(255, 180, 0, 0.5);">
            <div class="bg-wrapper anim-bg" style="width: 130vw; left: 0; right: auto;">
                <img src="{{ asset('images/placeholders/elephant.png?v=2') }}" class="chapter-bg-img" alt="Elephant">
            </div>
            <div class="position-absolute w-100 h-100 z-1" style="background: linear-gradient(90deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 40%, transparent 100%); pointer-events: none;"></div>
            <div class="position-absolute w-100 h-100 z-1 vignette"></div>
            <div class="bg-particles" data-type="dust"></div>
            
            <div class="container-fluid h-100 d-flex align-items-center position-relative z-2 px-0">
                <div class="row w-100 m-0">
                    <div class="col-12 col-xl-5 px-4 px-md-5 ms-md-5">
                        <div class="anim-element glass-panel">
                            <div class="chapter-number">02</div>
                            <span class="text-uppercase fw-bold mb-3 d-block" style="color: #ffb400; letter-spacing: 4px; font-size: 1.1rem;">The Great Migration</span>
                            <h2 class="chapter-title">Golden Plains</h2>
                            <p class="fs-4 text-white-50 mb-5 lh-lg fw-light">Feel the thunderous rhythm of hooves across the endless horizon. A land where ancient instincts guide million-strong migrations and predators await in the tall golden grass.</p>
                            
                            <a href="javascript:void(0);" class="panorama-btn" onclick="openPanorama('{{ asset('images/tour/savannah_360.png') }}', 'Golden Plains')" style="position: relative; z-index: 9999; pointer-events: auto;">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter Habitat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 3: THE FROZEN EXPANSE (RIGHT Card) -->
        <section class="chapter-section position-relative" id="chapter-3" style="--glow-color: rgba(100, 200, 255, 0.5);">
            <div class="bg-wrapper anim-bg" style="width: 130vw; right: 0; left: auto;">
                <img src="{{ asset('images/placeholders/penguin.png?v=2') }}" class="chapter-bg-img" alt="Penguin">
            </div>
            <div class="position-absolute w-100 h-100 z-1" style="background: linear-gradient(270deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 40%, transparent 100%); pointer-events: none;"></div>
            <div class="position-absolute w-100 h-100 z-1 vignette"></div>
            <div class="bg-particles" data-type="snow"></div>
            
            <div class="container-fluid h-100 d-flex align-items-center justify-content-end position-relative z-2 px-0">
                <div class="row w-100 m-0 justify-content-end">
                    <div class="col-12 col-xl-5 px-4 px-md-5 me-md-5">
                        <div class="anim-element glass-panel">
                            <div class="chapter-number">03</div>
                            <span class="text-uppercase fw-bold mb-3 d-block" style="color: #64c8ff; letter-spacing: 4px; font-size: 1.1rem;">Absolute Zero</span>
                            <h2 class="chapter-title">Frozen Expanse</h2>
                            <p class="fs-4 text-white-50 mb-5 lh-lg fw-light">Survive the harshest conditions on Earth. In the icy desolate plains, life finds a way through remarkable adaptations, enduring absolute zero to protect the next generation.</p>
                            
                            <a href="javascript:void(0);" class="panorama-btn" onclick="openPanorama('{{ asset('images/tour/polar_360.png') }}', 'Frozen Expanse')" style="position: relative; z-index: 9999; pointer-events: auto;">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter Habitat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 4: JUNGLE ROYALTY (LEFT Card) -->
        <section class="chapter-section position-relative" id="chapter-4" style="--glow-color: rgba(255, 100, 50, 0.5);">
            <div class="bg-wrapper anim-bg" style="width: 130vw; left: 0; right: auto;">
                <img src="{{ asset('images/placeholders/tiger.png?v=2') }}" class="chapter-bg-img" alt="Tiger">
            </div>
            <div class="position-absolute w-100 h-100 z-1" style="background: linear-gradient(90deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 40%, transparent 100%); pointer-events: none;"></div>
            <div class="position-absolute w-100 h-100 z-1 vignette"></div>
            <div class="bg-particles" data-type="fireflies"></div>
            
            <div class="container-fluid h-100 d-flex align-items-center position-relative z-2 px-0">
                <div class="row w-100 m-0">
                    <div class="col-12 col-xl-5 px-4 px-md-5 ms-md-5">
                        <div class="anim-element glass-panel">
                            <div class="chapter-number">04</div>
                            <span class="text-uppercase fw-bold mb-3 d-block" style="color: #ff6432; letter-spacing: 4px; font-size: 1.1rem;">The Apex</span>
                            <h2 class="chapter-title">Jungle Royalty</h2>
                            <p class="fs-4 text-white-50 mb-5 lh-lg fw-light">Move silently through the dense undergrowth. Witness the majestic power and solitary nature of the world's most fearsome apex predators in their natural domain.</p>
                            
                            <a href="javascript:void(0);" class="panorama-btn" onclick="openPanorama('{{ asset('images/tour/tiger_360.png') }}', 'Jungle Royalty')" style="position: relative; z-index: 9999; pointer-events: auto;">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter Habitat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 5: HIGH PEAKS (LEFT Card) -->
        <section class="chapter-section position-relative" id="chapter-5" style="--glow-color: rgba(200, 200, 255, 0.5);">
            <div class="bg-wrapper anim-bg" style="width: 130vw; left: 0; right: auto;">
                <img src="{{ asset('images/placeholders/leopard.png?v=2') }}" class="chapter-bg-img" alt="Leopard">
            </div>
            <div class="position-absolute w-100 h-100 z-1" style="background: linear-gradient(90deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 40%, transparent 100%); pointer-events: none;"></div>
            <div class="position-absolute w-100 h-100 z-1 vignette"></div>
            <div class="bg-particles" data-type="snow"></div>
            
            <div class="container-fluid h-100 d-flex align-items-center position-relative z-2 px-0">
                <div class="row w-100 m-0">
                    <div class="col-12 col-xl-5 px-4 px-md-5 ms-md-5">
                        <div class="anim-element glass-panel">
                            <div class="chapter-number">05</div>
                            <span class="text-uppercase fw-bold mb-3 d-block" style="color: #c8c8ff; letter-spacing: 4px; font-size: 1.1rem;">The Thin Air</span>
                            <h2 class="chapter-title">High Peaks</h2>
                            <p class="fs-4 text-white-50 mb-5 lh-lg fw-light">Ascend to the roof of the world where oxygen is scarce and survival requires extreme adaptation. Only the most resilient thrive as mountain sentinels among the clouds.</p>
                            
                            <a href="javascript:void(0);" class="panorama-btn" onclick="openPanorama('{{ asset('images/tour/snow_leopard_360.png') }}', 'High Peaks')" style="position: relative; z-index: 9999; pointer-events: auto;">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter Habitat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 6: THE SILVERBACK (RIGHT Card) -->
        <section class="chapter-section position-relative" id="chapter-6" style="--glow-color: rgba(180, 255, 100, 0.5);">
            <div class="bg-wrapper anim-bg" style="width: 130vw; right: 0; left: auto;">
                <img src="{{ asset('images/placeholders/gorilla.png?v=2') }}" class="chapter-bg-img" alt="Gorilla">
            </div>
            <div class="position-absolute w-100 h-100 z-1" style="background: linear-gradient(270deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 40%, transparent 100%); pointer-events: none;"></div>
            <div class="position-absolute w-100 h-100 z-1 vignette"></div>
            <div class="bg-particles" data-type="dust"></div>
            
            <div class="container-fluid h-100 d-flex align-items-center justify-content-end position-relative z-2 px-0">
                <div class="row w-100 m-0 justify-content-end">
                    <div class="col-12 col-xl-5 px-4 px-md-5 me-md-5">
                        <div class="anim-element glass-panel">
                            <div class="chapter-number">06</div>
                            <span class="text-uppercase fw-bold mb-3 d-block" style="color: #b4ff64; letter-spacing: 4px; font-size: 1.1rem;">Gentle Giants</span>
                            <h2 class="chapter-title">The Silverback</h2>
                            <p class="fs-4 text-white-50 mb-5 lh-lg fw-light">Venture deeper into the mist. Encounter the intelligent and powerful leaders of the forest, guiding their complex families with a mix of gentle strength and fierce protection.</p>
                            
                            <a href="javascript:void(0);" class="panorama-btn" onclick="openPanorama('{{ asset('images/tour/gorilla_360.png') }}', 'The Silverback')" style="position: relative; z-index: 9999; pointer-events: auto;">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter Habitat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 7: OCEAN DEPTHS (RIGHT Card) -->
        <section class="chapter-section position-relative" id="chapter-7" style="--glow-color: rgba(0, 150, 255, 0.5);">
            <div class="bg-wrapper anim-bg" style="width: 130vw; right: 0; left: auto;">
                <img src="{{ asset('images/placeholders/shark.png?v=2') }}" class="chapter-bg-img" alt="Shark">
            </div>
            <div class="position-absolute w-100 h-100 z-1" style="background: linear-gradient(270deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 40%, transparent 100%); pointer-events: none;"></div>
            <div class="position-absolute w-100 h-100 z-1 vignette"></div>
            <div class="bg-particles" data-type="bubbles"></div>
            
            <div class="container-fluid h-100 d-flex align-items-center justify-content-end position-relative z-2 px-0">
                <div class="row w-100 m-0 justify-content-end">
                    <div class="col-12 col-xl-5 px-4 px-md-5 me-md-5">
                        <div class="anim-element glass-panel">
                            <div class="chapter-number">07</div>
                            <span class="text-uppercase fw-bold mb-3 d-block" style="color: #0096ff; letter-spacing: 4px; font-size: 1.1rem;">The Abyss</span>
                            <h2 class="chapter-title">Ocean Depths</h2>
                            <p class="fs-4 text-white-50 mb-5 lh-lg fw-light">Submerge into the alien world beneath the waves. Glide alongside the undisputed apex predators of the deep blue in a realm where gravity holds no power.</p>
                            
                            <a href="javascript:void(0);" class="panorama-btn" onclick="openPanorama('{{ asset('images/tour/reef_360.png') }}', 'Ocean Depths')" style="position: relative; z-index: 9999; pointer-events: auto;">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter Habitat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 8: CANOPY KINGS (RIGHT Card) -->
        <section class="chapter-section position-relative" id="chapter-8" style="--glow-color: rgba(255, 100, 100, 0.5);">
            <div class="bg-wrapper anim-bg" style="width: 130vw; right: 0; left: auto;">
                <img src="{{ asset('images/placeholders/macaw.png?v=2') }}" class="chapter-bg-img" alt="Macaw">
            </div>
            <div class="position-absolute w-100 h-100 z-1" style="background: linear-gradient(270deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 40%, transparent 100%); pointer-events: none;"></div>
            <div class="position-absolute w-100 h-100 z-1 vignette"></div>
            <div class="bg-particles" data-type="fireflies"></div>
            
            <div class="container-fluid h-100 d-flex align-items-center justify-content-end position-relative z-2 px-0">
                <div class="row w-100 m-0 justify-content-end">
                    <div class="col-12 col-xl-5 px-4 px-md-5 me-md-5">
                        <div class="anim-element glass-panel">
                            <div class="chapter-number">08</div>
                            <span class="text-uppercase fw-bold mb-3 d-block" style="color: #ff6464; letter-spacing: 4px; font-size: 1.1rem;">The Aviators</span>
                            <h2 class="chapter-title">Canopy Kings</h2>
                            <p class="fs-4 text-white-50 mb-5 lh-lg fw-light">Look up to the highest branches. A kaleidoscope of colors flashes through the leaves as the vibrant kings of the canopy take flight in a display of unmatched aerial agility.</p>
                            
                            <a href="javascript:void(0);" class="panorama-btn" onclick="openPanorama('{{ asset('images/tour/macaw_360.png') }}', 'Canopy Kings')" style="position: relative; z-index: 9999; pointer-events: auto;">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter Habitat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 9: FOREST GIANTS (RIGHT Card) -->
        <section class="chapter-section position-relative" id="chapter-9" style="--glow-color: rgba(180, 220, 255, 0.5);">
            <div class="bg-wrapper anim-bg" style="width: 130vw; right: 0; left: auto;">
                <img src="{{ asset('images/placeholders/bear.png?v=2') }}" class="chapter-bg-img" alt="Bear">
            </div>
            <div class="position-absolute w-100 h-100 z-1" style="background: linear-gradient(270deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 40%, transparent 100%); pointer-events: none;"></div>
            <div class="position-absolute w-100 h-100 z-1 vignette"></div>
            <div class="bg-particles" data-type="snow"></div>
            
            <div class="container-fluid h-100 d-flex align-items-center justify-content-end position-relative z-2 px-0">
                <div class="row w-100 m-0 justify-content-end">
                    <div class="col-12 col-xl-5 px-4 px-md-5 me-md-5">
                        <div class="anim-element glass-panel">
                            <div class="chapter-number">09</div>
                            <span class="text-uppercase fw-bold mb-3 d-block" style="color: #b4dcff; letter-spacing: 4px; font-size: 1.1rem;">The Untamed</span>
                            <h2 class="chapter-title">Forest Giants</h2>
                            <p class="fs-4 text-white-50 mb-5 lh-lg fw-light">Wander through the frozen northern pine forests. Meet the undisputed masters of the wilderness, built for power, endurance, and solitary reign over vast territories.</p>
                            
                            <a href="javascript:void(0);" class="panorama-btn" onclick="openPanorama('{{ asset('images/tour/bear_360.png') }}', 'Forest Giants')" style="position: relative; z-index: 9999; pointer-events: auto;">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter Habitat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 10: DESERT DRAGONS (LEFT Card) -->
        <section class="chapter-section position-relative" id="chapter-10" style="--glow-color: rgba(255, 150, 50, 0.5);">
            <div class="bg-wrapper anim-bg" style="width: 130vw; left: 0; right: auto;">
                <img src="{{ asset('images/placeholders/komodo.png?v=2') }}" class="chapter-bg-img" alt="Komodo Dragon">
            </div>
            <div class="position-absolute w-100 h-100 z-1" style="background: linear-gradient(90deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 40%, transparent 100%); pointer-events: none;"></div>
            <div class="position-absolute w-100 h-100 z-1 vignette"></div>
            <div class="bg-particles" data-type="dust"></div>
            
            <div class="container-fluid h-100 d-flex align-items-center position-relative z-2 px-0">
                <div class="row w-100 m-0">
                    <div class="col-12 col-xl-5 px-4 px-md-5 ms-md-5">
                        <div class="anim-element glass-panel">
                            <div class="chapter-number">10</div>
                            <span class="text-uppercase fw-bold mb-3 d-block" style="color: #ff9632; letter-spacing: 4px; font-size: 1.1rem;">Living Relics</span>
                            <h2 class="chapter-title">Desert Dragons</h2>
                            <p class="fs-4 text-white-50 mb-5 lh-lg fw-light">Step into the harsh, arid landscapes where prehistoric survivors still rule. Come face to face with the true dragons of the modern world in their unforgiving domain.</p>
                            
                            <div class="d-flex gap-4 mt-5 flex-wrap">
                                <a href="javascript:void(0);" class="panorama-btn" onclick="openPanorama('{{ asset('images/tour/komodo_360.png') }}', 'Desert Dragons')" style="position: relative; z-index: 9999; pointer-events: auto;">
                                    <i class="fa-solid fa-vr-cardboard"></i> Enter Habitat
                                </a>
                                <a href="{{ route('home') }}" class="panorama-btn" style="background: rgba(255,255,255,0.05); border-color: rgba(255,255,255,0.1);">
                                    <i class="fa-solid fa-flag-checkered"></i> Complete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- 360 Panorama Overlay -->
    <div id="panorama-overlay">
        <div class="close-panorama" id="close-panorama-btn">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <h2 id="panorama-title" class="chapter-title mb-0"></h2>
        <div id="panorama-container"></div>
        <!-- Drag to Explore Visual Indicator Overlay -->
        <div id="drag-indicator" style="position: absolute; pointer-events: none; top: 50%; left: 50%; transform: translate(-50%, -50%); display: flex; flex-direction: column; align-items: center; justify-content: center; background: rgba(0,0,0,0.65); color: white; padding: 2rem; border-radius: 50%; width: 160px; height: 160px; border: 1px solid rgba(255,255,255,0.2); backdrop-filter: blur(10px); transition: opacity 0.8s ease; z-index: 10; opacity: 0; display: none;">
            <i class="fa-solid fa-hand-pointer mb-3" style="font-size: 3rem; color: #fff; animation: float-firefly 2s infinite ease-in-out;"></i>
            <span style="font-size: 1rem; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; text-align: center; line-height: 1.4;">Drag to<br>Explore</span>
        </div>
    </div>

    <!-- GSAP Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <script>
        // Web Audio Ambience Synthesizer
        class SoundscapeGenerator {
            constructor() {
                this.ctx = null;
                this.nodes = [];
                this.chirpInterval = null;
                this.cricketInterval = null;
            }

            start(type) {
                this.stop();
                try {
                    const AudioContext = window.AudioContext || window.webkitAudioContext;
                    if (!AudioContext) return;
                    this.ctx = new AudioContext();
                    
                    if (type === 'wind') {
                        this.playWind();
                    } else if (type === 'rainforest') {
                        this.playRainforest();
                    } else if (type === 'ocean') {
                        this.playOcean();
                    } else if (type === 'wildlife') {
                        this.playWildlife();
                    }
                } catch(e) {
                    console.error('Audio generation failed', e);
                }
            }

            stop() {
                if (this.chirpInterval) { clearInterval(this.chirpInterval); this.chirpInterval = null; }
                if (this.cricketInterval) { clearInterval(this.cricketInterval); this.cricketInterval = null; }
                if (this.nodes) {
                    this.nodes.forEach(node => {
                        try { node.stop(); } catch (e) {}
                        try { node.disconnect(); } catch (e) {}
                    });
                }
                if (this.ctx && this.ctx.state !== 'closed') { this.ctx.close(); }
                this.nodes = [];
                this.ctx = null;
            }

            createNoiseBuffer() {
                const bufferSize = 2 * this.ctx.sampleRate;
                const noiseBuffer = this.ctx.createBuffer(1, bufferSize, this.ctx.sampleRate);
                const output = noiseBuffer.getChannelData(0);
                for (let i = 0; i < bufferSize; i++) { output[i] = Math.random() * 2 - 1; }
                return noiseBuffer;
            }

            playWind() {
                const noise = this.ctx.createBufferSource();
                noise.buffer = this.createNoiseBuffer();
                noise.loop = true;
                const filter = this.ctx.createBiquadFilter();
                filter.type = 'bandpass'; filter.Q.value = 3.0;
                const lfo = this.ctx.createOscillator();
                lfo.frequency.value = 0.08;
                const lfoGain = this.ctx.createGain();
                lfoGain.gain.value = 350;
                lfo.connect(lfoGain); lfoGain.connect(filter.frequency);
                filter.frequency.value = 600;
                const gainNode = this.ctx.createGain();
                gainNode.gain.value = 0.12;
                noise.connect(filter); filter.connect(gainNode); gainNode.connect(this.ctx.destination);
                lfo.start(); noise.start();
                this.nodes.push(noise, lfo);
            }

            playOcean() {
                const noise = this.ctx.createBufferSource();
                noise.buffer = this.createNoiseBuffer();
                noise.loop = true;
                const filter = this.ctx.createBiquadFilter();
                filter.type = 'lowpass'; filter.frequency.value = 400;
                const lfo = this.ctx.createOscillator(); lfo.frequency.value = 0.12;
                const lfoGain = this.ctx.createGain(); lfoGain.gain.value = 0.06;
                const gainNode = this.ctx.createGain(); gainNode.gain.value = 0.08;
                lfo.connect(lfoGain); lfoGain.connect(gainNode.gain);
                noise.connect(filter); filter.connect(gainNode); gainNode.connect(this.ctx.destination);
                lfo.start(); noise.start();
                this.nodes.push(noise, lfo);
            }

            playRainforest() {
                const noise = this.ctx.createBufferSource();
                noise.buffer = this.createNoiseBuffer();
                noise.loop = true;
                const filter = this.ctx.createBiquadFilter();
                filter.type = 'highpass'; filter.frequency.value = 1000;
                const gainNode = this.ctx.createGain(); gainNode.gain.value = 0.03;
                noise.connect(filter); filter.connect(gainNode); gainNode.connect(this.ctx.destination);
                noise.start(); this.nodes.push(noise);
                this.chirpInterval = setInterval(() => { this.triggerJungleChirp(); }, 3000);
            }

            triggerJungleChirp() {
                if (!this.ctx) return;
                const osc = this.ctx.createOscillator(); const gain = this.ctx.createGain();
                osc.type = 'sine'; const startFreq = 2000 + Math.random() * 1500;
                osc.frequency.setValueAtTime(startFreq, this.ctx.currentTime);
                osc.frequency.exponentialRampToValueAtTime(startFreq + 500, this.ctx.currentTime + 0.15);
                gain.gain.setValueAtTime(0, this.ctx.currentTime);
                gain.gain.linearRampToValueAtTime(0.015, this.ctx.currentTime + 0.05);
                gain.gain.exponentialRampToValueAtTime(0.0001, this.ctx.currentTime + 0.25);
                osc.connect(gain); gain.connect(this.ctx.destination);
                osc.start(); osc.stop(this.ctx.currentTime + 0.26);
            }

            playWildlife() {
                const noise = this.ctx.createBufferSource();
                noise.buffer = this.createNoiseBuffer(); noise.loop = true;
                const filter = this.ctx.createBiquadFilter();
                filter.type = 'bandpass'; filter.frequency.value = 2500; filter.Q.value = 2.0;
                const gainNode = this.ctx.createGain(); gainNode.gain.value = 0.01;
                noise.connect(filter); filter.connect(gainNode); gainNode.connect(this.ctx.destination);
                noise.start(); this.nodes.push(noise);
                this.cricketInterval = setInterval(() => { this.triggerCricketChirp(); }, 1800);
            }

            triggerCricketChirp() {
                if (!this.ctx) return;
                const now = this.ctx.currentTime;
                for (let i = 0; i < 4; i++) {
                    const osc = this.ctx.createOscillator(); const gain = this.ctx.createGain();
                    osc.type = 'triangle'; osc.frequency.value = 4200 + i * 50;
                    const pulseStart = now + i * 0.05;
                    gain.gain.setValueAtTime(0, pulseStart);
                    gain.gain.linearRampToValueAtTime(0.005, pulseStart + 0.01);
                    gain.gain.exponentialRampToValueAtTime(0.0001, pulseStart + 0.04);
                    osc.connect(gain); gain.connect(this.ctx.destination);
                    osc.start(pulseStart); osc.stop(pulseStart + 0.05);
                }
            }
        }

        window.soundscape = new SoundscapeGenerator();
        window.viewer = null;

        function openPanorama(imageUrl, title) {
            try {
                const overlay = document.getElementById('panorama-overlay');
                const titleElem = document.getElementById('panorama-title');
                const container = document.getElementById('panorama-container');
                
                if(!overlay || !container) {
                    console.error("Panorama containers missing");
                    return;
                }

                // Force visibility
                titleElem.innerText = title;
                overlay.style.display = 'flex';
                overlay.style.opacity = '1';
                overlay.style.pointerEvents = 'auto';
                document.body.style.overflow = 'hidden';

                if (window.viewer) {
                    try { window.viewer.destroy(); } catch(e){}
                    window.viewer = null;
                }

                // Ensure pannellum is loaded
                if (typeof pannellum === 'undefined') {
                    titleElem.innerText = "Error: 360 Viewer library failed to load.";
                    return;
                }

                const dragIndicator = document.getElementById('drag-indicator');
                if (dragIndicator) {
                    dragIndicator.style.opacity = '1';
                    dragIndicator.style.display = 'flex';
                    
                    const fadeOut = () => {
                        dragIndicator.style.opacity = '0';
                        setTimeout(() => { dragIndicator.style.display = 'none'; }, 800);
                        container.removeEventListener('mousedown', fadeOut);
                        container.removeEventListener('touchstart', fadeOut);
                    };
                    
                    const autoFadeTimeout = setTimeout(fadeOut, 3500);
                    container.addEventListener('mousedown', () => { clearTimeout(autoFadeTimeout); fadeOut(); });
                    container.addEventListener('touchstart', () => { clearTimeout(autoFadeTimeout); fadeOut(); });
                }

                window.viewer = pannellum.viewer('panorama-container', {
                    "type": "equirectangular",
                    "panorama": imageUrl,
                    "autoLoad": true,
                    "compass": false,
                    "showZoomCtrl": false,
                    "mouseZoom": false,
                    "friction": 0.15,
                    "autoRotate": -1.5
                });

                // Start ambient sound based on title
                let sound = 'rainforest';
                if (['Golden Plains', 'The Silverback', 'Desert Dragons'].includes(title)) sound = 'wildlife';
                else if (['Frozen Expanse', 'High Peaks'].includes(title)) sound = 'wind';
                else if (title === 'Ocean Depths') sound = 'ocean';
                
                if (window.soundscape) {
                    window.soundscape.start(sound);
                }
            } catch (err) {
                console.error("Failed to open panorama:", err);
                const titleElem = document.getElementById('panorama-title');
                if (titleElem) titleElem.innerText = "Error: Failed to load habitat.";
            }
        }

        function closePanorama() {
            const overlay = document.getElementById('panorama-overlay');
            if(overlay) {
                overlay.style.opacity = '0';
                setTimeout(() => {
                    overlay.style.display = 'none';
                    overlay.style.pointerEvents = 'none';
                    document.body.style.overflow = 'auto';
                    
                    if (window.viewer) {
                        try { window.viewer.destroy(); } catch(e){}
                        window.viewer = null;
                    }
                }, 500);
            }

            if (window.soundscape) {
                window.soundscape.stop();
            }

            const dragIndicator = document.getElementById('drag-indicator');
            if (dragIndicator) {
                dragIndicator.style.opacity = '0';
                dragIndicator.style.display = 'none';
            }
        }

        // Direct event listeners for robust click handling
        document.querySelectorAll('.trigger-habitat').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const url = this.getAttribute('data-url');
                const title = this.getAttribute('data-title');
                openPanorama(url, title);
            });
        });

        const closeBtn = document.getElementById('close-panorama-btn');
        if (closeBtn) {
            closeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                closePanorama();
            });
        }
        
    </script>

    <!-- AMBIENCE AUDIO ASSETS -->
    <div id="audio-assets" style="display: none;">
        <audio id="audio-chap-0" src="{{ asset('audio/tour/chimp.mp3') }}" loop preload="auto"></audio>
        <audio id="audio-chap-1" src="{{ asset('audio/tour/elephant.mp3') }}" loop preload="auto"></audio>
        <audio id="audio-chap-2" src="{{ asset('audio/tour/penguin.mp3') }}" loop preload="auto"></audio>
        <audio id="audio-chap-3" src="{{ asset('audio/tour/tiger.mp3') }}" loop preload="auto"></audio>
        <audio id="audio-chap-4" src="{{ asset('audio/tour/leopard.mp3') }}" loop preload="auto"></audio>
        <audio id="audio-chap-5" src="{{ asset('audio/tour/gorilla.mp3') }}" loop preload="auto"></audio>
        <audio id="audio-chap-6" src="{{ asset('audio/tour/shark.mp3') }}" loop preload="auto"></audio>
        <audio id="audio-chap-7" src="{{ asset('audio/tour/macaw.mp3') }}" loop preload="auto"></audio>
        <audio id="audio-chap-8" src="{{ asset('audio/tour/bear.mp3') }}" loop preload="auto"></audio>
        <audio id="audio-chap-9" src="{{ asset('audio/tour/komodo.mp3') }}" loop preload="auto"></audio>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            gsap.registerPlugin(ScrollTrigger);

            // AUDIO MANAGEMENT
            let audioUnlocked = false;
            let currentPlayingAudio = null;
            let audioCtx = null;
            const audioGains = {};

            function unlockAudio() {
                if (audioUnlocked) return;
                try {
                    const AudioContext = window.AudioContext || window.webkitAudioContext;
                    if (AudioContext && !audioCtx) {
                        audioCtx = new AudioContext();
                        audioCtx.resume();
                    }
                } catch(e) {}

                const audios = document.querySelectorAll('#audio-assets audio');
                audios.forEach(audio => {
                    if (audioCtx && !audioGains[audio.id]) {
                        try {
                            const source = audioCtx.createMediaElementSource(audio);
                            const gainNode = audioCtx.createGain();
                            gainNode.gain.value = 0; // start muted
                            source.connect(gainNode);
                            gainNode.connect(audioCtx.destination);
                            audioGains[audio.id] = gainNode;
                        } catch(e) {}
                    }
                    audio.volume = 0; // Mute the base HTML element so we only hear the amplified Web Audio API node
                    audio.play().then(() => {
                        audio.pause();
                    }).catch(e => console.log("Audio unlock failed: ", e));
                });
                audioUnlocked = true;
            }

            function crossfadeAudio(targetId) {
                if (!audioUnlocked) return;
                
                const targetAudio = targetId ? document.getElementById(targetId) : null;
                if (currentPlayingAudio === targetAudio) return;
                
                const audios = document.querySelectorAll('#audio-assets audio');
                audios.forEach(audio => {
                    if (audio !== targetAudio && !audio.paused) {
                        const gainNode = audioGains[audio.id];
                        if (gainNode) {
                            gsap.to(gainNode.gain, { value: 0, duration: 1.5, onComplete: () => audio.pause() });
                        } else {
                            gsap.to(audio, { volume: 0, duration: 1.5, onComplete: () => audio.pause() });
                        }
                    }
                });

                if (targetAudio) {
                    currentPlayingAudio = targetAudio;
                    targetAudio.play().catch(e => console.log("Play failed: ", e));
                    
                    const gainNode = audioGains[targetAudio.id];
                    if (gainNode) {
                        targetAudio.volume = 1.0; // Ensure base volume is up for source
                        gsap.to(gainNode.gain, { value: 5.0, duration: 1.5 }); // BOOST VOLUME BY 500%
                    } else {
                        gsap.to(targetAudio, { volume: 1.0, duration: 1.5 }); // fallback
                    }
                } else {
                    currentPlayingAudio = null;
                }
            }

            // Pause all audio when scrolling back to hero
            ScrollTrigger.create({
                trigger: '#hero',
                start: "top top",
                end: "bottom center",
                onEnter: () => crossfadeAudio(null),
                onEnterBack: () => crossfadeAudio(null)
            });


            // Generate Particles for each container
            document.querySelectorAll('.bg-particles').forEach(container => {
                const type = container.dataset.type;
                const count = type === 'snow' ? 50 : type === 'fireflies' ? 35 : type === 'bubbles' ? 40 : 30;
                for(let i=0; i<count; i++) {
                    const p = document.createElement('div');
                    p.className = 'particle';
                    p.style.left = Math.random() * 100 + '%';
                    p.style.top = Math.random() * 100 + '%';
                    
                    const size = 3 + Math.random() * 6;
                    p.style.width = size + 'px';
                    p.style.height = size + 'px';
                    
                    if (type === 'fireflies') {
                        p.style.background = 'rgba(173, 255, 47, ' + (0.4 + Math.random() * 0.6) + ')';
                        p.style.boxShadow = '0 0 12px rgba(173, 255, 47, 0.9)';
                        p.style.animation = `float-firefly ${4 + Math.random() * 6}s infinite ease-in-out`;
                    } else if (type === 'snow') {
                        p.style.background = 'rgba(255, 255, 255, ' + (0.5 + Math.random() * 0.5) + ')';
                        p.style.animation = `float-snow ${3 + Math.random() * 5}s infinite linear`;
                    } else if (type === 'bubbles') {
                        p.style.background = 'transparent';
                        p.style.border = '2px solid rgba(0, 240, 255, ' + (0.4 + Math.random() * 0.4) + ')';
                        p.style.boxShadow = 'inset 0 0 6px rgba(0, 240, 255, 0.6)';
                        p.style.animation = `float-bubble ${5 + Math.random() * 7}s infinite linear`;
                    } else if (type === 'dust') {
                        p.style.background = 'rgba(244, 180, 26, ' + (0.3 + Math.random() * 0.5) + ')';
                        p.style.boxShadow = '0 0 8px rgba(244, 180, 26, 0.6)';
                        p.style.animation = `float-dust ${6 + Math.random() * 8}s infinite ease-in-out`;
                    }
                    
                    p.style.animationDelay = (Math.random() * -10) + 's';
                    container.appendChild(p);
                }
            });

            // PRELOADER LOGIC
            const images = Array.from(document.querySelectorAll('.chapter-bg-img'));
            let loadedImages = 0;
            const totalImages = images.length;
            
            function updateProgress() {
                loadedImages++;
                const percent = Math.floor((loadedImages / totalImages) * 100);
                const bar = document.getElementById('loader-bar');
                const text = document.getElementById('loader-percent');
                if(bar) bar.style.width = percent + '%';
                if(text) text.innerText = percent;
                
                if (loadedImages >= totalImages) {
                    showEnterButton();
                }
            }

            function showEnterButton() {
                setTimeout(() => {
                    gsap.to(['#loader-container', '#loader-text'], { 
                        opacity: 0, 
                        duration: 0.5, 
                        onComplete: () => {
                            const container = document.getElementById('loader-container');
                            const text = document.getElementById('loader-text');
                            if(container) container.style.display = 'none';
                            if(text) text.style.display = 'none';
                            
                            const btn = document.getElementById('enter-btn');
                            if(btn) {
                                btn.style.display = 'inline-flex';
                                gsap.to(btn, { opacity: 1, y: 0, duration: 0.8, ease: "power3.out" });
                            }
                        }
                    });
                }, 400);
            }

            if (totalImages === 0) {
                showEnterButton();
            } else {
                images.forEach(img => {
                    if (img.complete) {
                        updateProgress();
                    } else {
                        img.addEventListener('load', updateProgress);
                        img.addEventListener('error', updateProgress); 
                    }
                });
            }

            // ENTER BUTTON CLICK LOGIC
            const mainEnterBtn = document.getElementById('enter-btn');
            if(mainEnterBtn) {
                mainEnterBtn.addEventListener('click', () => {
                    try {
                        const AudioContext = window.AudioContext || window.webkitAudioContext;
                        if (AudioContext) {
                            const tempCtx = new AudioContext();
                            tempCtx.resume();
                        }
                    } catch(e) {}
                    
                    unlockAudio();

                    gsap.to('#preloader', {
                        opacity: 0,
                        duration: 1.2,
                        ease: "power2.inOut",
                        onComplete: () => {
                            const preloader = document.getElementById('preloader');
                            if(preloader) {
                                preloader.classList.remove('d-flex');
                                preloader.style.setProperty('display', 'none', 'important');
                                preloader.style.pointerEvents = 'none';
                            }
                            document.body.classList.remove('no-scroll');
                            
                            const contentWrap = document.getElementById('hero-content-wrapper');
                            const scrollInd = document.getElementById('scroll-indicator');
                            if(contentWrap) contentWrap.style.opacity = 1;
                            if(scrollInd) scrollInd.style.opacity = 1;

                            gsap.from('.anim-hero', {
                                y: 80,
                                opacity: 0,
                                duration: 1.5,
                                stagger: 0.2,
                                ease: "power4.out"
                            });

                            gsap.to('.anim-hero', {
                                y: -200,
                                opacity: 0,
                                scrollTrigger: {
                                    trigger: "#hero",
                                    start: "top top",
                                    end: "bottom top",
                                    scrub: 1
                                }
                            });
                        }
                    });
                });
            }

            // 2. CHAPTER SECTIONS SCROLL TRIGGERS
            const chapters = document.querySelectorAll('.chapter-section');

            chapters.forEach((section, index) => {
                const elements = section.querySelectorAll('.anim-element');
                const bg = section.querySelector('.anim-bg');

                const isRightCard = section.querySelector('.justify-content-end') !== null;
                const xOffset = isRightCard ? 150 : -150;

                gsap.fromTo(elements, 
                    { x: xOffset, autoAlpha: 0 }, 
                    { 
                        x: 0, 
                        autoAlpha: 1, 
                        duration: 1.5, 
                        ease: "power4.out",
                        scrollTrigger: {
                            trigger: section,
                            start: "top 70%",
                            toggleActions: "play none none reverse",
                            onEnter: () => crossfadeAudio(`audio-chap-${index}`),
                            onEnterBack: () => crossfadeAudio(`audio-chap-${index}`)
                        }
                    }
                );

                const tl = gsap.timeline({
                    scrollTrigger: {
                        trigger: section,
                        start: "top top",
                        end: "+=200%", 
                        pin: true,
                        pinSpacing: false,
                        scrub: 1,
                        anticipatePin: 1
                    }
                });

                if(bg) {
                    tl.to(bg, {
                        scale: 1.05,
                        duration: 2,
                        ease: "none"
                    }, 0);
                }
            });
        });
    </script>
</body>
</html>
