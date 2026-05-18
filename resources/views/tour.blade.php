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
    
    <style>
        body {
            overflow-x: hidden;
            margin: 0;
            background-color: var(--zoo-dark);
        }

        /* Hide scrollbar for seamless cinematic experience */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f0f4f8;
        }
        ::-webkit-scrollbar-thumb {
            background: #c0d0e0;
            border-radius: 4px;
        }

        /* Habitat Sections */
        .chapter-section {
            height: 100vh;
            width: 100vw;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        /* Elements to animate (hidden by default to prevent FOUC) */
        .anim-element {
            opacity: 0;
            visibility: hidden;
        }
        
        .anim-bg {
            transition: transform 0.3s ease-out;
        }

        .blob-showcase {
            width: 100%;
            height: 60vh;
            max-height: 600px;
        }

        /* Glass Text Cards */
        .glass-panel {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 2rem;
            padding: 3rem;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }
        
        .glass-panel-dark {
            background: rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 2rem;
            padding: 3rem;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }

        /* 360 Viewer Overlay */
        #panorama-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.95);
            z-index: 2000;
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #panorama-container {
            width: 90vw;
            height: 80vh;
            border-radius: 2rem;
            overflow: hidden;
        }

        .close-panorama {
            position: absolute;
            top: 2rem;
            right: 2rem;
            color: white;
            font-size: 2.5rem;
            cursor: pointer;
            z-index: 2001;
            transition: transform 0.3s;
        }

        .close-panorama:hover {
            transform: scale(1.2) rotate(90deg);
        }

        .panorama-btn {
            background: var(--zoo-yellow);
            color: var(--zoo-dark);
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            margin-top: 20px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .panorama-btn:hover {
            background: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body class="antialiased">

    <!-- Navbar Basecamp Return -->
    <a href="{{ route('home') }}" class="position-fixed top-0 start-0 m-4 z-3 text-decoration-none" style="z-index: 100;">
        <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-lg" style="width: 50px; height: 50px; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
            <i class="fa-solid fa-arrow-left text-teal fs-4"></i>
        </div>
    </a>

    <!-- 1. HERO SECTION -->
    <section class="h-screen w-full d-flex flex-column align-items-center justify-content-center position-relative overflow-hidden bg-white" id="hero" style="height: 100vh;">
        <!-- Blurred Background Hero -->
        <div class="position-absolute w-100 h-100 z-0" style="background-image: url('{{ asset('images/placeholders/rainforest.png') }}'); background-size: cover; background-position: center; filter: blur(10px); transform: scale(1.1);"></div>
        <div class="position-absolute w-100 h-100 z-1" style="background-color: rgba(255, 255, 255, 0.6); backdrop-filter: blur(20px);"></div>
        
        <div class="position-relative z-2 text-center px-4">
            <h1 class="marker-title text-plum mb-4 anim-hero" style="font-size: 6rem; line-height: 1;" id="hero-title">VIRTUAL ZOO TOUR</h1>
            <p class="fs-3 text-dark mb-0 anim-hero fw-bold" id="hero-subtitle" style="text-shadow: 0 2px 10px rgba(255,255,255,0.5);">A ten-chapter immersive journey into the wild.</p>
        </div>

        <!-- Scroll Indicator -->
        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-5 d-flex flex-column align-items-center anim-hero z-2" id="scroll-indicator">
            <span class="small fw-bold text-uppercase text-teal mb-2" style="letter-spacing: 2px; text-shadow: 0 2px 5px rgba(255,255,255,0.8);">Scroll to Enter</span>
            <i class="fa-solid fa-chevron-down text-teal fs-4"></i>
        </div>
    </section>

    <!-- CHAPTERS CONTAINER -->
    <div id="chapters-wrapper">
        
        <!-- CHAPTER 1: THE DEEP CANOPY -->
        <section class="chapter-section position-relative" id="chapter-1">
            <div class="position-absolute w-100 h-100 z-0 anim-bg" style="background-image: url('{{ asset('images/placeholders/rainforest.png') }}'); background-size: cover; background-position: center; filter: blur(12px); transform: scale(1.15);"></div>
            <div class="position-absolute w-100 h-100 z-1" style="background-color: rgba(0, 134, 145, 0.65); backdrop-filter: blur(10px);"></div>
            
            <div class="container h-100 d-flex align-items-center position-relative z-2">
                <div class="row w-100 align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1 px-3 px-md-4 mt-5 mt-lg-0">
                        <div class="anim-element glass-panel">
                            <span class="text-yellow fw-bold text-uppercase mb-3 d-block" style="letter-spacing: 2px;">CHAPTER 01</span>
                            <h2 class="marker-title text-white mb-4" style="font-size: 4.5rem; line-height: 1;">THE DEEP CANOPY</h2>
                            <p class="fs-4 text-white mb-5" style="opacity: 0.95;">In the emerald shadows of the Virunga Mountains, life moves at a different pace. Every rustle of leaves tells a story of survival and heritage.</p>
                            
                            <div class="d-flex align-items-center">
                                <span class="text-yellow fw-bold me-4" style="font-size: 3.5rem; line-height: 1;">01</span>
                                <div style="width: 2px; height: 50px; background-color: rgba(255,255,255,0.4);" class="me-4"></div>
                                <p class="text-white mb-0 fs-5 fw-medium">Witness the Silent Guardians of the rainforest in their natural state.</p>
                            </div>

                            <button class="panorama-btn mt-4" onclick="openPanorama('https://upload.wikimedia.org/wikipedia/commons/e/e1/Rainforest_trail_-_Panorama_%28Dimitrios_Savva_and_Jarod_Guest_via_Poly_Haven%29.jpg', 'The Deep Canopy')">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter 360 Habitat
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 px-3 px-md-4">
                        <div class="anim-element blob-container blob-shape-1 mx-auto blob-showcase shadow-lg border border-white border-opacity-25" style="width: 100%; aspect-ratio: 1/1; max-width: 500px;">
                            <img src="{{ asset('images/placeholders/chimp.png') }}" class="blob-img w-100 h-100" style="object-fit: cover;" alt="Chimpanzee">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 2: THE GOLDEN PLAINS -->
        <section class="chapter-section position-relative" id="chapter-2">
            <div class="position-absolute w-100 h-100 z-0 anim-bg" style="background-image: url('{{ asset('images/placeholders/savannah.png') }}'); background-size: cover; background-position: center; filter: blur(12px); transform: scale(1.15);"></div>
            <div class="position-absolute w-100 h-100 z-1" style="background-color: rgba(241, 178, 0, 0.65); backdrop-filter: blur(10px);"></div>
            
            <div class="container h-100 d-flex align-items-center position-relative z-2">
                <div class="row w-100 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0 px-3 px-md-4">
                        <div class="anim-element blob-container blob-shape-2 mx-auto blob-showcase shadow-lg border border-white border-opacity-50" style="width: 100%; aspect-ratio: 1/1; max-width: 500px;">
                            <img src="{{ asset('images/placeholders/elephant.png') }}" class="blob-img w-100 h-100" style="object-fit: cover;" alt="Elephant">
                        </div>
                    </div>
                    <div class="col-lg-6 px-3 px-md-4">
                        <div class="anim-element glass-panel" style="background: rgba(255, 255, 255, 0.35); border-color: rgba(255,255,255,0.6);">
                            <span class="text-plum fw-bold text-uppercase mb-3 d-block" style="letter-spacing: 2px;">CHAPTER 02</span>
                            <h2 class="marker-title text-dark mb-4" style="font-size: 4.5rem; line-height: 1;">GOLDEN PLAINS</h2>
                            <p class="fs-4 text-dark mb-5 fw-medium" style="opacity: 0.9;">Feel the thunderous rhythm of hooves across the endless horizon. A land where ancient instincts guide million-strong migrations.</p>
                            
                            <div class="d-flex align-items-center">
                                <span class="text-plum fw-bold me-4" style="font-size: 3.5rem; line-height: 1;">02</span>
                                <div style="width: 3px; height: 50px; background-color: rgba(0,0,0,0.3);" class="me-4"></div>
                                <p class="text-dark mb-0 fs-5 fw-bold">Stand amidst the greatest terrestrial journey on the planet.</p>
                            </div>

                            <button class="panorama-btn mt-4 bg-plum text-white" onclick="openPanorama('https://upload.wikimedia.org/wikipedia/commons/6/60/Grasslands_sunset_-_Panorama_%28Dimitrios_Savva_and_Jarod_Guest_via_Poly_Haven%29.jpg', 'Golden Plains')">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter 360 Habitat
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 3: THE FROZEN EXPANSE -->
        <section class="chapter-section position-relative" id="chapter-3">
            <div class="position-absolute w-100 h-100 z-0 anim-bg" style="background-image: url('{{ asset('images/placeholders/polar.png') }}'); background-size: cover; background-position: center; filter: blur(12px); transform: scale(1.15);"></div>
            <div class="position-absolute w-100 h-100 z-1" style="background-color: rgba(129, 56, 97, 0.65); backdrop-filter: blur(10px);"></div>
            
            <div class="container h-100 d-flex align-items-center position-relative z-2">
                <div class="row w-100 align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1 px-3 px-md-4 mt-5 mt-lg-0">
                        <div class="anim-element glass-panel">
                            <span class="text-yellow fw-bold text-uppercase mb-3 d-block" style="letter-spacing: 2px;">CHAPTER 03</span>
                            <h2 class="marker-title text-white mb-4" style="font-size: 4.5rem; line-height: 1;">FROZEN EXPANSE</h2>
                            <p class="fs-4 text-white mb-5" style="opacity: 0.95;">Survive the harshest conditions on Earth. In the icy desolate plains, emperors march through blizzards to protect their future.</p>
                            
                            <div class="d-flex align-items-center">
                                <span class="text-yellow fw-bold me-4" style="font-size: 3.5rem; line-height: 1;">03</span>
                                <div style="width: 2px; height: 50px; background-color: rgba(255,255,255,0.4);" class="me-4"></div>
                                <p class="text-white mb-0 fs-5 fw-medium">Brave the ultimate test of endurance and devotion.</p>
                            </div>

                            <button class="panorama-btn mt-4 bg-teal text-white" onclick="openPanorama('https://upload.wikimedia.org/wikipedia/commons/e/e5/Snowy_field_-_Panorama_%28Dimitrios_Savva_and_Jarod_Guest_via_Poly_Haven%29.jpg', 'Frozen Expanse')">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter 360 Habitat
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 px-3 px-md-4">
                        <div class="anim-element blob-container blob-shape-3 mx-auto blob-showcase shadow-lg border border-white border-opacity-25" style="width: 100%; aspect-ratio: 1/1; max-width: 500px;">
                            <img src="{{ asset('images/placeholders/penguin.png') }}" class="blob-img w-100 h-100" style="object-fit: cover;" alt="Emperor Penguin">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 4: APEX PREDATORS -->
        <section class="chapter-section position-relative" id="chapter-4">
            <div class="position-absolute w-100 h-100 z-0 anim-bg" style="background-image: url('{{ asset('images/placeholders/jungle.png') }}'); background-size: cover; background-position: center; filter: blur(12px); transform: scale(1.15);"></div>
            <div class="position-absolute w-100 h-100 z-1" style="background-color: rgba(44, 62, 80, 0.75); backdrop-filter: blur(10px);"></div>
            
            <div class="container h-100 d-flex align-items-center position-relative z-2">
                <div class="row w-100 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0 px-3 px-md-4">
                        <div class="anim-element blob-container blob-shape-4 mx-auto blob-showcase shadow-lg border border-white border-opacity-25" style="width: 100%; aspect-ratio: 1/1; max-width: 500px;">
                            <img src="{{ asset('images/placeholders/tiger.png') }}" class="blob-img w-100 h-100" style="object-fit: cover;" alt="Bengal Tiger">
                        </div>
                    </div>
                    <div class="col-lg-6 px-3 px-md-4">
                        <div class="anim-element glass-panel-dark">
                            <span class="text-teal fw-bold text-uppercase mb-3 d-block" style="letter-spacing: 2px;">CHAPTER 04</span>
                            <h2 class="marker-title text-white mb-4" style="font-size: 4.5rem; line-height: 1;">JUNGLE ROYALTY</h2>
                            <p class="fs-4 text-white mb-5" style="opacity: 0.95;">Move silently through the dense undergrowth. Witness the majestic power and solitary nature of the world's most fearsome apex predators.</p>
                            
                            <div class="d-flex align-items-center">
                                <span class="text-teal fw-bold me-4" style="font-size: 3.5rem; line-height: 1;">04</span>
                                <div style="width: 2px; height: 50px; background-color: rgba(255,255,255,0.3);" class="me-4"></div>
                                <p class="text-white mb-0 fs-5 fw-medium">Respect the profound silence before the strike.</p>
                            </div>

                            <button class="panorama-btn mt-4 bg-teal text-white" onclick="openPanorama('https://upload.wikimedia.org/wikipedia/commons/1/18/Forest_cave_-_Panorama_%28Dimitrios_Savva_and_Jarod_Guest_via_Poly_Haven%29.jpg', 'Jungle Royalty')">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter 360 Habitat
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 5: THE HIGH PEAKS -->
        <section class="chapter-section position-relative" id="chapter-5">
            <div class="position-absolute w-100 h-100 z-0 anim-bg" style="background-image: url('{{ asset('images/placeholders/mountains.png') }}'); background-size: cover; background-position: center; filter: blur(12px); transform: scale(1.15);"></div>
            <div class="position-absolute w-100 h-100 z-1" style="background-image: linear-gradient(135deg, rgba(0, 134, 145, 0.75) 0%, rgba(44, 62, 80, 0.8) 100%); backdrop-filter: blur(10px);"></div>
            
            <div class="container h-100 d-flex align-items-center position-relative z-2">
                <div class="row w-100 align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1 px-3 px-md-4 mt-5 mt-lg-0">
                        <div class="anim-element glass-panel">
                            <span class="text-yellow fw-bold text-uppercase mb-3 d-block" style="letter-spacing: 2px;">CHAPTER 05</span>
                            <h2 class="marker-title text-white mb-4" style="font-size: 4.5rem; line-height: 1;">HIGH PEAKS</h2>
                            <p class="fs-4 text-white mb-5" style="opacity: 0.95;">Ascend to the roof of the world where oxygen is scarce and survival requires extreme adaptation. Only the most resilient thrive here.</p>
                            
                            <div class="d-flex align-items-center">
                                <span class="text-yellow fw-bold me-4" style="font-size: 3.5rem; line-height: 1;">05</span>
                                <div style="width: 2px; height: 50px; background-color: rgba(255,255,255,0.4);" class="me-4"></div>
                                <p class="text-white mb-0 fs-5 fw-medium">Conquer the clouds and discover mountain sentinels.</p>
                            </div>

                            <button class="panorama-btn mt-4 bg-yellow text-dark" onclick="openPanorama('https://upload.wikimedia.org/wikipedia/commons/9/91/Mountain_peak_02_-_Panorama_%28Dimitrios_Savva_and_Jarod_Guest_via_Poly_Haven%29.jpg', 'High Peaks')">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter 360 Habitat
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 px-3 px-md-4">
                        <div class="anim-element blob-container blob-shape-1 mx-auto blob-showcase shadow-lg border border-white border-opacity-25" style="width: 100%; aspect-ratio: 1/1; max-width: 500px;">
                            <img src="{{ asset('images/placeholders/leopard.png') }}" class="blob-img w-100 h-100" style="object-fit: cover;" alt="Snow Leopard">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 6: THE SILVERBACK -->
        <section class="chapter-section position-relative" id="chapter-6">
            <div class="position-absolute w-100 h-100 z-0 anim-bg" style="background-image: url('{{ asset('images/placeholders/rainforest.png') }}'); background-size: cover; background-position: center; filter: blur(12px); transform: scale(1.15);"></div>
            <div class="position-absolute w-100 h-100 z-1" style="background-color: rgba(241, 178, 0, 0.65); backdrop-filter: blur(10px);"></div>
            
            <div class="container h-100 d-flex align-items-center position-relative z-2">
                <div class="row w-100 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0 px-3 px-md-4">
                        <div class="anim-element blob-container blob-shape-2 mx-auto blob-showcase shadow-lg border border-white border-opacity-50" style="width: 100%; aspect-ratio: 1/1; max-width: 500px;">
                            <img src="{{ asset('images/placeholders/gorilla.png') }}" class="blob-img w-100 h-100" style="object-fit: cover;" alt="Silverback Gorilla">
                        </div>
                    </div>
                    <div class="col-lg-6 px-3 px-md-4">
                        <div class="anim-element glass-panel" style="background: rgba(255, 255, 255, 0.35); border-color: rgba(255,255,255,0.6);">
                            <span class="text-plum fw-bold text-uppercase mb-3 d-block" style="letter-spacing: 2px;">CHAPTER 06</span>
                            <h2 class="marker-title text-dark mb-4" style="font-size: 4.5rem; line-height: 1;">THE SILVERBACK</h2>
                            <p class="fs-4 text-dark mb-5 fw-medium" style="opacity: 0.9;">Venture deeper into the mist. Encounter the intelligent and powerful leaders of the forest, guiding their families with gentle strength.</p>
                            
                            <div class="d-flex align-items-center">
                                <span class="text-plum fw-bold me-4" style="font-size: 3.5rem; line-height: 1;">06</span>
                                <div style="width: 3px; height: 50px; background-color: rgba(0,0,0,0.3);" class="me-4"></div>
                                <p class="text-dark mb-0 fs-5 fw-bold">Observe the incredible social bonds of our closest relatives.</p>
                            </div>

                            <button class="panorama-btn mt-4 bg-plum text-white" onclick="openPanorama('https://upload.wikimedia.org/wikipedia/commons/1/13/Kohama_Island%2C_Mangrove_360-degree.jpg', 'The Silverback')">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter 360 Habitat
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 7: OCEAN DEPTHS -->
        <section class="chapter-section position-relative" id="chapter-7">
            <div class="position-absolute w-100 h-100 z-0 anim-bg" style="background-image: url('{{ asset('images/placeholders/coral.png') }}'); background-size: cover; background-position: center; filter: blur(12px); transform: scale(1.15);"></div>
            <div class="position-absolute w-100 h-100 z-1" style="background-color: rgba(44, 62, 80, 0.85); backdrop-filter: blur(10px);"></div>
            
            <div class="container h-100 d-flex align-items-center position-relative z-2">
                <div class="row w-100 align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1 px-3 px-md-4 mt-5 mt-lg-0">
                        <div class="anim-element glass-panel-dark">
                            <span class="text-teal fw-bold text-uppercase mb-3 d-block" style="letter-spacing: 2px;">CHAPTER 07</span>
                            <h2 class="marker-title text-white mb-4" style="font-size: 4.5rem; line-height: 1;">OCEAN DEPTHS</h2>
                            <p class="fs-4 text-white mb-5" style="opacity: 0.95;">Submerge into the alien world beneath the waves. Glide alongside the undisputed apex predators of the deep blue.</p>
                            
                            <div class="d-flex align-items-center">
                                <span class="text-teal fw-bold me-4" style="font-size: 3.5rem; line-height: 1;">07</span>
                                <div style="width: 2px; height: 50px; background-color: rgba(255,255,255,0.4);" class="me-4"></div>
                                <p class="text-white mb-0 fs-5 fw-medium">Swim with the great white sharks in perfect silence.</p>
                            </div>

                            <button class="panorama-btn mt-4 bg-teal text-white" onclick="openPanorama('https://upload.wikimedia.org/wikipedia/commons/d/d3/Lady_Elliot_Island_SVII.jpg', 'Ocean Depths')">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter 360 Habitat
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 px-3 px-md-4">
                        <div class="anim-element blob-container blob-shape-3 mx-auto blob-showcase shadow-lg border border-white border-opacity-25" style="width: 100%; aspect-ratio: 1/1; max-width: 500px;">
                            <img src="{{ asset('images/placeholders/shark.png') }}" class="blob-img w-100 h-100" style="object-fit: cover;" alt="Great White Shark">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 8: CANOPY KINGS -->
        <section class="chapter-section position-relative" id="chapter-8">
            <div class="position-absolute w-100 h-100 z-0 anim-bg" style="background-image: url('{{ asset('images/placeholders/jungle.png') }}'); background-size: cover; background-position: center; filter: blur(12px); transform: scale(1.15);"></div>
            <div class="position-absolute w-100 h-100 z-1" style="background-color: rgba(129, 56, 97, 0.75); backdrop-filter: blur(10px);"></div>
            
            <div class="container h-100 d-flex align-items-center position-relative z-2">
                <div class="row w-100 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0 px-3 px-md-4">
                        <div class="anim-element blob-container blob-shape-4 mx-auto blob-showcase shadow-lg border border-white border-opacity-25" style="width: 100%; aspect-ratio: 1/1; max-width: 500px;">
                            <img src="{{ asset('images/placeholders/macaw.png') }}" class="blob-img w-100 h-100" style="object-fit: cover;" alt="Macaw">
                        </div>
                    </div>
                    <div class="col-lg-6 px-3 px-md-4">
                        <div class="anim-element glass-panel">
                            <span class="text-yellow fw-bold text-uppercase mb-3 d-block" style="letter-spacing: 2px;">CHAPTER 08</span>
                            <h2 class="marker-title text-white mb-4" style="font-size: 4.5rem; line-height: 1;">CANOPY KINGS</h2>
                            <p class="fs-4 text-white mb-5" style="opacity: 0.95;">Look up to the highest branches. A kaleidoscope of colors flashes through the leaves as the vibrant kings of the canopy take flight.</p>
                            
                            <div class="d-flex align-items-center">
                                <span class="text-yellow fw-bold me-4" style="font-size: 3.5rem; line-height: 1;">08</span>
                                <div style="width: 2px; height: 50px; background-color: rgba(255,255,255,0.3);" class="me-4"></div>
                                <p class="text-white mb-0 fs-5 fw-medium">Listen to the chorus of the scarlet macaws.</p>
                            </div>

                            <button class="panorama-btn mt-4 bg-yellow text-dark" onclick="openPanorama('https://upload.wikimedia.org/wikipedia/commons/8/87/Spooky_bamboo_morning_-_Panorama_%28Dimitrios_Savva_and_Jarod_Guest_via_Poly_Haven%29.jpg', 'Canopy Kings')">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter 360 Habitat
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 9: FOREST GIANTS -->
        <section class="chapter-section position-relative" id="chapter-9">
            <div class="position-absolute w-100 h-100 z-0 anim-bg" style="background-image: url('{{ asset('images/placeholders/polar.png') }}'); background-size: cover; background-position: center; filter: blur(12px); transform: scale(1.15);"></div>
            <div class="position-absolute w-100 h-100 z-1" style="background-color: rgba(0, 134, 145, 0.7); backdrop-filter: blur(10px);"></div>
            
            <div class="container h-100 d-flex align-items-center position-relative z-2">
                <div class="row w-100 align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1 px-3 px-md-4 mt-5 mt-lg-0">
                        <div class="anim-element glass-panel">
                            <span class="text-yellow fw-bold text-uppercase mb-3 d-block" style="letter-spacing: 2px;">CHAPTER 09</span>
                            <h2 class="marker-title text-white mb-4" style="font-size: 4.5rem; line-height: 1;">FOREST GIANTS</h2>
                            <p class="fs-4 text-white mb-5" style="opacity: 0.95;">Wander through the frozen northern pine forests. Meet the undisputed masters of the wilderness, built for power and endurance.</p>
                            
                            <div class="d-flex align-items-center">
                                <span class="text-yellow fw-bold me-4" style="font-size: 3.5rem; line-height: 1;">09</span>
                                <div style="width: 2px; height: 50px; background-color: rgba(255,255,255,0.4);" class="me-4"></div>
                                <p class="text-white mb-0 fs-5 fw-medium">Encounter the majestic grizzly bear in its domain.</p>
                            </div>

                            <button class="panorama-btn mt-4 bg-teal text-white" onclick="openPanorama('https://upload.wikimedia.org/wikipedia/commons/d/d3/El_Teide_Tenerife_Photosphere.jpg', 'Forest Giants')">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter 360 Habitat
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 px-3 px-md-4">
                        <div class="anim-element blob-container blob-shape-1 mx-auto blob-showcase shadow-lg border border-white border-opacity-25" style="width: 100%; aspect-ratio: 1/1; max-width: 500px;">
                            <img src="{{ asset('images/placeholders/bear.png') }}" class="blob-img w-100 h-100" style="object-fit: cover;" alt="Grizzly Bear">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHAPTER 10: DESERT DRAGONS -->
        <section class="chapter-section position-relative" id="chapter-10">
            <div class="position-absolute w-100 h-100 z-0 anim-bg" style="background-image: url('{{ asset('images/placeholders/savannah.png') }}'); background-size: cover; background-position: center; filter: blur(12px); transform: scale(1.15);"></div>
            <div class="position-absolute w-100 h-100 z-1" style="background-color: rgba(241, 178, 0, 0.7); backdrop-filter: blur(10px);"></div>
            
            <div class="container h-100 d-flex align-items-center position-relative z-2">
                <div class="row w-100 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0 px-3 px-md-4">
                        <div class="anim-element blob-container blob-shape-2 mx-auto blob-showcase shadow-lg border border-white border-opacity-50" style="width: 100%; aspect-ratio: 1/1; max-width: 500px;">
                            <img src="{{ asset('images/placeholders/komodo.png') }}" class="blob-img w-100 h-100" style="object-fit: cover;" alt="Komodo Dragon">
                        </div>
                    </div>
                    <div class="col-lg-6 px-3 px-md-4">
                        <div class="anim-element glass-panel" style="background: rgba(255, 255, 255, 0.35); border-color: rgba(255,255,255,0.6);">
                            <span class="text-plum fw-bold text-uppercase mb-3 d-block" style="letter-spacing: 2px;">CHAPTER 10</span>
                            <h2 class="marker-title text-dark mb-4" style="font-size: 4.5rem; line-height: 1;">DESERT DRAGONS</h2>
                            <p class="fs-4 text-dark mb-5 fw-medium" style="opacity: 0.9;">Step into the harsh, arid landscapes where prehistoric survivors still rule. The true dragons of the modern world.</p>
                            
                            <div class="d-flex align-items-center mb-5">
                                <span class="text-plum fw-bold me-4" style="font-size: 3.5rem; line-height: 1;">10</span>
                                <div style="width: 3px; height: 50px; background-color: rgba(0,0,0,0.3);" class="me-4"></div>
                                <p class="text-dark mb-0 fs-5 fw-bold">Come face to face with the ancient Komodo Dragon.</p>
                            </div>
                            
                            <button class="panorama-btn mt-4 bg-plum text-white" onclick="openPanorama('https://upload.wikimedia.org/wikipedia/commons/e/e3/Grand_Canyon_National_Park-_Desert_View_Point_and_Watchtower.jpg', 'Desert Dragons')">
                                <i class="fa-solid fa-vr-cardboard"></i> Enter 360 Habitat
                            </button>
                            
                            <div class="mt-4">
                                 <a href="{{ route('home') }}" class="btn-zoo bg-plum text-white text-decoration-none shadow-lg px-5 py-3 fs-5 fw-bold rounded-pill">Complete Your Journey</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- 360 Panorama Overlay -->
    <div id="panorama-overlay">
        <i class="fa-solid fa-xmark close-panorama" onclick="closePanorama()"></i>
        <h2 id="panorama-title" class="marker-title text-white mb-4" style="font-size: 3rem;"></h2>
        <div id="panorama-container"></div>
        <p class="text-white-50 mt-3"><i class="fa-solid fa-mouse me-2"></i>Drag to explore the habitat in 360°</p>
    </div>

    <!-- GSAP Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            gsap.registerPlugin(ScrollTrigger);

            // 1. HERO SECTION
            gsap.from('.anim-hero', {
                y: 50,
                opacity: 0,
                duration: 1,
                stagger: 0.2,
                ease: "power3.out"
            });

            gsap.to('.anim-hero', {
                y: -100,
                opacity: 0,
                scrollTrigger: {
                    trigger: "#hero",
                    start: "top top",
                    end: "bottom top",
                    scrub: true
                }
            });

            // 2. CHAPTER SECTIONS
            const chapters = document.querySelectorAll('.chapter-section');

            chapters.forEach((section, index) => {
                const elements = section.querySelectorAll('.anim-element');
                const bg = section.querySelector('.anim-bg');

                // A. Independent fade-in for elements (NOT scrubbed)
                gsap.fromTo(elements, 
                    { y: 50, autoAlpha: 0 }, 
                    { 
                        y: 0, 
                        autoAlpha: 1, 
                        duration: 0.8, 
                        stagger: 0.1, 
                        ease: "power2.out",
                        scrollTrigger: {
                            trigger: section,
                            start: "top 70%",
                            toggleActions: "play none none reverse"
                        }
                    }
                );

                // B. The Scrubbed Pinning Timeline
                const tl = gsap.timeline({
                    scrollTrigger: {
                        trigger: section,
                        start: "top top",
                        end: "+=120%", // Keeps the section pinned exactly 1 viewport height + 20%
                        pin: true,
                        pinSpacing: index === chapters.length - 1 ? true : false, // Creates the full-screen slide over effect
                        scrub: 1,
                        anticipatePin: 1
                    }
                });

                // Subtle background scale-down effect
                tl.to(bg, {
                    scale: 1, // Scale from 1.15 to 1.0
                    duration: 2,
                    ease: "none"
                }, 0);

                // WE COMPLETELY REMOVED THE TEXT FADE OUT
                // This means the text stays firmly on the screen while the section is pinned.
                // When you scroll, the next section slides perfectly over the current one,
                // guaranteeing that at any given moment, the screen is covered with content!
            });
            
            // Add bounce animation to scroll indicator
            gsap.to('#scroll-indicator i', {
                y: 10,
                repeat: -1,
                yoyo: true,
                duration: 1,
                ease: "power1.inOut"
            });
        });

        // 360 Panorama Logic
        let viewer = null;

        function openPanorama(imageUrl, title) {
            const overlay = document.getElementById('panorama-overlay');
            const titleElem = document.getElementById('panorama-title');
            
            titleElem.innerText = title;
            overlay.style.display = 'flex';
            document.body.style.overflow = 'hidden';

            if (viewer) {
                viewer.destroy();
            }

            viewer = pannellum.viewer('panorama-container', {
                "type": "equirectangular",
                "panorama": imageUrl,
                "autoLoad": true,
                "compass": true,
                "showZoomCtrl": true,
                "mouseZoom": false
            });
        }

        function closePanorama() {
            const overlay = document.getElementById('panorama-overlay');
            overlay.style.display = 'none';
            document.body.style.overflow = 'auto';
            
            if (viewer) {
                viewer.destroy();
                viewer = null;
            }
        }
    </script>
</body>
</html>
