@extends('layouts.app')

@section('title', 'Discovery Registry')

@section('content')
<section class="py-5 mt-5">
    <div class="container py-4">
        
        <!-- Premium Header -->
        <div class="text-center mb-5" data-aos="zoom-out">
            <span class="text-uppercase small fw-bold text-teal mb-2 d-block" style="letter-spacing: 4px;">Biological Archive</span>
            <h1 class="marker-title" style="font-size: 5rem; line-height: 0.9; background: linear-gradient(135deg, #008691, #6b21a8); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">THE SPECIES DIRECTORY</h1>
            <p class="text-muted fs-4 mt-3 mx-auto" style="max-width: 800px;">Meet our incredible inhabitants in their natural-inspired habitats. From the highest peaks to the deep blue.</p>
        </div>

        <!-- Dynamic Filter Bar (Glass Pill) -->
        <div class="glass-pill-v5 shadow-lg p-3 mb-5 d-flex justify-content-center align-items-center flex-wrap gap-3" data-aos="fade-up">
            <a class="btn-modern-pill {{ !request('category') ? 'active' : '' }}" 
               href="{{ route('modern.directory') }}">
               All Specimens
            </a>
            
            @php $categories = \App\Models\Category::all(); @endphp
            @foreach($categories as $cat)
                <a class="btn-modern-pill {{ request('category') == $cat->id ? 'active' : '' }}" 
                   href="{{ route('modern.directory', ['category' => $cat->id]) }}">
                   {{ $cat->name }}
                </a>
            @endforeach
        </div>

        <!-- Dynamic Grid with Database Animals -->
        <div class="row g-5 justify-content-center">
            @php 
                $query = \App\Models\Animal::with('category')->latest();
                if(request('category')) {
                    $query->where('category_id', request('category'));
                }
                $animals = $query->get();
            @endphp

            @forelse($animals as $animal)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 6) * 100 }}">
                    <div class="modern-blob-card text-center">
                        <div class="blob-wrapper-large mb-4 mx-auto">
                            <div class="blob-container blob-shape-{{ ($animal->id % 4) + 1 }} shadow-lg" style="width: 280px; height: 280px; background: white; padding: 15px; border: 1px solid rgba(0,0,0,0.05);">
                                <img src="{{ asset('images/' . ($animal->image ?? 'placeholders/tiger.png')) }}" class="blob-img w-100 h-100" alt="{{ $animal->name }}">
                            </div>
                            <div class="category-tag-floating">{{ $animal->category->name ?? 'Wild' }}</div>
                        </div>
                        <h3 class="marker-title fs-1 text-dark mb-1">{{ $animal->name }}</h3>
                        <p class="text-teal fw-bold text-uppercase small tracking-widest">{{ $animal->habitat }}</p>
                        <div class="mt-3">
                            <a href="{{ route('animals.show', $animal->id) }}" class="btn-zoo-outline px-4 py-2">Explore Species &rarr;</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fa-solid fa-search fa-3x text-muted mb-3"></i>
                    <h3 class="marker-title text-muted">No Specimens in this Kingdom</h3>
                </div>
            @endforelse
        </div>
        
    </div>
</section>

<style>
    .glass-pill-v5 {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(20px);
        border-radius: 100px;
        border: 1px solid rgba(255, 255, 255, 0.8);
        max-width: 900px;
        margin: 0 auto;
    }

    .btn-modern-pill {
        padding: 10px 25px;
        border-radius: 50px;
        font-weight: 700;
        color: #555;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-modern-pill:hover { background: rgba(0,0,0,0.05); color: #000; }
    .btn-modern-pill.active {
        background: var(--zoo-teal);
        color: #fff;
        box-shadow: 0 5px 15px rgba(0, 134, 145, 0.3);
    }

    .blob-wrapper-large {
        position: relative;
        display: inline-block;
    }

    .category-tag-floating {
        position: absolute;
        top: 20px;
        right: -10px;
        background: var(--zoo-plum);
        color: #fff;
        padding: 5px 15px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.75rem;
        letter-spacing: 1px;
        text-transform: uppercase;
        box-shadow: 0 5px 15px rgba(107, 33, 168, 0.3);
        z-index: 5;
    }

    .modern-blob-card {
        transition: all 0.4s ease;
    }

    .modern-blob-card:hover { transform: translateY(-10px); }
    .modern-blob-card:hover .blob-container { 
        border-color: var(--zoo-teal); 
        box-shadow: 0 20px 40px rgba(0, 134, 145, 0.15) !important;
    }

    .btn-zoo-outline {
        border: 2px solid var(--zoo-teal);
        color: var(--zoo-teal);
        border-radius: 50px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-zoo-outline:hover {
        background: var(--zoo-teal);
        color: #fff;
        box-shadow: 0 5px 15px rgba(0, 134, 145, 0.2);
    }

    .tracking-widest { letter-spacing: 2px; }
</style>
@endsection
