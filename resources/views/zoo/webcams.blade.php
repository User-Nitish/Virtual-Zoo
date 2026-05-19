@extends('layouts.zoo')

@section('content')
<!-- Main Container with balanced navbar offset -->
<section class="container min-vh-screen" style="padding-top: 120px;">
    <div class="text-center mb-10" data-aos="fade-up">
        <h1 class="marker-title text-plum" style="font-size: 5rem; letter-spacing: -2px;">Live <span class="text-yellow">Cams</span></h1>
        <p class="fs-4 text-muted mx-auto" style="max-width: 800px; font-weight: 300;">Real-time surveillance from our satellite network. Experience the pulse of the wild across the globe.</p>
    </div>

    <div class="row g-5 justify-content-center pb-5">
        <!-- Webcam Card 1: African Wildlife -->
        <div class="col-lg-6" data-aos="zoom-in">
            <div class="cam-card">
                <div class="cam-viewport ratio ratio-16x9">
                    <!-- Verified Embeddable Stream -->
                    <iframe src="https://www.youtube.com/embed/ru0_t4H1TLA?autoplay=1&mute=1&modestbranding=1&rel=0&loop=1&playlist=ru0_t4H1TLA" 
                            title="African Wildlife" frameborder="0" loading="lazy"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                    <!-- CCTV Overlay System -->
                    <div class="cctv-overlay">
                        <div class="vignette"></div>
                        <div class="scanline"></div>
                        <div class="digital-noise"></div>
                        
                        <!-- Top Bar UI -->
                        <div class="overlay-top d-flex justify-content-between w-100 p-4">
                            <div class="live-indicator">
                                <span class="pulse-red"></span>
                                <span class="status-text">LIVE</span>
                            </div>
                            <div class="cam-data font-monospace">
                                CAM-01 / <span id="clock-1"></span>
                            </div>
                        </div>

                        <!-- Bottom Bar UI -->
                        <div class="overlay-bottom d-flex justify-content-between align-items-end w-100 p-4">
                            <div class="location-data">
                                <div class="loc-coord">24.5888° S, 15.8277° E</div>
                                <div class="loc-name">NAMIB DESERT, NAMIBIA</div>
                            </div>
                            <div class="signal-ui d-flex gap-3 align-items-center">
                                <div class="viewer-count">
                                    <i class="fa-solid fa-users me-1"></i> <span class="v-count">1.4K</span>
                                </div>
                                <div class="signal-bars">
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                    <div class="bar"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Fullscreen Toggle (UI only) -->
                        <div class="fullscreen-btn">
                            <i class="fa-solid fa-expand"></i>
                        </div>
                    </div>
                </div>
                <div class="cam-info p-4">
                    <h3 class="marker-title text-teal fs-2 mb-2">Namib Desert Watering Hole</h3>
                    <p class="text-muted mb-0">Direct satellite link-up with the arid NamibRand Nature Reserve. Monitoring desert-adapted wildlife.</p>
                </div>
            </div>
        </div>
        
        <!-- Webcam Card 2: Brown Bears -->
        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="cam-card">
                <div class="cam-viewport ratio ratio-16x9">
                    <!-- Verified Embeddable Stream -->
                    <iframe src="https://www.youtube.com/embed/DGLU6Rz1TDA?autoplay=1&mute=1&modestbranding=1&rel=0&loop=1&playlist=DGLU6Rz1TDA" 
                            title="Grizzly Bears" frameborder="0" loading="lazy"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                    <div class="cctv-overlay">
                        <div class="vignette"></div>
                        <div class="scanline"></div>
                        <div class="digital-noise"></div>
                        
                        <div class="overlay-top d-flex justify-content-between w-100 p-4">
                            <div class="live-indicator">
                                <span class="pulse-red"></span>
                                <span class="status-text">LIVE</span>
                            </div>
                            <div class="cam-data font-monospace">
                                CAM-02 / <span id="clock-2"></span>
                            </div>
                        </div>

                        <div class="overlay-bottom d-flex justify-content-between align-items-end w-100 p-4">
                            <div class="location-data">
                                <div class="loc-coord">49.3789° N, 123.0811° W</div>
                                <div class="loc-name">GROUSE MOUNTAIN, BC</div>
                            </div>
                            <div class="signal-ui d-flex gap-3 align-items-center">
                                <div class="viewer-count">
                                    <i class="fa-solid fa-users me-1"></i> <span class="v-count">920</span>
                                </div>
                                <div class="signal-bars">
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                </div>
                            </div>
                        </div>
                        <div class="fullscreen-btn">
                            <i class="fa-solid fa-expand"></i>
                        </div>
                    </div>
                </div>
                <div class="cam-info p-4">
                    <h3 class="marker-title text-teal fs-2 mb-2">Grizzly Peak Surveillance</h3>
                    <p class="text-muted mb-0">Remote monitoring of Grinder and Coola, our resident grizzlies. Observing foraging behavior.</p>
                </div>
            </div>
        </div>

        <!-- Webcam Card 3: Panda Cam -->
        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="cam-card">
                <div class="cam-viewport ratio ratio-16x9">
                    <!-- Verified Embeddable Stream -->
                    <iframe src="https://www.youtube.com/embed/YdP2fFyjBWQ?autoplay=1&mute=1&modestbranding=1&rel=0&loop=1&playlist=YdP2fFyjBWQ" 
                            title="Giant Panda" frameborder="0" loading="lazy"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                    <div class="cctv-overlay">
                        <div class="vignette"></div>
                        <div class="scanline"></div>
                        <div class="digital-noise"></div>
                        
                        <div class="overlay-top d-flex justify-content-between w-100 p-4">
                            <div class="live-indicator">
                                <span class="pulse-red"></span>
                                <span class="status-text">LIVE</span>
                            </div>
                            <div class="cam-data font-monospace">
                                CAM-03 / <span id="clock-3"></span>
                            </div>
                        </div>

                        <div class="overlay-bottom d-flex justify-content-between align-items-end w-100 p-4">
                            <div class="location-data">
                                <div class="loc-coord">30.8876° N, 103.1455° E</div>
                                <div class="loc-name">WOLONG GROVE, CHINA</div>
                            </div>
                            <div class="signal-ui d-flex gap-3 align-items-center">
                                <div class="viewer-count">
                                    <i class="fa-solid fa-users me-1"></i> <span class="v-count">3.2K</span>
                                </div>
                                <div class="signal-bars">
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                </div>
                            </div>
                        </div>
                        <div class="fullscreen-btn">
                            <i class="fa-solid fa-expand"></i>
                        </div>
                    </div>
                </div>
                <div class="cam-info p-4">
                    <h3 class="marker-title text-teal fs-2 mb-2">Panda Wolong Grove</h3>
                    <p class="text-muted mb-0">High-stability link with the Gengda Wolong Giant Panda Center. Monitoring growth and social play.</p>
                </div>
            </div>
        </div>

        <!-- Webcam Card 4: Shark Lagoon -->
        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="600">
            <div class="cam-card">
                <div class="cam-viewport ratio ratio-16x9">
                    <!-- Verified Embeddable Stream -->
                    <iframe src="https://www.youtube.com/embed/EFk6S8R_p6Y?autoplay=1&mute=1&modestbranding=1&rel=0&loop=1&playlist=EFk6S8R_p6Y" 
                            title="Shark Lagoon" frameborder="0" loading="lazy"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                    <div class="cctv-overlay">
                        <div class="vignette"></div>
                        <div class="scanline"></div>
                        <div class="digital-noise"></div>
                        
                        <div class="overlay-top d-flex justify-content-between w-100 p-4">
                            <div class="live-indicator">
                                <span class="pulse-red"></span>
                                <span class="status-text">LIVE</span>
                            </div>
                            <div class="cam-data font-monospace">
                                CAM-04 / <span id="clock-4"></span>
                            </div>
                        </div>

                        <div class="overlay-bottom d-flex justify-content-between align-items-end w-100 p-4">
                            <div class="location-data">
                                <div class="loc-coord">33.7617° N, 118.1903° W</div>
                                <div class="loc-name">AQUARIUM OF THE PACIFIC</div>
                            </div>
                            <div class="signal-ui d-flex gap-3 align-items-center">
                                <div class="viewer-count">
                                    <i class="fa-solid fa-users me-1"></i> <span class="v-count">2.8K</span>
                                </div>
                                <div class="signal-bars">
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                </div>
                            </div>
                        </div>
                        <div class="fullscreen-btn">
                            <i class="fa-solid fa-expand"></i>
                        </div>
                    </div>
                </div>
                <div class="cam-info p-4">
                    <h3 class="marker-title text-teal fs-2 mb-2">Pacific Shark Lagoon</h3>
                    <p class="text-muted mb-0">Underwater monitoring station for Sand Tiger, Zebra, and Blacktip Reef Sharks.</p>
                </div>
            </div>
        </div>
        <!-- Webcam Card 5: Gorillas -->
        <div class="col-lg-6" data-aos="zoom-in">
            <div class="cam-card">
                <div class="cam-viewport ratio ratio-16x9">
                    <!-- Verified Embeddable Stream -->
                    <iframe src="https://www.youtube.com/embed/MpiHQUCT1Cc?autoplay=1&mute=1&modestbranding=1&rel=0&loop=1&playlist=MpiHQUCT1Cc" 
                            title="Grace Gorillas" frameborder="0" loading="lazy"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                    <div class="cctv-overlay">
                        <div class="vignette"></div>
                        <div class="scanline"></div>
                        <div class="digital-noise"></div>
                        
                        <div class="overlay-top d-flex justify-content-between w-100 p-4">
                            <div class="live-indicator">
                                <span class="pulse-red"></span>
                                <span class="status-text">LIVE</span>
                            </div>
                            <div class="cam-data font-monospace">
                                CAM-05 / <span id="clock-5"></span>
                            </div>
                        </div>

                        <div class="overlay-bottom d-flex justify-content-between align-items-end w-100 p-4">
                            <div class="location-data">
                                <div class="loc-coord">1.2583° S, 29.2319° E</div>
                                <div class="loc-name">GRACE GORILLAS, DR CONGO</div>
                            </div>
                            <div class="signal-ui d-flex gap-3 align-items-center">
                                <div class="viewer-count">
                                    <i class="fa-solid fa-users me-1"></i> <span class="v-count">4.1K</span>
                                </div>
                                <div class="signal-bars">
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                </div>
                            </div>
                        </div>
                        <div class="fullscreen-btn">
                            <i class="fa-solid fa-expand"></i>
                        </div>
                    </div>
                </div>
                <div class="cam-info p-4">
                    <h3 class="marker-title text-teal fs-2 mb-2">Eastern Lowland Gorillas</h3>
                    <p class="text-muted mb-0">Live feed from the GRACE Sanctuary. Watch these critically endangered primates interact in their forested habitat.</p>
                </div>
            </div>
        </div>

        <!-- Webcam Card 6: Penguin Habitat -->
        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="cam-card">
                <div class="cam-viewport ratio ratio-16x9">
                    <!-- Verified Embeddable Stream -->
                    <iframe src="https://www.youtube.com/embed/A9mbCNs47FI?autoplay=1&mute=1&modestbranding=1&rel=0&loop=1&playlist=A9mbCNs47FI" 
                            title="Penguin Habitat" frameborder="0" loading="lazy"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                    <div class="cctv-overlay">
                        <div class="vignette"></div>
                        <div class="scanline"></div>
                        <div class="digital-noise"></div>
                        
                        <div class="overlay-top d-flex justify-content-between w-100 p-4">
                            <div class="live-indicator">
                                <span class="pulse-red"></span>
                                <span class="status-text">LIVE</span>
                            </div>
                            <div class="cam-data font-monospace">
                                CAM-06 / <span id="clock-6"></span>
                            </div>
                        </div>

                        <div class="overlay-bottom d-flex justify-content-between align-items-end w-100 p-4">
                            <div class="location-data">
                                <div class="loc-coord">36.6183° N, 121.9015° W</div>
                                <div class="loc-name">MONTEREY BAY AQUARIUM</div>
                            </div>
                            <div class="signal-ui d-flex gap-3 align-items-center">
                                <div class="viewer-count">
                                    <i class="fa-solid fa-users me-1"></i> <span class="v-count">3.4K</span>
                                </div>
                                <div class="signal-bars">
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                    <div class="bar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="fullscreen-btn">
                            <i class="fa-solid fa-expand"></i>
                        </div>
                    </div>
                </div>
                <div class="cam-info p-4">
                    <h3 class="marker-title text-teal fs-2 mb-2">African Penguin Cam</h3>
                    <p class="text-muted mb-0">Underwater and surface monitoring of the active African Penguin colony. Watch their aerodynamic swimming.</p>
                </div>
            </div>
        </div>

        <!-- Webcam Card 7: Elephant Sanctuary -->
        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="cam-card">
                <div class="cam-viewport ratio ratio-16x9">
                    <!-- Verified Embeddable Stream -->
                    <iframe src="https://www.youtube.com/embed/e1Ut_3NoYb8?autoplay=1&mute=1&modestbranding=1&rel=0&loop=1&playlist=e1Ut_3NoYb8" 
                            title="Elephant Sanctuary" frameborder="0" loading="lazy"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                    <div class="cctv-overlay">
                        <div class="vignette"></div>
                        <div class="scanline"></div>
                        <div class="digital-noise"></div>
                        
                        <div class="overlay-top d-flex justify-content-between w-100 p-4">
                            <div class="live-indicator">
                                <span class="pulse-red"></span>
                                <span class="status-text">LIVE</span>
                            </div>
                            <div class="cam-data font-monospace">
                                CAM-07 / <span id="clock-7"></span>
                            </div>
                        </div>

                        <div class="overlay-bottom d-flex justify-content-between align-items-end w-100 p-4">
                            <div class="location-data">
                                <div class="loc-coord">27.0435° S, 32.4287° E</div>
                                <div class="loc-name">TEMBE ELEPHANT PARK, SA</div>
                            </div>
                            <div class="signal-ui d-flex gap-3 align-items-center">
                                <div class="viewer-count">
                                    <i class="fa-solid fa-users me-1"></i> <span class="v-count">5.1K</span>
                                </div>
                                <div class="signal-bars">
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                </div>
                            </div>
                        </div>
                        <div class="fullscreen-btn">
                            <i class="fa-solid fa-expand"></i>
                        </div>
                    </div>
                </div>
                <div class="cam-info p-4">
                    <h3 class="marker-title text-teal fs-2 mb-2">Tembe Elephant Park</h3>
                    <p class="text-muted mb-0">High-definition live feed of the world's largest African elephants gathering around a vital water source.</p>
                </div>
            </div>
        </div>

        <!-- Webcam Card 8: Tropical Reef -->
        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="600">
            <div class="cam-card">
                <div class="cam-viewport ratio ratio-16x9">
                    <!-- Verified Embeddable Stream -->
                    <iframe src="https://www.youtube.com/embed/843Rpqza_6o?autoplay=1&mute=1&modestbranding=1&rel=0&loop=1&playlist=843Rpqza_6o" 
                            title="Tropical Reef" frameborder="0" loading="lazy"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                    <div class="cctv-overlay">
                        <div class="vignette"></div>
                        <div class="scanline"></div>
                        <div class="digital-noise"></div>
                        
                        <div class="overlay-top d-flex justify-content-between w-100 p-4">
                            <div class="live-indicator">
                                <span class="pulse-red"></span>
                                <span class="status-text">LIVE</span>
                            </div>
                            <div class="cam-data font-monospace">
                                CAM-08 / <span id="clock-8"></span>
                            </div>
                        </div>

                        <div class="overlay-bottom d-flex justify-content-between align-items-end w-100 p-4">
                            <div class="location-data">
                                <div class="loc-coord">21.2891° N, 157.8305° W</div>
                                <div class="loc-name">HONOLULU REEF TRENCH</div>
                            </div>
                            <div class="signal-ui d-flex gap-3 align-items-center">
                                <div class="viewer-count">
                                    <i class="fa-solid fa-users me-1"></i> <span class="v-count">1.9K</span>
                                </div>
                                <div class="signal-bars">
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                    <div class="bar active"></div>
                                </div>
                            </div>
                        </div>
                        <div class="fullscreen-btn">
                            <i class="fa-solid fa-expand"></i>
                        </div>
                    </div>
                </div>
                <div class="cam-info p-4">
                    <h3 class="marker-title text-teal fs-2 mb-2">Honolulu Tropical Reef</h3>
                    <p class="text-muted mb-0">Deep ocean surveillance. Discover the mesmerizing colors and thriving biodiversity of this protected reef ecosystem.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Cinematic Cam Card */
    .cam-card {
        background: #fff;
        border-radius: 35px;
        overflow: hidden;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        border: 1px solid rgba(0,0,0,0.05);
        position: relative;
        z-index: 1;
    }

    /* Subtle Ambient Glow */
    .cam-card::before {
        content: '';
        position: absolute;
        inset: -2px;
        background: linear-gradient(45deg, #008691, #f9c80e, #008691);
        z-index: -1;
        opacity: 0;
        transition: opacity 0.5s ease;
        border-radius: 37px;
        filter: blur(15px);
    }

    .cam-card:hover {
        transform: translateY(-15px) scale(1.03);
        box-shadow: 0 40px 80px -20px rgba(0, 134, 145, 0.3);
        border-color: rgba(0, 134, 145, 0.3);
    }

    .cam-card:hover::before {
        opacity: 0.4;
        animation: border-glow 4s linear infinite;
    }

    @keyframes border-glow {
        0% { filter: hue-rotate(0deg); }
        100% { filter: hue-rotate(360deg); }
    }

    /* Viewport & Effects */
    .cam-viewport {
        position: relative;
        background: #000;
        border-radius: 35px 35px 0 0;
        overflow: hidden;
    }

    .cam-viewport iframe {
        transition: transform 1.2s cubic-bezier(0.2, 0, 0.2, 1);
        width: 100%;
        height: 100%;
    }

    .cam-card:hover iframe {
        transform: scale(1.1);
    }

    /* CCTV Overlay System */
    .cctv-overlay {
        position: absolute;
        inset: 0;
        pointer-events: none;
        z-index: 5;
        color: rgba(255, 255, 255, 0.9);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .vignette {
        position: absolute;
        inset: 0;
        background: radial-gradient(circle, transparent 30%, rgba(0,0,0,0.7) 100%);
        mix-blend-mode: multiply;
    }

    .scanline {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 15px;
        background: linear-gradient(to bottom, transparent, rgba(255,255,255,0.08), transparent);
        animation: scanline-scroll 8s linear infinite;
        z-index: 6;
    }

    @keyframes scanline-scroll {
        0% { top: -10%; }
        100% { top: 110%; }
    }

    .digital-noise {
        position: absolute;
        inset: 0;
        background: url('https://upload.wikimedia.org/wikipedia/commons/7/77/Noise_TV.gif');
        opacity: 0.03;
        mix-blend-mode: overlay;
    }

    /* Overlay Elements */
    .overlay-top, .overlay-bottom {
        position: relative;
        z-index: 10;
    }

    .live-indicator {
        display: flex;
        align-items: center;
        gap: 12px;
        background: rgba(0,0,0,0.6);
        padding: 6px 18px;
        border-radius: 100px;
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.15);
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    }

    .pulse-red {
        width: 10px;
        height: 10px;
        background: #ff3333;
        border-radius: 50%;
        box-shadow: 0 0 15px #ff3333;
        animation: pulse-indicator 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    @keyframes pulse-indicator {
        0%, 100% { transform: scale(1); opacity: 1; box-shadow: 0 0 10px #ff3333; }
        50% { transform: scale(1.4); opacity: 0.6; box-shadow: 0 0 20px #ff3333; }
    }

    .status-text {
        font-size: 0.8rem;
        font-weight: 800;
        letter-spacing: 3px;
        color: #fff;
    }

    .cam-data {
        background: rgba(0,0,0,0.6);
        padding: 6px 18px;
        border-radius: 8px;
        font-size: 0.85rem;
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.1);
        letter-spacing: 1px;
    }

    /* Info Bar */
    .location-data {
        text-shadow: 0 2px 10px rgba(0,0,0,0.9);
    }

    .loc-coord {
        font-size: 0.75rem;
        opacity: 0.8;
        font-family: 'Courier New', Courier, monospace;
        letter-spacing: 1px;
    }

    .loc-name {
        font-size: 1rem;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    /* Signal Strength UI */
    .signal-ui {
        background: rgba(0,0,0,0.6);
        padding: 8px 15px;
        border-radius: 12px;
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.1);
    }

    .signal-bars {
        display: flex;
        align-items: flex-end;
        gap: 4px;
        height: 18px;
    }

    .bar {
        width: 4px;
        background: rgba(255,255,255,0.15);
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    .bar:nth-child(1) { height: 6px; }
    .bar:nth-child(2) { height: 10px; }
    .bar:nth-child(3) { height: 14px; }
    .bar:nth-child(4) { height: 18px; }

    .bar.active {
        background: #00d2ff; /* Cyber blue */
        box-shadow: 0 0 10px rgba(0, 210, 255, 0.8);
    }

    .viewer-count {
        font-size: 0.8rem;
        font-weight: 600;
        color: #f9c80e;
    }

    /* Fullscreen Button */
    .fullscreen-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.5);
        background: rgba(0, 134, 145, 0.9);
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        opacity: 0;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        pointer-events: auto;
        color: white;
        box-shadow: 0 0 30px rgba(0, 134, 145, 0.5);
    }

    .cam-card:hover .fullscreen-btn {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }

    .fullscreen-btn:hover {
        background: #00aebc;
        transform: translate(-50%, -50%) scale(1.15) rotate(90deg) !important;
    }

    /* Info Section */
    .cam-info {
        background: #fff;
        transition: all 0.4s ease;
    }

    .cam-card:hover .cam-info {
        background: #f8f9fa;
        padding-bottom: 2.5rem !important;
    }
</style>

@push('scripts')
<script>
    function updateClocks() {
        const now = new Date();
        const timeString = now.toLocaleTimeString([], { hour12: false, hour: '2-digit', minute: '2-digit', second: '2-digit' });
        for(let i=1; i<=8; i++) {
            const el = document.getElementById('clock-' + i);
            if(el) el.textContent = timeString;
        }
    }
    
    // Smooth Viewer Count Animation
    function updateViewers() {
        document.querySelectorAll('.v-count').forEach(el => {
            const current = parseFloat(el.textContent.replace('K', ''));
            const change = (Math.random() - 0.5) * 0.2;
            const newVal = Math.max(0.5, current + change).toFixed(1);
            el.textContent = newVal + (newVal > 5 ? '' : 'K');
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        setInterval(updateClocks, 1000);
        setInterval(updateViewers, 4000);
        updateClocks();

        // Add subtle movement to signal bars
        setInterval(() => {
            document.querySelectorAll('.signal-bars').forEach(group => {
                const bars = group.querySelectorAll('.bar');
                const lastBar = bars[3];
                if(Math.random() > 0.8) {
                    lastBar.classList.toggle('active');
                }
            });
        }, 2000);
    });
</script>
@endpush
@endsection
