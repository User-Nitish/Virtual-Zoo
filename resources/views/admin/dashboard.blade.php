@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')

<!-- Statistics Cards -->
<div class="row g-4 mb-5">
    <div class="col-md-4">
        <x-dashboard-card 
            title="Total Animals" 
            :count="$totalAnimals" 
            icon="fa-hippo" 
            color="success" />
    </div>
    
    <div class="col-md-4">
        <x-dashboard-card 
            title="Total Categories" 
            :count="$totalCategories" 
            icon="fa-tags" 
            color="primary" />
    </div>
    
    <div class="col-md-4">
        <x-dashboard-card 
            title="Uploaded Images" 
            :count="$totalImages" 
            icon="fa-images" 
            color="info" />
    </div>
</div>

<!-- Recent Activity Table -->
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white border-bottom pt-4 pb-3 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-clock-rotate-left text-muted me-2"></i>Recently Added Animals</h5>
        <a href="{{ route('animals.index') }}" class="btn btn-sm btn-outline-success rounded-pill px-3">View All</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Date Added</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentAnimals as $animal)
                        <tr>
                            <td class="ps-4">
                                @if($animal->image)
                                    <img src="{{ asset('storage/' . $animal->image) }}" class="rounded-circle object-fit-cover shadow-sm" style="width: 45px; height: 45px;" alt="{{ $animal->name }}">
                                @else
                                    <div class="bg-light rounded-circle d-flex justify-content-center align-items-center" style="width: 45px; height: 45px;">
                                        <i class="fa-solid fa-paw text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="fw-bold text-dark">{{ $animal->name }}</td>
                            <td><span class="badge bg-success bg-opacity-10 text-success rounded-pill">{{ $animal->category->name ?? 'Uncategorized' }}</span></td>
                            <td class="text-muted small">{{ $animal->created_at->diffForHumans() }}</td>
                            <td class="text-end pe-4">
                                <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-sm btn-light text-primary rounded-circle shadow-sm" title="Edit"><i class="fa-solid fa-pen"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-folder-open fa-3x mb-3 opacity-50"></i>
                                <h5>No Activity Yet</h5>
                                <p>Start by adding animals to the directory.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
