@extends('layouts.app')

@section('title', $animal->name . ' - Virtual Zoo')

@section('content')
<div class="mb-3">
    <a href="{{ route('animals.index') }}" class="text-decoration-none text-success">
        <i class="fa-solid fa-arrow-left me-2"></i>Back to Directory
    </a>
</div>

<div class="row">
    <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100">
            @if($animal->image)
                <img src="{{ asset('storage/' . $animal->image) }}" class="img-fluid w-100 h-100 object-fit-cover" alt="{{ $animal->name }}">
            @else
                <div class="bg-light d-flex align-items-center justify-content-center h-100" style="min-height: 400px;">
                    <i class="fa-solid fa-image text-muted fa-5x"></i>
                </div>
            @endif
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-5">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h2 class="fw-bold text-success display-6 mb-0">{{ $animal->name }}</h2>
                    <span class="badge bg-success px-3 py-2 rounded-pill fs-6">{{ $animal->category->name ?? 'Uncategorized' }}</span>
                </div>
                
                <hr class="my-4 text-muted">
                
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-light p-3 rounded-circle text-success me-3">
                                <i class="fa-solid fa-earth-americas fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0">Habitat</h6>
                                <p class="fw-semibold mb-0">{{ $animal->habitat }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-light p-3 rounded-circle text-success me-3">
                                <i class="fa-solid fa-utensils fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0">Diet</h6>
                                <p class="fw-semibold mb-0">{{ $animal->food_type }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-light p-3 rounded-circle text-success me-3">
                                <i class="fa-solid fa-clock fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0">Lifespan</h6>
                                <p class="fw-semibold mb-0">{{ $animal->lifespan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h5 class="fw-bold text-dark mb-3">About this Animal</h5>
                <p class="text-secondary lh-lg" style="white-space: pre-line;">{{ $animal->description }}</p>
                
                <div class="mt-5 d-flex gap-2">
                    <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-outline-success rounded-pill px-4">
                        <i class="fa-solid fa-pen me-2"></i>Edit Information
                    </a>
                    <form action="{{ route('animals.destroy', $animal->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger rounded-pill px-4" onclick="return confirm('Are you sure you want to delete this animal?')">
                            <i class="fa-solid fa-trash me-2"></i>Delete
                        </button>
                    </form>
                </div>
            </div>
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
