@extends('layouts.admin')

@section('title', 'Manage Animals')

@section('content')

<div class="d-flex justify-content-between align-items-end mb-5">
    <div data-aos="fade-right">
        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 mb-2 fw-bold" style="letter-spacing: 3px; font-size: 0.7rem;">COLLECTION DIRECTORY</span>
        <h2 class="marker-title" style="font-size: 4.5rem; line-height: 0.8; background: linear-gradient(135deg, #008691, #005f73); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Species Registry</h2>
    </div>
    <div data-aos="fade-left">
        <a href="{{ route('animals.create') }}" class="btn-zoo-yellow py-3 px-5 fs-5 shadow-lg d-flex align-items-center">
            <i class="fa-solid fa-plus-circle me-3"></i>Register New Species
        </a>
    </div>
</div>

<div class="row g-4">
    @forelse($animals as $animal)
        <div class="col-12" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 5) * 100 }}">
            <div class="animal-directory-pill">
                <div class="row align-items-center g-0">
                    <!-- 1. Species Portrait -->
                    <div class="col-auto p-3">
                        <div class="blob-wrapper-index">
                            <div class="blob-container blob-shape-{{ ($animal->id % 4) + 1 }} shadow-lg" style="width: 100px; height: 100px; border: 4px solid #fff;">
                                <img src="{{ asset('images/' . ($animal->image ?? 'placeholders/elephant.png')) }}" class="blob-img" alt="{{ $animal->name }}">
                            </div>
                        </div>
                    </div>

                    <!-- 2. Primary Details -->
                    <div class="col px-4">
                        <div class="d-flex align-items-center gap-3 mb-1">
                            <h3 class="marker-title text-dark mb-0" style="font-size: 2.5rem;">{{ $animal->name }}</h3>
                            <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary px-3 py-1 fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">ID: #{{ str_pad($animal->id, 4, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <div class="d-flex gap-4">
                            <div class="d-flex align-items-center text-muted small fw-bold">
                                <i class="fa-solid fa-dna text-primary me-2"></i> {{ $animal->category->name ?? 'Wild' }}
                            </div>
                            <div class="d-flex align-items-center text-muted small fw-bold">
                                <i class="fa-solid fa-location-dot text-yellow me-2"></i> {{ $animal->habitat }}
                            </div>
                            <div class="d-flex align-items-center text-muted small fw-bold">
                                <i class="fa-solid fa-clock text-plum me-2"></i> {{ $animal->lifespan }}
                            </div>
                        </div>
                    </div>

                    <!-- 3. Actions Bar -->
                    <div class="col-auto pe-4">
                        <div class="d-flex gap-2">
                            <a href="{{ route('animals.show', $animal->id) }}" class="action-btn-glass btn-view" title="View Dossier">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('animals.edit', $animal->id) }}" class="action-btn-glass btn-edit" title="Modify Records">
                                <i class="fa-solid fa-pen-nib"></i>
                            </a>
                            <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn-glass btn-delete" title="De-register Species" onclick="return confirm('Permanently remove this species?')">
                                    <i class="fa-solid fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <div class="bg-white rounded-5 p-5 shadow-sm border border-light">
                <i class="fa-solid fa-box-open fa-4x text-muted mb-4"></i>
                <h3 class="marker-title text-muted">No Species Found</h3>
                <p class="text-muted">The biological registry is currently empty.</p>
            </div>
        </div>
    @endforelse
</div>

<!-- Pagination -->
@if($animals->hasPages())
    <div class="mt-5 d-flex justify-content-center">
        {{ $animals->links('pagination::bootstrap-5') }}
    </div>
@endif

<style>
    .animal-directory-pill {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.8);
        border-radius: 60px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
    }

    .animal-directory-pill:hover {
        transform: translateX(10px) scale(1.01);
        background: #fff;
        box-shadow: 0 20px 40px rgba(0, 134, 145, 0.1);
        border-color: var(--zoo-teal);
    }

    .animal-directory-pill::before {
        content: '';
        position: absolute;
        left: 0; top: 0; bottom: 0;
        width: 10px;
        background: linear-gradient(to bottom, var(--zoo-teal), var(--zoo-plum));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .animal-directory-pill:hover::before {
        opacity: 1;
    }

    .action-btn-glass {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        color: #444;
        border: 1px solid #eee;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-view:hover { background: var(--zoo-teal); color: #fff; transform: rotate(10deg); }
    .btn-edit:hover { background: var(--zoo-plum); color: #fff; transform: rotate(-10deg); }
    .btn-delete:hover { background: #f43f5e; color: #fff; transform: scale(1.1); }

    .btn-zoo-yellow {
        background: #f1b200;
        color: #000;
        border: none;
        border-radius: 25px;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-zoo-yellow:hover {
        background: #d9a000;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(241, 178, 0, 0.2);
        color: #000;
    }
</style>

@endsection
