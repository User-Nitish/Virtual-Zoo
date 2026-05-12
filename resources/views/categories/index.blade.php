@extends('layouts.admin')

@section('title', 'Kingdoms Management')

@section('content')

<x-page-header 
    title="KINGDOMS" 
    subtitle="Classify and organize your virtual zoo inhabitants into their biological kingdoms."
    actionUrl="{{ route('categories.create') }}" 
    actionText="New Kingdom" 
    actionIcon="fa-plus" />

<div class="card border-0 rounded-5 shadow-sm bg-white overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-uppercase small fw-bold text-muted" style="letter-spacing: 1px;">Identifier</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted" style="letter-spacing: 1px;">Kingdom Name</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted" style="letter-spacing: 1px;">Description</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted" style="letter-spacing: 1px;">Population</th>
                        <th class="text-end pe-4 py-3 text-uppercase small fw-bold text-muted" style="letter-spacing: 1px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td class="ps-4">
                                <span class="fw-bold text-muted">#{{ $category->id }}</span>
                            </td>
                            <td>
                                <span class="fw-bold text-teal fs-5">{{ $category->name }}</span>
                            </td>
                            <td>
                                <p class="text-dark mb-0 small" style="opacity: 0.7; max-width: 300px;">{{ Str::limit($category->description, 60) ?? 'No description provided.' }}</p>
                            </td>
                            <td>
                                <span class="badge rounded-pill px-3 py-2" style="background-color: rgba(129, 56, 97, 0.1); color: var(--zoo-plum);">
                                    <i class="fa-solid fa-hippo me-1"></i> {{ $category->animals_count }} species
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-light text-teal rounded-circle shadow-sm" style="width: 38px; height: 38px; display: flex; align-items: center; justify-content: center;" title="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light text-danger rounded-circle shadow-sm" style="width: 38px; height: 38px; display: flex; align-items: center; justify-content: center;" title="Delete" onclick="return confirm('WARNING: Deleting this category will also delete ALL animals belonging to it! Are you sure?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="opacity-25 mb-3">
                                    <i class="fa-solid fa-tags fa-3x"></i>
                                </div>
                                <h5 class="text-muted">No kingdoms defined yet.</h5>
                                <a href="{{ route('categories.create') }}" class="btn-zoo btn-sm mt-3">Create First Kingdom</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pagination -->
    @if($categories->hasPages())
        <div class="card-footer bg-white border-top border-opacity-10 p-4 d-flex justify-content-center">
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

@endsection
