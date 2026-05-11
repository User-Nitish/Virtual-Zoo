@extends('layouts.admin')

@section('title', 'Manage Animals')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="section-title mb-0">Animals Directory</h2>
    <a href="{{ route('animals.create') }}" class="btn btn-success shadow-sm"><i class="fa-solid fa-plus me-2"></i>Add Animal</a>
</div>

<div class="card shadow-sm border-0 rounded-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Habitat</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($animals as $animal)
                        <tr>
                            <td class="ps-4">
                                @if($animal->image)
                                    <img src="{{ asset('storage/' . $animal->image) }}" class="rounded shadow-sm object-fit-cover" style="width: 60px; height: 60px;" alt="{{ $animal->name }}">
                                @else
                                    <div class="bg-light rounded d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                                        <i class="fa-solid fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="fw-bold text-success">{{ $animal->name }}</td>
                            <td><span class="badge bg-secondary rounded-pill">{{ $animal->category->name ?? 'Uncategorized' }}</span></td>
                            <td>{{ $animal->habitat }}</td>
                            <td class="text-end pe-4">
                                <a href="{{ route('animals.show', $animal->id) }}" class="btn btn-sm btn-light text-info rounded-circle shadow-sm me-1" title="View"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-sm btn-light text-primary rounded-circle shadow-sm me-1" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light text-danger rounded-circle shadow-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this animal?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-hippo fa-3x mb-3 opacity-50"></i>
                                <h5>No Animals Found</h5>
                                <p>Start building your virtual zoo by adding an animal.</p>
                                <a href="{{ route('animals.create') }}" class="btn btn-sm btn-outline-success rounded-pill mt-2">Add First Animal</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pagination -->
    @if($animals->hasPages())
        <div class="card-footer bg-white border-top p-3 d-flex justify-content-center">
            {{ $animals->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

@endsection
