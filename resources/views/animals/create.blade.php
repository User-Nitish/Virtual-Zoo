@extends('layouts.admin')

@section('title', 'Add New Animal')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                <h3 class="fw-bold text-success"><i class="fa-solid fa-plus-circle me-2"></i>Add New Animal</h3>
                <p class="text-muted">Fill out the form below to register a new species in the virtual zoo.</p>
            </div>
            
            <div class="card-body p-4">
                <form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-semibold">Animal Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. African Elephant" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="category_id" class="form-label fw-semibold">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                <option value="" selected disabled>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="habitat" class="form-label fw-semibold">Habitat</label>
                            <input type="text" class="form-control @error('habitat') is-invalid @enderror" id="habitat" name="habitat" value="{{ old('habitat') }}" placeholder="e.g. Savanna, Rainforest" required>
                            @error('habitat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="food_type" class="form-label fw-semibold">Diet / Food Type</label>
                            <input type="text" class="form-control @error('food_type') is-invalid @enderror" id="food_type" name="food_type" value="{{ old('food_type') }}" placeholder="e.g. Herbivore, Carnivore" required>
                            @error('food_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="lifespan" class="form-label fw-semibold">Average Lifespan</label>
                            <input type="text" class="form-control @error('lifespan') is-invalid @enderror" id="lifespan" name="lifespan" value="{{ old('lifespan') }}" placeholder="e.g. 60-70 years" required>
                            @error('lifespan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Detailed description about the animal..." required>{{ old('description') }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="image" class="form-label fw-semibold">Animal Image</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*" required onchange="previewImage(event)">
                            <div class="form-text">Recommended size: 800x600 pixels. Max 2MB (JPG, PNG).</div>
                            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            
                            <div class="mt-3 text-center d-none" id="imagePreviewContainer">
                                <p class="text-muted small mb-2">Image Preview:</p>
                                <img id="imagePreview" src="#" alt="Preview" class="img-fluid rounded-4 shadow-sm" style="max-height: 250px; object-fit: cover;">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('animals.index') }}" class="btn btn-light me-2 rounded-pill px-4">Cancel</a>
                        <button type="submit" class="btn btn-success rounded-pill px-4"><i class="fa-solid fa-save me-2"></i>Save Animal</button>
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
    } else {
        previewImage.src = '#';
        previewContainer.classList.add('d-none');
    }
}
</script>
