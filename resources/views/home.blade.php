@extends('layouts.app')

@section('title', 'Into the Wild - Neo Apex Virtual Zoo')

@section('content')

<!-- 1. HERO SCENE: ENTER THE WILD -->
<section class="py-5 mt-5 position-relative" id="hero" style="background-color: transparent; z-index: 1;">
    <div class="container py-5 mt-5">
        <div class="row align-items-center">
            
            <div class="col-lg-6 position-relative mb-5 mb-lg-0" data-aos="fade-right">
                <div class="bg-blob-yellow blob-shape-3" style="width: 250px; height: 250px; top: -50px; left: -20px;"></div>
                <div class="bg-blob-yellow blob-shape-1" style="width: 150px; height: 150px; bottom: -30px; right: 50px;"></div>
                
                <div class="blob-container blob-shape-2 z-1 shadow-lg" style="width: 100%; max-width: 500px; height: 450px; margin: 0 auto; display: block; border: 8px solid #fff;">
                    <img src="https://images.unsplash.com/photo-1614027164847-1b28cfe1df60" alt="Lion" class="blob-img">
                </div>
            </div>

            <div class="col-lg-6 ps-lg-5" data-aos="fade-left">
                <span class="text-plum fw-bold text-uppercase letter-spacing-2 mb-2 d-block" style="letter-spacing: 4px; font-size: 0.8rem;">Modern Wildlife Experience</span>
                <h1 class="marker-title text-dark" style="font-size: clamp(4rem, 8vw, 7rem); line-height: 0.8; margin-bottom: 20px;">BEHOLD THE <br><span class="text-teal">MAJESTY</span></h1>
                <p class="fs-4 mb-5 text-muted fw-medium" style="max-width: 500px;">
                    Step into a hidden world of magnificent creatures and untouched beauty. Your interactive journey into the heart of nature begins here.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('tour') }}" class="btn-zoo shadow-lg px-5 py-3">
                        <i class="fa-solid fa-map me-2"></i> Take a Tour
                    </a>
                    <a href="{{ route('modern.webcams') }}" class="btn-zoo btn-zoo-plum shadow-lg px-5 py-3">
                        <i class="fa-solid fa-video me-2"></i> Live Cams
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 2. RESIDENT SPOTLIGHT -->
<section id="spotlight" class="py-5 position-relative bg-teal overflow-hidden" style="padding-top: 150px !important; padding-bottom: 150px !important;">
    <!-- Decorative background elements -->
    <div class="bg-blob-yellow blob-shape-1 opacity-10 position-absolute" style="width: 600px; height: 600px; top: -200px; right: -200px; filter: blur(80px); pointer-events: none;"></div>
    <div class="bg-blob-yellow blob-shape-3 opacity-10 position-absolute" style="width: 400px; height: 400px; bottom: -100px; left: -100px; filter: blur(60px); pointer-events: none;"></div>

    <div class="wave-top">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" style="height: 80px; width: 100%; fill: #ffffff;">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
        </svg>
    </div>

    <div class="container position-relative z-1">
        <div class="row align-items-center g-5">
            <!-- Left Side: Content -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="mb-5">
                    <span class="text-yellow fw-bold text-uppercase d-block mb-3" style="letter-spacing: 6px; font-size: 0.9rem;">Resident Spotlight</span>
                    <h2 class="marker-title text-white mb-4" style="font-size: clamp(3.5rem, 8vw, 6rem); line-height: 0.85;">THE SILENT <br>GUARDIANS</h2>
                    <p class="fs-5 text-white opacity-75 mb-5" style="max-width: 550px; line-height: 1.8; font-weight: 400;">
                        Our mountain gorillas represent the strength and fragility of the deep canopy. Every profile in our registry tells a unique story of survival.
                    </p>
                </div>
                
                <!-- Stat Cards (Glassmorphism inspired by shared image) -->
                <div class="d-flex flex-wrap gap-4 mt-2">
                    <div class="glass-card-stat shadow-lg" data-aos="zoom-in" data-aos-delay="200">
                        <div class="glass-card-content p-4 rounded-5">
                            <div class="text-yellow marker-title mb-0" style="font-size: 3.2rem; line-height: 1;">18</div>
                            <div class="text-white text-uppercase fw-bold mt-1" style="font-size: 0.7rem; letter-spacing: 2px;">Species Recorded</div>
                        </div>
                    </div>
                    <div class="glass-card-stat shadow-lg" data-aos="zoom-in" data-aos-delay="400">
                        <div class="glass-card-content p-4 rounded-5">
                            <div class="text-yellow marker-title mb-0" style="font-size: 3.2rem; line-height: 1;">100%</div>
                            <div class="text-white text-uppercase fw-bold mt-1" style="font-size: 0.7rem; letter-spacing: 2px;">Habitat Accuracy</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Visuals -->
            <div class="col-lg-6 position-relative" data-aos="fade-left">
                <div class="spotlight-image-wrapper p-3">
                    <!-- Main Image Blob -->
                    <div class="blob-container blob-shape-4 shadow-2xl main-spotlight-image" style="width: 100%; height: 550px; border: 15px solid rgba(255,255,255,0.1);">
                        <img src="https://images.unsplash.com/photo-1540573133985-87b6da6d54a9?q=80&w=1200&auto=format&fit=crop" class="blob-img" alt="Mountain Gorilla">
                        
                        <!-- Floating Label -->
                        <div class="position-absolute top-0 start-0 m-4">
                            <span class="badge bg-yellow text-dark rounded-pill px-4 py-2 fw-bold shadow-lg" style="letter-spacing: 1px; font-size: 0.75rem;">GORILLA SPOTLIGHT</span>
                        </div>
                    </div>

                    <!-- Glass Info Box (Mountain Gorilla Profile) -->
                    <div class="glass-info-profile shadow-2xl" data-aos="fade-up" data-aos-delay="500">
                        <h4 class="marker-title text-dark mb-0" style="font-size: 2.5rem;">Mountain Gorilla</h4>
                        <div class="d-flex align-items-center gap-3 mt-1">
                            <div class="status-indicator">
                                <span class="status-pulse"></span>
                                <span class="status-dot"></span>
                            </div>
                            <span class="text-uppercase fw-bold text-danger" style="font-size: 0.75rem; letter-spacing: 2px;">Critically Endangered</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wave-bottom">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" style="height: 80px; width: 100%; fill: #f1b200;">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
        </svg>
    </div>
</section>


<!-- 3. FEATURED WILDLIFE SCENE (DOCUMENTARY SHOWCASE) -->
<section class="py-5 bg-yellow position-relative" style="padding-bottom: 120px !important;">
    <div class="container py-5 text-center">
        <div class="mb-5" data-aos="fade-up">
            <span class="text-plum fw-bold text-uppercase mb-2 d-block" style="letter-spacing: 3px;">Featured Residents</span>
            <h2 class="marker-title text-plum" style="font-size: 5rem; line-height: 0.8;">THE SHOWCASE</h2>
        </div>

        <div class="row g-5 justify-content-center">
            @forelse($featuredAnimals ?? [] as $animal)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="bg-white p-4 rounded-5 shadow-sm h-100 text-center transition-transform hover:scale-105 d-flex flex-column" style="transition: transform 0.3s ease;">
                        <a href="{{ route('animals.show', $animal->id) }}" class="text-decoration-none d-flex flex-column h-100">
                            <div class="blob-container blob-shape-{{ ($loop->index % 4) + 1 }} mb-4" style="width: 100%; height: 250px;">
                                <img src="{{ asset('images/' . $animal->image) }}" class="blob-img" alt="{{ $animal->name }}">
                            </div>
                            <span class="text-teal fw-bold text-uppercase mb-2 d-block" style="font-size: 0.85rem; letter-spacing: 1px;">{{ $animal->category->name ?? 'Wildlife' }}</span>
                            <h3 class="marker-title text-plum mb-3" style="font-size: 2.5rem;">{{ $animal->name }}</h3>
                            <p class="text-dark mb-4 flex-grow-1">{{ Str::limit($animal->description, 100) }}</p>
                            <span class="btn-zoo mt-auto d-inline-block mx-auto" style="font-size: 0.9rem; padding: 10px 25px;">Enter Dossier</span>
                        </a>
                    </div>
                </div>
            @empty
                <!-- Clean Fallback Card -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="bg-white p-4 rounded-5 shadow-sm h-100 text-center d-flex flex-column">
                        <div class="blob-container blob-shape-1 mb-4" style="width: 100%; height: 280px;">
                            <img src="{{ asset('images/placeholders/chimp.png') }}" class="blob-img" alt="Chimp">
                        </div>
                        <h3 class="marker-title text-plum mb-2">Chimpanzee</h3>
                        <p class="text-muted">Register animals in the admin panel to populate this showcase.</p>
                        <a href="{{ route('directory') }}" class="btn-zoo mt-auto mx-auto px-4 py-2" style="font-size: 0.8rem;">Explore All</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- 4. KINGDOMS GRID -->
<section class="py-5 bg-transparent position-relative">
    <div class="container py-5 text-center">
        <div class="mb-5" data-aos="fade-up">
            <h2 class="marker-title text-teal" style="font-size: 4rem; line-height: 0.8;">KINGDOMS</h2>
            <p class="fs-5 text-muted mt-2">Explore the biological kingdoms by species classification</p>
        </div>

        <div class="row g-4 justify-content-center">
            @php $categories = \App\Models\Category::withCount('animals')->get(); @endphp
            @foreach($categories as $category)
                <div class="col-md-4 col-lg-3 text-center" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                    <a href="{{ route('directory', ['category' => $category->id]) }}" class="text-decoration-none d-block">
                        <div class="blob-container blob-shape-{{ ($loop->index % 4) + 1 }} mb-3 shadow-md" style="width: 220px; height: 220px; margin: 0 auto; border: 4px solid #fff;">
                            @php
                                $kingdomImages = [
                                    'Mammal' => asset('images/placeholders/elephant.png'),
                                    'Bird' => asset('images/placeholders/macaw.png'),
                                    'Reptile' => asset('images/placeholders/komodo.png'),
                                    'Amphibian' => asset('images/placeholders/frog.png'),
                                    'Fish' => asset('images/placeholders/shark.png'),
                                    'Insect' => asset('images/placeholders/mantis.png'),
                                ];
                                $catImage = $kingdomImages[$category->name] ?? 'https://images.unsplash.com/photo-1517825738774-7de9363ef735?w=600&auto=format&fit=crop';
                            @endphp
                            <img src="{{ $catImage }}" class="blob-img" alt="{{ $category->name }}">
                        </div>
                        <h4 class="marker-title text-plum mb-1" style="font-size: 2rem;">{{ $category->name }}</h4>
                        <span class="badge bg-yellow text-dark rounded-pill py-2 px-3 fw-bold">{{ $category->animals_count }} SPECIES</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- 5. CONSERVATION STORY SCENE -->
<section class="py-5 bg-grey position-relative">
    <div class="container py-5">
        <div class="bg-plum rounded-pill p-5 position-relative text-center text-white shadow-2xl" style="border-radius: 80px !important;" data-aos="fade-up">
            <div class="bg-blob-yellow blob-shape-2 opacity-50" style="width: 200px; height: 200px; top: -50px; left: -50px;"></div>
            
            <div class="position-relative z-1 py-4">
                <span class="text-yellow fw-bold text-uppercase mb-2 d-block" style="letter-spacing: 4px;">Our Mission</span>
                <h2 class="marker-title text-white mb-5" style="font-size: 4rem; line-height: 0.9;">BE THE VOICE FOR <br>THE <span class="text-yellow">VOICELESS</span></h2>
                
                <div class="row g-5 text-center mt-4">
                    <div class="col-md-4">
                        <div class="mb-4"><i class="fa-solid fa-earth-americas fa-4x text-yellow"></i></div>
                        <h4 class="marker-title text-white">PROTECT</h4>
                        <p class="text-white-50 px-3">Active conservation efforts in 150+ habitats across the globe.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4"><i class="fa-solid fa-microscope fa-4x text-yellow"></i></div>
                        <h4 class="marker-title text-white">STUDY</h4>
                        <p class="text-white-50 px-3">Deep biological tracking and research for every species record.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4"><i class="fa-solid fa-leaf fa-4x text-yellow"></i></div>
                        <h4 class="marker-title text-white">INSPIRE</h4>
                        <p class="text-white-50 px-3">Connecting the next generation of wildlife ambassadors to the wild.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Premium Spotlight Styles */
    .glass-card-stat {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 35px;
        min-width: 200px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .glass-card-stat:hover {
        transform: translateY(-10px) scale(1.05);
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.4);
    }

    .glass-info-profile {
        position: absolute;
        bottom: -30px;
        right: -20px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        padding: 2.5rem;
        border-radius: 40px;
        border: 1px solid rgba(255, 255, 255, 0.5);
        min-width: 320px;
        z-index: 2;
    }

    .main-spotlight-image {
        transition: all 0.6s ease;
    }

    .spotlight-image-wrapper:hover .main-spotlight-image {
        transform: rotate(-2deg) scale(1.02);
    }

    /* Status Pulse Animation */
    .status-indicator {
        position: relative;
        width: 12px;
        height: 12px;
    }

    .status-dot {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: #dc3545;
        border-radius: 50%;
        z-index: 2;
    }

    .status-pulse {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: #dc3545;
        border-radius: 50%;
        animation: pulse-red 2s infinite;
        opacity: 0.6;
        z-index: 1;
    }

    @keyframes pulse-red {
        0% { transform: scale(1); opacity: 0.6; }
        70% { transform: scale(3); opacity: 0; }
        100% { transform: scale(1); opacity: 0; }
    }

    .letter-spacing-3 { letter-spacing: 3px; }
    .shadow-2xl { box-shadow: 0 35px 60px -15px rgba(0, 0, 0, 0.3); }
</style>

@endsection
