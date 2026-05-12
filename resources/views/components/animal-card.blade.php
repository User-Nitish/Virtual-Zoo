@props(['animal'])

<div class="card animal-card h-100 shadow-sm border-0 rounded-5 overflow-hidden bg-white transition-transform hover-scale">
    <div class="card-img-wrapper position-relative overflow-hidden" style="height: 250px;">
        @php
            // Assign a blob shape based on index or name if available
            $shapeClass = 'blob-shape-' . (($animal->id % 4) + 1);
        @endphp
        
        @if($animal->image)
            <img src="{{ asset('images/' . $animal->image) }}" class="w-100 h-100 object-fit-cover" alt="{{ $animal->name }}">
        @else
            <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-hippo text-muted fa-3x"></i>
            </div>
        @endif
        
        <div class="position-absolute top-0 end-0 m-3">
             <span class="badge bg-plum text-white rounded-pill px-3 py-2 shadow-sm" style="font-size: 0.75rem; letter-spacing: 1px;">
                {{ $animal->category->name ?? 'Wildlife' }}
             </span>
        </div>
    </div>
    
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-start mb-2">
            <h4 class="marker-title text-teal mb-0" style="font-size: 2rem;">{{ $animal->name }}</h4>
        </div>
        
        <p class="text-muted small mb-3">
            <i class="fa-solid fa-location-dot text-yellow me-1"></i> 
            <span class="fw-bold text-uppercase" style="font-size: 0.7rem; letter-spacing: 1px;">{{ $animal->habitat }}</span>
        </p>
        
        <p class="card-text text-dark mb-4" style="opacity: 0.8; font-size: 0.95rem;">{{ Str::limit($animal->description, 100) }}</p>
        
        <div class="d-flex justify-content-between align-items-center mt-auto">
            <a href="{{ route('animals.show', $animal->id) }}" class="btn-zoo py-2 px-4 fs-6" style="padding: 8px 25px !important;">Explore</a>
            
            @if(request()->routeIs('animals.*') || request()->routeIs('admin.*'))
            <div class="d-flex gap-2">
                <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-light text-teal rounded-circle shadow-sm" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;" title="Edit">
                    <i class="fa-solid fa-pen" style="font-size: 0.8rem;"></i>
                </a>
                <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-light text-danger rounded-circle shadow-sm" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;" title="Delete" onclick="return confirm('Are you sure you want to delete this animal?')">
                        <i class="fa-solid fa-trash" style="font-size: 0.8rem;"></i>
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    .hover-scale:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }
</style>
