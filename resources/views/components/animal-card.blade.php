@props(['animal'])

<div class="card animal-card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
    <div class="card-img-wrapper">
        @if($animal->image)
            <img src="{{ asset('storage/' . $animal->image) }}" class="card-img-top" alt="{{ $animal->name }}">
        @else
            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                <i class="fa-solid fa-image text-muted fa-3x"></i>
            </div>
        @endif
    </div>
    
    <div class="card-body position-relative p-4">
        <span class="badge bg-success position-absolute top-0 end-0 m-3 rounded-pill">{{ $animal->category->name ?? 'Uncategorized' }}</span>
        <h4 class="card-title fw-bold text-success mb-1">{{ $animal->name }}</h4>
        <p class="text-muted small mb-3"><i class="fa-solid fa-location-dot me-1"></i> {{ $animal->habitat }}</p>
        
        <p class="card-text text-secondary mb-4">{{ Str::limit($animal->description, 90) }}</p>
        
        <div class="d-flex justify-content-between align-items-center mt-auto">
            <a href="{{ route('animals.show', $animal->id) }}" class="btn btn-zoo btn-zoo-primary btn-sm rounded-pill px-4">View Profile</a>
            
            @if(request()->routeIs('animals.*'))
            <div class="d-flex gap-1">
                <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-sm btn-light text-primary rounded-circle shadow-sm" title="Edit"><i class="fa-solid fa-pen"></i></a>
                <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-light text-danger rounded-circle shadow-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this animal?')">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
