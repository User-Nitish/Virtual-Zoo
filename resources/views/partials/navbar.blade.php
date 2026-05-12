<div class="container fixed-top mt-3" style="z-index: 1030;">
    <nav class="navbar navbar-expand-lg rounded-pill" id="mainNavbar" style="background-color: rgba(255, 255, 255, 0.75) !important; backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px); box-shadow: 0 4px 20px rgba(0,0,0,0.05); border: 1px solid rgba(255,255,255,0.4); padding: 8px 24px;">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <div class="bg-yellow rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                    <i class="fa-solid fa-paw text-plum" style="font-size: 0.9rem;"></i>
                </div>
                <span class="marker-title text-plum mb-0" style="font-size: 1.75rem; letter-spacing: 1px; line-height: 1;">VIRTUAL ZOO</span>
            </a>
            
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fa-solid fa-bars text-plum fs-4"></i>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item mx-1">
                        <a class="nav-link nav-pill-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Journey</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link nav-pill-link {{ request()->routeIs('directory') ? 'active' : '' }}" href="{{ route('directory') }}">Discovery</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link nav-pill-link {{ request()->routeIs('modern.webcams') ? 'active' : '' }}" href="{{ route('modern.webcams') }}">Live Cams</a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        <a class="btn-zoo bg-yellow text-dark px-4 py-2 text-decoration-none shadow-sm" href="{{ route('admin.dashboard') }}" style="font-size: 0.9rem; padding: 8px 20px !important;">
                            <i class="fa-solid fa-user-shield me-2"></i>Admin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<style>
    /* Thin Floating Glass Pill Navbar */
    .nav-pill-link {
        color: var(--zoo-dark) !important;
        font-weight: 600;
        font-size: 0.9rem;
        padding: 6px 14px !important;
        border-radius: 50px;
        transition: all 0.3s ease;
    }
    
    .nav-pill-link:hover, .nav-pill-link.active {
        background-color: rgba(0, 134, 145, 0.1);
        color: var(--zoo-teal) !important;
        transform: translateY(-2px);
    }

    @media (max-width: 991.98px) {
        #mainNavbar {
            border-radius: 20px !important;
            padding: 15px !important;
        }
        .nav-pill-link {
            padding: 10px 14px !important;
            margin-bottom: 5px;
        }
    }
</style>
