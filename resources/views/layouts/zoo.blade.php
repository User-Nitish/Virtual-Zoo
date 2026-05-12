<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neo Apex Virtual Zoo Explorer</title>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body { 
            background-color: var(--zoo-light); 
            color: var(--zoo-dark); 
            overflow-x: hidden; 
        }
        
        /* Hide scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #F5F5F0; }
        ::-webkit-scrollbar-thumb { background: var(--zoo-teal); border-radius: 10px; }

        .glass-nav {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(0, 134, 145, 0.1);
        }
    </style>
</head>
<body class="antialiased">
    
    <!-- Modern Pill Navbar -->
    <nav class="fixed-top glass-nav py-3 px-4 m-3 rounded-pill shadow-sm d-flex justify-content-between align-items-center mx-auto" style="max-width: 1200px; z-index: 1000;">
        <a href="{{ route('home') }}" class="marker-title fs-3 text-teal mb-0 text-decoration-none">Neo Apex <span class="text-yellow">Virtual Zoo</span></a>
        
        <div class="d-none d-md-flex gap-4">
            <a href="{{ route('home') }}" class="nav-link fw-bold text-dark hover-teal">Journey</a>
            <a href="{{ route('modern.directory') }}" class="nav-link fw-bold text-dark hover-teal {{ request()->routeIs('modern.directory') ? 'text-teal' : '' }}">Directory</a>
            <a href="{{ route('modern.webcams') }}" class="nav-link fw-bold text-dark hover-teal {{ request()->routeIs('modern.webcams') ? 'text-teal' : '' }}">Live Cams</a>
            <a href="{{ route('tour') }}" class="nav-link fw-bold text-dark hover-teal">Tour</a>
        </div>
        
        <a href="{{ route('home') }}" class="btn-zoo py-2 px-4 fs-6">Basecamp</a>
    </nav>

    <main style="padding-top: 100px;">
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    @stack('scripts')
</body>
</html>
