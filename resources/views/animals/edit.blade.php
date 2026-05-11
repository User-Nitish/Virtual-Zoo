@extends('layouts.admin')

@section('title', 'Edit ' . $animal->name)

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold text-success"><i class="fa-solid fa-pen me-2"></i>Edit Animal</h3>
                        <p class="text-muted mb-0">Update information for {{ $animal->name }}.</p>
                    </div>
                    @if($animal->image)
                        <img src="{{ asset('storage/' . $animal->image) }}" alt="Preview" class="rounded-circle object-fit-cover shadow-sm" style="width: 60px; height: 60px;">
                    @endif
                </div>
            </div>
            
            <div class="card-body p-4">
                <form action="{{ route('animals.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-semibold">Animal Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $animal->name) }}" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="category_id" class="form-label fw-semibold">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                <option value="" disabled>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $animal->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="habitat" class="form-label fw-semibold">Habitat</label>
                            <input type="text" class="form-control @error('habitat') is-invalid @enderror" id="habitat" name="habitat" value="{{ old('habitat', $animal->habitat) }}" required>
                            @error('habitat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="food_type" class="form-label fw-semibold">Diet / Food Type</label>
                            <input type="text" class="form-control @error('food_type') is-invalid @enderror" id="food_type" name="food_type" value="{{ old('food_type', $animal->food_type) }}" required>
                            @error('food_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="lifespan" class="form-label fw-semibold">Average Lifespan</label>
                            <input type="text" class="form-control @error('lifespan') is-invalid @enderror" id="lifespan" name="lifespan" value="{{ old('lifespan', $animal->lifespan) }}" required>
                            @error('lifespan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $animal->description) }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="image" class="form-label fw-semibold">Update Animal Image (Optional)</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                            <div class="form-text">Leave blank to keep the current image. Max 2MB.</div>
                            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            
                            <div class="mt-3 text-center {{ $animal->image ? '' : 'd-none' }}" id="imagePreviewContainer">
                                <p class="text-muted small mb-2">Image Preview:</p>
                                <img id="imagePreview" src="{{ $animal->image ? asset('storage/' . $animal->image) : '#' }}" alt="Preview" class="img-fluid rounded-4 shadow-sm" style="max-height: 250px; object-fit: cover;">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('animals.index') }}" class="btn btn-light me-2 rounded-pill px-4">Cancel</a>
                        <button type="submit" class="btn btn-success rounded-pill px-4"><i class="fa-solid fa-save me-2"></i>Update Animal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
function previewImage(event) {
    const input = event.target;
    const previewContainer = document.getElementById('imagePreviewContainer');
    const previewImage = document.getElementById('imagePreview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewContainer.classList.remove('d-none');
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
