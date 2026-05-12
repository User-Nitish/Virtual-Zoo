@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<!-- Statistics Cards -->
<div class="row g-4 mb-5">
    <div class="col-md-4" data-aos="fade-up">
        <div class="card border-0 rounded-5 shadow-sm bg-white overflow-hidden h-100">
            <div class="card-body p-4 d-flex align-items-center">
                <div class="bg-teal bg-opacity-10 rounded-4 d-flex align-items-center justify-content-center me-4" style="width: 70px; height: 70px;">
                    <i class="fa-solid fa-hippo text-teal fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted text-uppercase small fw-bold mb-1" style="letter-spacing: 1px;">Total Animals</h6>
                    <h2 class="marker-title text-dark mb-0" style="font-size: 2.5rem;">{{ $totalAnimals }}</h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="card border-0 rounded-5 shadow-sm bg-white overflow-hidden h-100">
            <div class="card-body p-4 d-flex align-items-center">
                <div class="bg-plum bg-opacity-10 rounded-4 d-flex align-items-center justify-content-center me-4" style="width: 70px; height: 70px;">
                    <i class="fa-solid fa-tags text-plum fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted text-uppercase small fw-bold mb-1" style="letter-spacing: 1px;">Kingdoms</h6>
                    <h2 class="marker-title text-dark mb-0" style="font-size: 2.5rem;">{{ $totalCategories }}</h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="card border-0 rounded-5 shadow-sm bg-white overflow-hidden h-100">
            <div class="card-body p-4 d-flex align-items-center">
                <div class="bg-yellow bg-opacity-10 rounded-4 d-flex align-items-center justify-content-center me-4" style="width: 70px; height: 70px;">
                    <i class="fa-solid fa-images text-yellow fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted text-uppercase small fw-bold mb-1" style="letter-spacing: 1px;">Media Library</h6>
                    <h2 class="marker-title text-dark mb-0" style="font-size: 2.5rem;">{{ $totalImages }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="row g-4 mb-5">
    <!-- Kingdom Distribution Chart -->
    <div class="col-lg-6" data-aos="fade-up">
        <div class="card border-0 rounded-5 shadow-sm bg-white h-100">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <h5 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-chart-pie text-teal me-2"></i>Kingdom Distribution</h5>
            </div>
            <div class="card-body p-4">
                <div style="height: 300px;">
                    <canvas id="kingdomChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Growth Analytics Chart -->
    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="card border-0 rounded-5 shadow-sm bg-white h-100">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <h5 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-chart-line text-plum me-2"></i>Discovery Growth</h5>
            </div>
            <div class="card-body p-4">
                <div style="height: 300px;">
                    <canvas id="growthChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Kingdom Distribution Chart
        const kingdomCtx = document.getElementById('kingdomChart').getContext('2d');
        new Chart(kingdomCtx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($chartLabels) !!},
                datasets: [{
                    data: {!! json_encode($chartValues) !!},
                    backgroundColor: [
                        '#008691', // Teal
                        '#6b21a8', // Plum
                        '#f1b200', // Yellow
                        '#10b981', // Emerald
                        '#3b82f6', // Blue
                        '#f43f5e'  // Rose
                    ],
                    borderWidth: 0,
                    hoverOffset: 15
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: { family: 'Outfit', size: 12 }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        padding: 12,
                        cornerRadius: 8
                    }
                },
                cutout: '70%'
            }
        });

        // Growth Chart (Simulated Timeline)
        const growthCtx = document.getElementById('growthChart').getContext('2d');
        new Chart(growthCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Species Added',
                    data: [5, 8, 15, 12, 20, {{ $totalAnimals }}],
                    borderColor: '#6b21a8',
                    backgroundColor: 'rgba(107, 33, 168, 0.1)',
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#f1b200',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 3,
                    pointRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { display: false }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });
    });
</script>
@endpush
<div class="card border-0 rounded-5 shadow-sm bg-white" data-aos="fade-up" data-aos-delay="300">
    <div class="card-header bg-white border-bottom border-opacity-10 pt-4 pb-3 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-clock-rotate-left text-teal me-2"></i>Recently Added Species</h5>
        <a href="{{ route('animals.index') }}" class="btn-zoo py-2 px-4 fs-6" style="padding: 8px 20px !important; font-size: 0.85rem;">View All</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-uppercase small fw-bold text-muted" style="letter-spacing: 1px;">Avatar</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted" style="letter-spacing: 1px;">Name</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted" style="letter-spacing: 1px;">Category</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted" style="letter-spacing: 1px;">Timeline</th>
                        <th class="text-end pe-4 py-3 text-uppercase small fw-bold text-muted" style="letter-spacing: 1px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentAnimals as $animal)
                        <tr>
                            <td class="ps-4">
                                @if($animal->image)
                                    <div class="blob-container blob-shape-{{ ($animal->id % 4) + 1 }} shadow-sm" style="width: 50px; height: 50px;">
                                        <img src="{{ asset('images/' . $animal->image) }}" class="blob-img" alt="{{ $animal->name }}">
                                    </div>
                                @else
                                    <div class="bg-light blob-shape-1 d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                                        <i class="fa-solid fa-paw text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <span class="fw-bold text-dark fs-5">{{ $animal->name }}</span>
                            </td>
                            <td>
                                <span class="badge rounded-pill px-3 py-2" style="background-color: rgba(0, 134, 145, 0.1); color: var(--zoo-teal);">
                                    {{ $animal->category->name ?? 'Uncategorized' }}
                                </span>
                            </td>
                            <td>
                                <span class="text-muted small fw-medium">{{ $animal->created_at->diffForHumans() }}</span>
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-light text-teal rounded-circle shadow-sm" style="width: 38px; height: 38px; display: flex; align-items: center; justify-content: center;" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="opacity-25 mb-3">
                                    <i class="fa-solid fa-folder-open fa-3x"></i>
                                </div>
                                <h5 class="text-muted">No animals recorded yet.</h5>
                                <a href="{{ route('animals.create') }}" class="btn-zoo btn-sm mt-3">Add Your First Species</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
