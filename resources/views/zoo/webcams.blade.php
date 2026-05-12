@extends('layouts.zoo')

@section('content')
<section class="container py-5 min-vh-screen">
    <div class="text-center mb-16" data-aos="fade-down">
        <h1 class="marker-title text-plum" style="font-size: 4.5rem;">Live Cams</h1>
        <p class="fs-4 text-muted mx-auto" style="max-width: 800px;">Observe our residents in real-time. Experience the magic of the wild as it happens across the globe.</p>
    </div>

    <div class="row g-5 justify-content-center">
        <!-- Webcam Card 1: African Wildlife -->
        <div class="col-lg-6" data-aos="zoom-in">
            <div class="bg-white p-4 rounded-5 shadow-lg border border-light h-100">
                <div class="position-relative w-100 ratio ratio-16x9 rounded-4 overflow-hidden bg-black shadow-sm mb-4">
                    <!-- High-Stability YouTube No-Cookie Embed -->
                    <iframe src="https://www.youtube-nocookie.com/embed/O85vj_F0vFw?autoplay=1&mute=1&controls=0&modestbranding=1&loop=1&playlist=O85vj_F0vFw" 
                            title="African Wildlife" frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                    <!-- CCTV Overlay -->
                    <div class="cctv-overlay">
                        <div class="scanline"></div>
                        <div class="position-absolute top-0 start-0 m-4 d-flex align-items-center bg-black bg-opacity-50 backdrop-blur px-3 py-1 rounded-pill" style="z-index: 10;">
                            <span class="bg-danger rounded-circle pulse-red" style="width: 10px; height: 10px;"></span>
                            <span class="text-white small fw-bold text-uppercase ms-2" style="letter-spacing: 1px;">Live</span>
                        </div>
                        <div class="position-absolute top-0 end-0 m-4 text-white font-monospace small bg-black bg-opacity-50 px-2 py-1 rounded">
                            CAM-01 / <span id="clock-1"></span>
                        </div>
                        <div class="position-absolute bottom-0 start-0 m-4 text-white-50 small font-monospace">
                            SAVANNAH CROSSING / 2.3451° S, 37.3172° E
                        </div>
                    </div>
                </div>
                <div class="px-2">
                    <h3 class="marker-title text-teal fs-2 mb-2">African Watering Hole</h3>
                    <p class="text-muted mb-0">Witness magnificent creatures as they gather at the river's edge in the heart of the savanna.</p>
                </div>
            </div>
        </div>
        
        <!-- Webcam Card 2: Brown Bears -->
        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="bg-white p-4 rounded-5 shadow-lg border border-light h-100">
                <div class="position-relative w-100 ratio ratio-16x9 rounded-4 overflow-hidden bg-black shadow-sm mb-4">
                    <iframe src="https://www.youtube-nocookie.com/embed/8M8A2p_4tXU?autoplay=1&mute=1&controls=0&modestbranding=1&loop=1&playlist=8M8A2p_4tXU" 
                            title="Brown Bears" frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                    <div class="cctv-overlay">
                        <div class="scanline"></div>
                        <div class="position-absolute top-0 start-0 m-4 d-flex align-items-center bg-black bg-opacity-50 backdrop-blur px-3 py-1 rounded-pill" style="z-index: 10;">
                            <span class="bg-danger rounded-circle pulse-red" style="width: 10px; height: 10px;"></span>
                            <span class="text-white small fw-bold text-uppercase ms-2" style="letter-spacing: 1px;">Live</span>
                        </div>
                        <div class="position-absolute top-0 end-0 m-4 text-white font-monospace small bg-black bg-opacity-50 px-2 py-1 rounded">
                            CAM-02 / <span id="clock-2"></span>
                        </div>
                        <div class="position-absolute bottom-0 start-0 m-4 text-white-50 small font-monospace">
                            BROOKS FALLS / 58.5547° N, 155.7758° W
                        </div>
                    </div>
                </div>
                <div class="px-2">
                    <h3 class="marker-title text-teal fs-2 mb-2">Brooks Falls Bears</h3>
                    <p class="text-muted mb-0">Watch brown bears as they hunt for salmon at the world-famous Brooks Falls in Katmai National Park.</p>
                </div>
            </div>
        </div>

        <!-- Webcam Card 3: Shark Lagoon -->
        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="bg-white p-4 rounded-5 shadow-lg border border-light h-100">
                <div class="position-relative w-100 ratio ratio-16x9 rounded-4 overflow-hidden bg-black shadow-sm mb-4">
                    <iframe src="https://www.youtube-nocookie.com/embed/PoV1mZ_p_m8?autoplay=1&mute=1&controls=0&modestbranding=1&loop=1&playlist=PoV1mZ_p_m8" 
                            title="Shark Lagoon" frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                    <div class="cctv-overlay">
                        <div class="scanline"></div>
                        <div class="position-absolute top-0 start-0 m-4 d-flex align-items-center bg-black bg-opacity-50 backdrop-blur px-3 py-1 rounded-pill" style="z-index: 10;">
                            <span class="bg-danger rounded-circle pulse-red" style="width: 10px; height: 10px;"></span>
                            <span class="text-white small fw-bold text-uppercase ms-2" style="letter-spacing: 1px;">Live</span>
                        </div>
                        <div class="position-absolute top-0 end-0 m-4 text-white font-monospace small bg-black bg-opacity-50 px-2 py-1 rounded">
                            CAM-03 / <span id="clock-3"></span>
                        </div>
                        <div class="position-absolute bottom-0 start-0 m-4 text-white-50 small font-monospace">
                            PACIFIC ABYSS / 33.7617° N, 118.1903° W
                        </div>
                    </div>
                </div>
                <div class="px-2">
                    <h3 class="marker-title text-teal fs-2 mb-2">Pacific Shark Lagoon</h3>
                    <p class="text-muted mb-0">Dive into the deep blue and observe the graceful movements of sand tiger and blacktip reef sharks.</p>
                </div>
            </div>
        </div>

        <!-- Webcam Card 4: Tropical Reef -->
        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="600">
            <div class="bg-white p-4 rounded-5 shadow-lg border border-light h-100">
                <div class="position-relative w-100 ratio ratio-16x9 rounded-4 overflow-hidden bg-black shadow-sm mb-4">
                    <iframe src="https://www.youtube-nocookie.com/embed/pSIdf-t29Cg?autoplay=1&mute=1&controls=0&modestbranding=1&loop=1&playlist=pSIdf-t29Cg" 
                            title="Tropical Reef" frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                    <div class="cctv-overlay">
                        <div class="scanline"></div>
                        <div class="position-absolute top-0 start-0 m-4 d-flex align-items-center bg-black bg-opacity-50 backdrop-blur px-3 py-1 rounded-pill" style="z-index: 10;">
                            <span class="bg-danger rounded-circle pulse-red" style="width: 10px; height: 10px;"></span>
                            <span class="text-white small fw-bold text-uppercase ms-2" style="letter-spacing: 1px;">Live</span>
                        </div>
                        <div class="position-absolute top-0 end-0 m-4 text-white font-monospace small bg-black bg-opacity-50 px-2 py-1 rounded">
                            CAM-04 / <span id="clock-4"></span>
                        </div>
                        <div class="position-absolute bottom-0 start-0 m-4 text-white-50 small font-monospace">
                            PHILIPPINE REEF / 37.8012° N, 122.4583° W
                        </div>
                    </div>
                </div>
                <div class="px-2">
                    <h3 class="marker-title text-teal fs-2 mb-2">Tropical Reef Cam</h3>
                    <p class="text-muted mb-0">A vibrant window into the Philippine Coral Reef, one of the deepest live exhibits in the world.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    function updateClocks() {
        const now = new Date();
        const timeString = now.toLocaleTimeString([], { hour12: false, hour: '2-digit', minute: '2-digit', second: '2-digit' });
        for(let i=1; i<=4; i++) {
            const el = document.getElementById('clock-' + i);
            if(el) el.textContent = timeString;
        }
    }
    setInterval(updateClocks, 1000);
    updateClocks();
</script>
@endpush

<style>
    .ken-burns-container {
        width: 100%;
        height: 100%;
        overflow: hidden;
        background: #000;
    }
    
    .ken-burns-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(1);
        animation: ken-burns-anim 20s ease-in-out infinite alternate;
    }

    @keyframes ken-burns-anim {
        0% { transform: scale(1) translate(0, 0); }
        100% { transform: scale(1.2) translate(-2%, -2%); }
    }

    .cctv-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }
    
    .digital-noise {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('https://upload.wikimedia.org/wikipedia/commons/7/77/Noise_TV.gif');
        opacity: 0.03;
        z-index: 1;
    }

    .scanline {
        width: 100%;
        height: 4px;
        z-index: 5;
        background: rgba(255, 255, 255, 0.1);
        position: absolute;
        bottom: 100%;
        animation: scanline-anim 6s linear infinite;
    }

    @keyframes scanline-anim {
        0% { bottom: 100%; }
        100% { bottom: -5%; }
    }

    .pulse-red {
        animation: pulse-red-animation 2s infinite;
        box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7);
    }
    @keyframes pulse-red-animation {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(220, 53, 69, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(220, 53, 69, 0); }
    }
    .backdrop-blur {
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }
</style>

@push('scripts')
<script>
    function updateClocks() {
        const now = new Date();
        const timeString = now.toLocaleTimeString([], { hour12: false, hour: '2-digit', minute: '2-digit', second: '2-digit' });
        for(let i=1; i<=4; i++) {
            const el = document.getElementById('clock-' + i);
            if(el) el.textContent = timeString;
        }
    }
    setInterval(updateClocks, 1000);
    updateClocks();
</script>
@endpush

<style>
    .cctv-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }
    
    .scanline {
        width: 100%;
        height: 100px;
        z-index: 5;
        background: linear-gradient(0deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.05) 50%, rgba(255,255,255,0) 100%);
        opacity: 0.1;
        position: absolute;
        bottom: 100%;
        animation: scanline-anim 8s linear infinite;
    }

    @keyframes scanline-anim {
        0% { bottom: 100%; }
        100% { bottom: -20%; }
    }

    .pulse-red {
        animation: pulse-red-animation 2s infinite;
        box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7);
    }
    @keyframes pulse-red-animation {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(220, 53, 69, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(220, 53, 69, 0); }
    }
    .backdrop-blur {
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }
</style>
@endsection
