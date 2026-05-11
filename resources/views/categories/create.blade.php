@extends('layouts.admin')

@section('title', 'Add New Category')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                <h3 class="fw-bold text-success"><i class="fa-solid fa-folder-plus me-2"></i>Add New Category</h3>
                <p class="text-muted">Create a new classification for animals.</p>
            </div>
            
            <div class="card-body p-4">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Category Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Mammal, Bird, Aquatic" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="form-label fw-semibold">Description (Optional)</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Briefly describe this category of animals...">{{ old('description') }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('categories.index') }}" class="btn btn-light me-2 rounded-pill px-4">Cancel</a>
                        <button type="submit" class="btn btn-success rounded-pill px-4"><i class="fa-solid fa-save me-2"></i>Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
