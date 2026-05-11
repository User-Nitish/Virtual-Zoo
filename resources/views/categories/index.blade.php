@extends('layouts.admin')

@section('title', 'Manage Categories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="section-title mb-0">Category Management</h2>
        <p class="text-muted">Manage the classifications for your virtual zoo animals.</p>
    </div>
    <a href="{{ route('categories.create') }}" class="btn btn-accent shadow-sm"><i class="fa-solid fa-plus me-2"></i>Add Category</a>
</div>

<div class="card shadow-sm border-0 rounded-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Animals Count</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td class="ps-4 text-muted">#{{ $category->id }}</td>
                            <td class="fw-bold text-success">{{ $category->name }}</td>
                            <td>{{ Str::limit($category->description, 50) ?? 'No description provided.' }}</td>
                            <td>
                                <span class="badge bg-secondary rounded-pill">{{ $category->animals_count }} animals</span>
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-light text-primary rounded-circle shadow-sm me-1" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light text-danger rounded-circle shadow-sm" title="Delete" onclick="return confirm('WARNING: Deleting this category will also delete ALL animals belonging to it! Are you sure?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-tags fa-3x mb-3 opacity-50"></i>
                                <h5>No Categories Found</h5>
                                <p>Start organizing your zoo by creating your first category.</p>
                                <a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-success rounded-pill mt-2">Create Category</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pagination -->
    @if($categories->hasPages())
        <div class="card-footer bg-white border-top p-3 d-flex justify-content-center">
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
