@extends('layouts.app')

@section('title', 'Into the Wild - A Cinematic Journey')

@section('content')

<!-- 1. HERO SCENE: ENTER THE WILD -->
<section class="scene-section">
    <div class="scene-bg" style="background: url('https://images.unsplash.com/photo-1549480017-d76466a4b8e8?q=80&w=2000&auto=format&fit=crop') center/cover no-repeat;"></div>
    <div class="fog-layer"></div>
    <div class="light-shaft"></div>
    
    <div class="scene-content text-center" data-aos="zoom-out" data-aos-duration="3000">
        <span class="cinematic-subtitle">Documentary Experience</span>
        <h1 class="cinematic-title">Enter<br>The <span class="text-accent">Wild</span></h1>
        <p class="cinematic-text mx-auto mt-4 mb-5">Step into a hidden world of magnificent creatures and untouched beauty. Your interactive journey begins now.</p>
        <a href="#discovery" class="btn-cinematic">Begin Exploration</a>
    </div>
</section>

<!-- 2. JUNGLE DISCOVERY SCENE -->
<section id="discovery" class="scene-section" style="background-color: #050a06;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="cinematic-subtitle">Chapter I: The Discovery</span>
                <h2 class="cinematic-title">The Deep<br>Canopy</h2>
                <p class="cinematic-text mt-4">In the emerald shadows of the Virunga Mountains, life moves at a different pace. Every rustle of leaves tells a story of survival and heritage.</p>
                <div class="mt-5 d-flex gap-4 align-items-center">
                    <div class="text-accent fs-1 fw-bold">01</div>
                    <div class="text-dim border-start ps-4 border-white border-opacity-10">Witness the Silent Guardians of the rainforest in their natural state.</div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="400">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1540573133985-87b6da6d54a9?q=80&w=1200&auto=format&fit=crop" class="img-fluid rounded-5 shadow-2xl" alt="Gorilla Discovery">
                    <div class="light-shaft opacity-50"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. FEATURED WILDLIFE SCENE (DOCUMENTARY SHOWCASE) -->
<section class="scene-section" style="background-color: #030704;">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="cinematic-subtitle">Magnificent Species</span>
            <h2 class="cinematic-title">The Showcase</h2>
        </div>

        @foreach($featuredAnimals as $animal)
            <div class="showcase-block" data-aos="scene-reveal">
                <img src="{{ asset('storage/' . $animal->image) }}" class="showcase-img" alt="{{ $animal->name }}">
                <div class="showcase-overlay">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <span class="text-accent fw-bold text-uppercase letter-spacing-2 mb-2 d-block">{{ $animal->category->name ?? 'Wildlife' }}</span>
                            <h3 class="cinematic-title mb-3" style="font-size: 3.5rem;">{{ $animal->name }}</h3>
                            <p class="cinematic-text opacity-75 mb-0">{{ Str::limit($animal->description, 150) }}</p>
                        </div>
                        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                            <a href="{{ route('animals.show', $animal->id) }}" class="btn btn-outline-light rounded-pill px-5 py-3 fw-bold">Enter Scene</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- 4. CATEGORY EXPERIENCE SCENE -->
<section class="scene-section">
    <div class="container">
        <div class="row g-4">
            @foreach($categories as $category)
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 150 }}">
                    <a href="{{ route('directory', ['category' => $category->id]) }}" class="text-decoration-none">
                        <div class="category-scene-card">
                            <img src="https://images.unsplash.com/photo-1517825738774-7de9363ef735?q=80&w=1000&auto=format&fit=crop" class="w-100 h-100 object-fit-cover" alt="{{ $category->name }}">
                            <div class="showcase-overlay" style="padding: 2rem;">
                                <h4 class="text-white fw-bold mb-0">{{ $category->name }}</h4>
                                <p class="text-accent small mb-0">{{ $category->animals_count }} Species</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- 5. IMMERSIVE FOREST SCENE (ATMOSPHERIC) -->
<section class="scene-section" style="background-image: url('https://images.unsplash.com/photo-1546182990-dffeafbe841d?q=80&w=2000&auto=format&fit=crop'); background-attachment: fixed;">
    <div class="fog-layer" style="background: rgba(5, 10, 6, 0.75);"></div>
    <div class="container position-relative z-index-10 text-center" data-aos="fade-up">
        <h2 class="cinematic-title" style="font-size: 5rem; opacity: 0.2;">Kingdom of Gold</h2>
        <div class="my-5">
            <i class="fa-solid fa-leaf text-accent fa-4x opacity-20"></i>
        </div>
        <p class="cinematic-text mx-auto text-white fw-bold">Wait for the silence. Listen to the wind. The Savannah remembers those who truly see.</p>
    </div>
</section>

<!-- 6. CONSERVATION STORY SCENE -->
<section class="scene-section" style="background-color: #050a06;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center" data-aos="fade-up">
                <span class="cinematic-subtitle">The Mission</span>
                <h2 class="cinematic-title mb-5">Be the <span class="text-success">Voice</span> for the Voiceless</h2>
                <div class="glass-panel p-5 text-start">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <h4 class="text-accent fw-bold">Protect</h4>
                            <p class="small text-dim">Active conservation efforts in 150+ habitats across the globe.</p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="text-accent fw-bold">Educate</h4>
                            <p class="small text-dim">Spreading awareness through digital storytelling and virtual access.</p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="text-accent fw-bold">Inspire</h4>
                            <p class="small text-dim">Connecting the next generation of wildlife ambassadors to the wild.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. FINAL CTA SCENE -->
<section class="scene-section">
    <div class="scene-bg" style="background: url('https://images.unsplash.com/photo-1456926631375-92c8ce872def?q=80&w=2000&auto=format&fit=crop') center/cover no-repeat;"></div>
    <div class="fog-layer" style="background: linear-gradient(to top, var(--bg-dark), transparent);"></div>
    
    <div class="container text-center position-relative z-index-10" data-aos="zoom-in">
        <h2 class="cinematic-title mb-4">The Wild is Calling</h2>
        <p class="cinematic-text mx-auto mb-5">Your exploration has only just begun. Enter the full directory and discover hundreds of unique species.</p>
        <a href="{{ route('directory') }}" class="btn-cinematic px-5 py-4">Explore Full Directory</a>
    </div>
</section>

@endsection
