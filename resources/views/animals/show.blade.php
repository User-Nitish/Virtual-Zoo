@extends('layouts.app')

@section('title', $animal->name . ' - Virtual Zoo')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
    <style>
        #panorama {
            width: 100%;
            height: 400px;
            border-radius: 2rem;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        .panorama-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 2;
            background: rgba(255, 255, 255, 0.9);
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.8rem;
            color: var(--zoo-plum);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
    </style>
@endpush

@section('content')
<div class="mb-5 pt-3">
    <a href="{{ route('directory') }}" class="btn-zoo bg-light text-teal shadow-sm" style="padding: 10px 25px !important;">
        <i class="fa-solid fa-arrow-left me-2"></i>Back to Discovery
    </a>
</div>

<div class="row g-5 align-items-stretch">
    <!-- Animal Image Column -->
    <div class="col-lg-6" data-aos="fade-right">
        <div class="blob-container blob-shape-3 shadow-lg" style="width: 100%; height: 500px;">
            @if($animal->image)
                <img src="{{ asset('images/' . $animal->image) }}" class="blob-img" alt="{{ $animal->name }}">
            @else
                <div class="bg-light d-flex align-items-center justify-content-center h-100">
                    <i class="fa-solid fa-image text-muted fa-5x"></i>
                </div>
            @endif
        </div>
    </div>
    
    <!-- Animal Info Column -->
    <div class="col-lg-6" data-aos="fade-left">
        <div class="bg-white p-5 rounded-5 shadow-lg border border-light h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <span class="badge bg-yellow text-dark rounded-pill px-4 py-2 fw-bold text-uppercase" style="letter-spacing: 1px; font-size: 0.8rem;">
                    {{ $animal->category->name ?? 'Wildlife' }}
                </span>
            </div>
            
            <h1 class="marker-title text-plum mb-3" style="font-size: 5rem;">{{ $animal->name }}</h1>
            <p class="text-teal fw-bold text-uppercase mb-4" style="letter-spacing: 2px;">
                <i class="fa-solid fa-location-dot me-2"></i>{{ $animal->habitat }}
            </p>

            <div class="row g-4 mb-5">
                <div class="col-sm-4">
                    <div class="p-3 rounded-4 bg-light text-center">
                        <div class="text-yellow mb-2"><i class="fa-solid fa-utensils fa-2x"></i></div>
                        <h6 class="text-muted small text-uppercase mb-1">Diet</h6>
                        <p class="fw-bold text-teal mb-0">{{ $animal->food_type }}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="p-3 rounded-4 bg-light text-center">
                        <div class="text-yellow mb-2"><i class="fa-solid fa-hourglass-half fa-2x"></i></div>
                        <h6 class="text-muted small text-uppercase mb-1">Lifespan</h6>
                        <p class="fw-bold text-teal mb-0">{{ $animal->lifespan }}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="p-3 rounded-4 bg-light text-center">
                        <div class="text-yellow mb-2"><i class="fa-solid fa-dna fa-2x"></i></div>
                        <h6 class="text-muted small text-uppercase mb-1">Status</h6>
                        <p class="fw-bold text-teal mb-0">Protected</p>
                    </div>
                </div>
            </div>
            
            <h4 class="marker-title text-plum mb-3" style="font-size: 2rem;">Species Profile</h4>
            <p class="text-dark lh-lg mb-5" style="opacity: 0.8; font-size: 1.1rem; white-space: pre-line;">{{ $animal->description }}</p>
            
            <div class="d-flex flex-wrap gap-3 mt-auto pt-4 border-top">
                <a href="{{ route('animals.edit', $animal->id) }}" class="btn-zoo bg-teal text-white" style="padding: 10px 30px !important;">
                    <i class="fa-solid fa-pen-to-square me-2"></i>Edit Details
                </a>
                <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-zoo bg-plum text-white" style="padding: 10px 30px !important;" onclick="return confirm('Are you sure you want to delete this animal?')">
                        <i class="fa-solid fa-trash-can me-2"></i>Remove
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- 360 Panorama Section -->
<div class="mt-5 pt-5" data-aos="fade-up">
    <div class="bg-white p-5 rounded-5 shadow-lg border border-light position-relative">
        <div class="mb-4">
            <span class="text-yellow fw-bold text-uppercase d-block mb-2" style="letter-spacing: 3px; font-size: 0.8rem;">Immersive Experience</span>
            <h3 class="marker-title text-plum" style="font-size: 3rem;">Explore the Habitat</h3>
            <p class="text-muted">Take a virtual 360° tour of where the {{ $animal->name }} lives in our sanctuary.</p>
        </div>
        
        <div class="position-relative">
            <div class="panorama-badge">
                <i class="fa-solid fa-vr-cardboard me-2"></i> 360° INTERACTIVE VIEW
            </div>
            <div id="panorama"></div>
        </div>
        
        <div class="mt-4 text-center">
            <p class="text-muted small"><i class="fa-solid fa-mouse me-2"></i>Drag your mouse or use touch to look around the environment</p>
        </div>
    </div>
</div>

<!-- Related Animals Section -->
@if($relatedAnimals->count() > 0)
<div class="mt-5 pt-5 border-top">
    <div class="mb-4">
        <h4 class="fw-bold text-dark"><i class="fa-solid fa-paw text-success me-2"></i>Related {{ $animal->category->name ?? 'Animals' }}</h4>
        <p class="text-muted">Discover other amazing species in this category.</p>
    </div>
    <div class="row g-4">
        @foreach($relatedAnimals as $related)
            <div class="col-md-4">
                <x-animal-card :animal="$related" />
            </div>
        @endforeach
    </div>
</div>
@endif

@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            pannellum.viewer('panorama', {
                "type": "equirectangular",
                "panorama": "https://pannellum.org/images/alma.jpg", // Default placeholder
                "autoLoad": true,
                "compass": false,
                "mouseZoom": false,
                "showControls": true
            });
        });
    </script>
@endpush
                "panorama": "{{ $currentHabitat }}",
                "autoLoad": true,
                "compass": false,
                "mouseZoom": false,
                "showControls": true,
                "crossOrigin": "anonymous"
            });
        });
    </script>
@endpush
