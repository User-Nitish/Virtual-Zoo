@extends('layouts.app')

@section('title', 'Admin Portal - Neo Apex Virtual Zoo')

@section('content')

<section class="min-vh-100 d-flex flex-column align-items-center justify-content-center position-relative overflow-hidden bg-dark" style="padding-top: 100px;">
    <!-- Abstract Background -->
    <div class="position-absolute w-100 h-100 top-0 start-0 z-0">
        <div class="bg-blob-yellow blob-shape-1 opacity-25" style="width: 500px; height: 500px; top: -100px; right: -100px; filter: blur(60px);"></div>
        <div class="bg-blob-yellow blob-shape-3 opacity-25" style="width: 400px; height: 400px; bottom: -50px; left: -50px; filter: blur(50px);"></div>
        <div class="vignette position-absolute w-100 h-100" style="background: radial-gradient(circle at center, transparent 0%, #111 100%);"></div>
    </div>

    <div class="container position-relative z-1">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5">
                
                <div class="text-center mb-5" data-aos="fade-down">
                    <span class="text-yellow fw-bold text-uppercase d-block mb-2" style="letter-spacing: 4px; font-size: 0.8rem;">Secure Access</span>
                    <h1 class="marker-title text-white mb-0" style="font-size: 3.5rem;">ADMIN PORTAL</h1>
                </div>

                <div class="glass-panel p-5 rounded-5 shadow-2xl" data-aos="fade-up" data-aos-delay="100" style="border: 1px solid rgba(255,255,255,0.1); background: rgba(0,0,0,0.4);">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-4 mb-4 border-0 shadow-sm" style="background: rgba(220, 53, 69, 0.1); color: #ff6b6b; border-left: 4px solid #dc3545 !important;">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="email" class="form-label text-white-50 text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 2px;">Email Address</label>
                            <input type="email" class="form-control form-control-lg bg-transparent text-white border-secondary rounded-4 shadow-none" id="email" name="email" value="{{ old('email') }}" required autofocus style="backdrop-filter: blur(5px);">
                        </div>

                        <div class="mb-5">
                            <label for="password" class="form-label text-white-50 text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 2px;">Password</label>
                            <input type="password" class="form-control form-control-lg bg-transparent text-white border-secondary rounded-4 shadow-none" id="password" name="password" required style="backdrop-filter: blur(5px);">
                        </div>

                        <button type="submit" class="btn-zoo w-100 py-3 text-uppercase fw-bold" style="letter-spacing: 2px; font-size: 0.9rem;">
                            Initiate Override
                        </button>
                    </form>

                    <div class="text-center mt-4 pt-3 border-top border-secondary opacity-50">
                        <small class="text-white-50">Authorized Personnel Only. Neo Apex Systems.</small>
                    </div>
                </div>

                <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ route('home') }}" class="text-white-50 text-decoration-none">
                        <i class="fa-solid fa-arrow-left me-2"></i> Return to Directory
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
