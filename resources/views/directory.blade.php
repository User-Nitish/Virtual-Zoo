@extends('layouts.app')

@section('title', 'Species Discovery')

@section('content')

<section class="py-5 mt-5">
    <div class="container py-4">
        
        <!-- Premium Brand Header -->
        <div class="text-center mb-5 pb-2" data-aos="zoom-in">
            <span class="text-uppercase fw-bold text-primary mb-2 d-block" style="letter-spacing: 6px; font-size: 0.8rem;">THE VIRTUAL ARCHIVE</span>
            <h1 class="display-1 fw-black mb-1" style="letter-spacing: -6px; line-height: 0.8; background: linear-gradient(135deg, #0284c7, #6b21a8); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">DISCOVERY</h1>
            <p class="marker-title text-muted fs-3 mt-0">The Magnificent Collection</p>
        </div>

        <!-- High-End Glass Navigation Hub -->
        <div class="d-flex justify-content-center mb-5 pb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="glass-nav-pill shadow-lg d-flex align-items-center">
                <!-- Category Tabs -->
                <div class="nav-tabs-wrapper d-flex align-items-center gap-1 p-2">
                    <a href="{{ route('directory') }}" class="btn-nav-specimen {{ !request('category') ? 'active' : '' }}">
                        All
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('directory', ['category' => $cat->id]) }}" class="btn-nav-specimen {{ request('category') == $cat->id ? 'active' : '' }}">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>

                <div class="nav-divider-v6"></div>

                <!-- Integrated Search -->
                <form action="{{ route('directory') }}" method="GET" class="nav-search-v6 d-flex align-items-center pe-3">
                    <input type="text" name="search" placeholder="Search specimens..." value="{{ request('search') }}">
                    <button type="submit" class="search-icon-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>

        <!-- The Pure Organic Grid -->
        <div class="row g-4">
            @foreach($animals as $animal)
                <div class="col-xl-4 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 6) * 50 }}">
                    <a href="{{ route('animals.show', $animal->id) }}" class="organic-link text-decoration-none">
                        <div class="organic-card">
                            <div class="organic-portrait-wrapper">
                                <div class="blob-container blob-shape-{{ ($animal->id % 4) + 1 }} shadow-lg" style="width: 320px; height: 320px;">
                                    <img src="{{ asset('images/' . ($animal->image ?? 'placeholders/tiger.png')) }}" class="blob-img" alt="{{ $animal->name }}">
                                </div>
                            </div>
                            <div class="organic-content text-center mt-4 px-3">
                                <h3 class="marker-title text-dark mb-0" style="font-size: 2.8rem; line-height: 1;">{{ $animal->name }}</h3>
                                <div class="d-flex justify-content-center align-items-center gap-2 mt-2">
                                    <span class="badge rounded-pill bg-light text-muted border px-3 py-1 fw-bold" style="font-size: 0.65rem;">{{ $animal->category->name }}</span>
                                    <span class="text-teal fw-bold text-uppercase small tracking-widest">{{ $animal->habitat }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5 pt-5">
            {{ $animals->links('pagination::bootstrap-5') }}
        </div>
        
    </div>
</section>

<style>
    .fw-black { font-weight: 900; }
    
    .glass-nav-pill {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(20px);
        border-radius: 50px;
        border: 1px solid rgba(255, 255, 255, 0.5);
        padding: 5px;
    }

    .btn-nav-specimen {
        padding: 10px 24px;
        border-radius: 40px;
        font-weight: 700;
        text-decoration: none;
        font-size: 0.85rem;
        color: #64748b;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-nav-specimen:hover {
        background: rgba(0,0,0,0.03);
        color: #333;
    }

    .btn-nav-specimen.active {
        background: #0284c7;
        color: #fff;
        box-shadow: 0 8px 20px rgba(2, 132, 199, 0.25);
    }

    .nav-divider-v6 {
        width: 1px;
        height: 25px;
        background: #e2e8f0;
        margin: 0 15px;
    }

    .nav-search-v6 input {
        border: none;
        background: transparent;
        outline: none;
        font-weight: 600;
        color: #333;
        width: 180px;
        font-size: 0.9rem;
        padding-left: 10px;
    }

    .search-icon-btn {
        background: none;
        border: none;
        color: #0284c7;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }
    .search-icon-btn:hover { transform: scale(1.1); color: #0369a1; }

    /* Organic Card Animation */
    .organic-card {
        transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .organic-card:hover {
        transform: translateY(-20px);
    }

    .organic-card:hover .blob-container {
        box-shadow: 0 40px 80px rgba(0, 134, 145, 0.25) !important;
        transform: rotateY(8deg) scale(1.02);
    }

    .tracking-widest { letter-spacing: 4px; }
</style>

@endsection
