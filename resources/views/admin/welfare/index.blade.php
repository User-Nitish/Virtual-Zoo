@extends('layouts.admin')

@section('title', 'Welfare Center')

@section('content')

<div class="mb-5" data-aos="fade-down">
    <div class="d-flex align-items-center">
        <div class="bg-primary bg-opacity-10 p-3 rounded-4 me-4">
            <i class="fa-solid fa-file-medical text-primary fa-2x"></i>
        </div>
        <div>
            <h1 class="fw-bold text-dark mb-0" style="font-size: 2.8rem; letter-spacing: -1px;">Species Welfare</h1>
            <p class="text-muted fs-5 mb-0">Management of health protocols and nutritional requirements.</p>
        </div>
    </div>
</div>

<div class="row g-4">
    @foreach($animals as $animal)
        <div class="col-xl-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 100 }}">
            <div class="welfare-horizontal-pill shadow-sm bg-white border border-light">
                <div class="row g-0 h-100">
                    <!-- Left: Profile Section -->
                    <div class="col-md-4 profile-side d-flex flex-column align-items-center justify-content-center p-4 border-end border-light">
                        <div class="image-wrapper-v4 mb-3">
                            <div class="blob-container blob-shape-{{ ($animal->id % 4) + 1 }} shadow-lg" style="width: 110px; height: 110px;">
                                <img src="{{ asset('images/' . ($animal->image ?? 'placeholders/elephant.png')) }}" class="blob-img" alt="{{ $animal->name }}">
                            </div>
                            <div class="status-glow {{ $animal->health_status == 'Excellent' ? 'glow-blue' : ($animal->health_status == 'Stable' ? 'glow-teal' : 'glow-red') }}"></div>
                        </div>
                        <h3 class="marker-title text-dark mb-1 text-center" style="font-size: 1.8rem; line-height: 1.1;">{{ $animal->name }}</h3>
                        <span class="badge rounded-pill bg-light text-primary border px-3 py-1 fw-bold" style="font-size: 0.65rem; letter-spacing: 1px;">{{ $animal->category->name }}</span>
                    </div>

                    <!-- Right: Form Section -->
                    <div class="col-md-8 p-4 bg-light bg-opacity-30">
                        <form action="{{ route('admin.welfare.update', $animal->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="input-glass-v4">
                                        <label><i class="fa-solid fa-heart-pulse me-2"></i>Health Condition</label>
                                        <select name="health_status">
                                            <option value="Excellent" {{ $animal->health_status == 'Excellent' ? 'selected' : '' }}>Excellent</option>
                                            <option value="Stable" {{ $animal->health_status == 'Stable' ? 'selected' : '' }}>Stable</option>
                                            <option value="Needs Attention" {{ $animal->health_status == 'Needs Attention' ? 'selected' : '' }}>Attention</option>
                                            <option value="Critical" {{ $animal->health_status == 'Critical' ? 'selected' : '' }}>Critical</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-glass-v4">
                                        <label><i class="fa-solid fa-utensils me-2"></i>Dietary Needs</label>
                                        <input type="text" name="dietary_needs" value="{{ $animal->dietary_needs }}" placeholder="Specify daily diet...">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="input-glass-v4">
                                        <label>Last Exam</label>
                                        <input type="date" name="last_checkup" value="{{ $animal->last_checkup }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-glass-v4">
                                        <label>Next Exam</label>
                                        <input type="date" name="next_checkup" value="{{ $animal->next_checkup }}">
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn-v4-yellow w-100 shadow-lg">
                                        <i class="fa-solid fa-sync-alt me-2"></i>Sync Records
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<style>
    :root {
        --v4-blue: #0284c7;
        --v4-teal: #0d9488;
        --v4-red: #e11d48;
    }

    .welfare-horizontal-pill {
        border-radius: 40px;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
    }

    .welfare-horizontal-pill:hover {
        transform: scale(1.02);
        box-shadow: 0 20px 40px rgba(2, 132, 199, 0.1) !important;
        border-color: var(--v4-blue) !important;
    }

    .image-wrapper-v4 {
        position: relative;
    }

    .status-glow {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 4px solid #fff;
    }

    .glow-blue { background: var(--v4-blue); box-shadow: 0 0 15px var(--v4-blue); }
    .glow-teal { background: var(--v4-teal); box-shadow: 0 0 15px var(--v4-teal); }
    .glow-red { background: var(--v4-red); box-shadow: 0 0 15px var(--v4-red); }

    .input-glass-v4 {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 10px 18px;
        transition: all 0.2s ease;
    }

    .input-glass-v4:focus-within {
        border-color: var(--v4-blue);
        box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.1);
    }

    .input-glass-v4 label {
        display: block;
        font-size: 0.6rem;
        font-weight: 800;
        text-transform: uppercase;
        color: #94a3b8;
        margin-bottom: 2px;
        letter-spacing: 1px;
    }

    .input-glass-v4 select, .input-glass-v4 input {
        border: none;
        background: transparent;
        width: 100%;
        outline: none;
        font-weight: 600;
        color: #1e293b;
        font-size: 0.9rem;
    }

    .btn-v4-blue {
        background: var(--v4-blue);
        color: #fff;
        border: none;
        padding: 15px;
        border-radius: 20px;
        font-weight: 700;
        letter-spacing: 1px;
        transition: all 0.3s ease;
    }

    .btn-v4-blue:hover {
        background: #0369a1;
        transform: translateY(-2px);
    }

    .btn-v4-yellow {
        background: #f1b200;
        color: #000;
        border: none;
        padding: 15px;
        border-radius: 20px;
        font-weight: 800;
        letter-spacing: 1.5px;
        transition: all 0.3s ease;
        text-transform: uppercase;
    }

    .btn-v4-yellow:hover {
        background: #d9a000;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(241, 178, 0, 0.2);
    }
</style>

@endsection
