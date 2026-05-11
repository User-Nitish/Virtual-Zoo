@extends('layouts.app')

@section('title', 'Manage Animals')

@section('content')

<x-page-header 
    title="Animal Directory" 
    subtitle="Explore and manage the virtual zoo residents."
    actionUrl="{{ route('animals.create') }}" 
    actionText="Add Animal" />

<!-- Search & Filter Section -->
<div class="mb-4 d-flex justify-content-between align-items-center flex-wrap gap-3">
    <!-- Category Filter Tabs -->
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link rounded-pill px-4 {{ !request('category') ? 'active bg-success' : 'text-success' }}" 
               href="{{ route('animals.index', ['search' => request('search')]) }}">All Categories</a>
        </li>
        @foreach($categories as $cat)
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 {{ request('category') == $cat->id ? 'active bg-success' : 'text-success' }}" 
                   href="{{ route('animals.index', ['category' => $cat->id, 'search' => request('search')]) }}">
                   {{ $cat->name }}
                </a>
            </li>
        @endforeach
    </ul>

    @if(request('search') || request('category'))
        <div class="text-muted w-100 mt-3 d-flex justify-content-between align-items-center">
            <div>
                Found <strong class="text-success">{{ $animals->total() }}</strong> results
                @if(request('search')) for: <strong class="text-dark">"{{ request('search') }}"</strong> @endif
            </div>
            <a href="{{ route('directory') }}" class="text-danger text-decoration-none"><i class="fa-solid fa-times-circle"></i> Clear Filters</a>
        </div>
    @endif
</div>

<!-- Animal Grid -->
<div class="row g-4">
    @forelse($animals as $animal)
        <div class="col-md-6 col-lg-4">
            <x-animal-card :animal="$animal" />
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-light text-center rounded-4 shadow-sm py-5 border">
                @if(request('search') || request('category'))
                    <i class="fa-solid fa-search fa-3x mb-3 text-muted"></i>
                    <h5>No Animals Found</h5>
                    <p class="text-muted">No animals match your current search or filter criteria.</p>
                    <a href="{{ route('animals.index') }}" class="btn btn-outline-success rounded-pill mt-2">Clear All Filters</a>
                @else
                    <i class="fa-solid fa-hippo fa-3x mb-3 text-muted"></i>
                    <h5>The Zoo is Empty</h5>
                    <p class="text-muted">Start by adding a new animal to the directory!</p>
                    <a href="{{ route('animals.create') }}" class="btn btn-success rounded-pill mt-2">Add First Animal</a>
                @endif
            </div>
        </div>
    @endforelse
</div>
@endsection
