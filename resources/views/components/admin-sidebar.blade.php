<div id="sidebar" class="col-md-3 col-lg-2 d-md-block collapse p-0 position-sticky top-0 h-100 shadow-sm" style="background: rgba(255,255,255,0.9); backdrop-filter: blur(10px);">
    <div class="p-4 d-flex align-items-center border-bottom border-light">
        <div class="bg-teal rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
            <i class="fa-solid fa-paw text-white" style="font-size: 0.9rem;"></i>
        </div>
        <span class="marker-title text-teal mb-0" style="font-size: 1.5rem; letter-spacing: 1px;">ADMIN</span>
    </div>
    
    <div class="p-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-line fa-fw me-3"></i> Dashboard
                </a>
            </li>
            
            <li class="nav-item mt-4 mb-2 px-3">
                <small class="text-uppercase text-muted fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">Collection</small>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('animals.index') }}" class="sidebar-link {{ request()->routeIs('animals.index') ? 'active' : '' }}">
                    <i class="fa-solid fa-hippo fa-fw me-3"></i> All Animals
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('animals.create') }}" class="sidebar-link {{ request()->routeIs('animals.create') ? 'active' : '' }}">
                    <i class="fa-solid fa-plus-circle fa-fw me-3"></i> Add Species
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="sidebar-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-tags fa-fw me-3"></i> Kingdoms
                </a>
            </li>

            <li class="nav-item mt-4 mb-2 px-3">
                <small class="text-uppercase text-muted fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">Welfare</small>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.welfare') }}" class="sidebar-link {{ request()->routeIs('admin.welfare') ? 'active' : '' }}">
                    <i class="fa-solid fa-heart-pulse fa-fw me-3"></i> Health & Food
                </a>
            </li>
            
            <li class="nav-item mt-4 mb-2 px-3">
                <small class="text-uppercase text-muted fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">Public Site</small>
            </li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="sidebar-link">
                    <i class="fa-solid fa-house fa-fw me-3"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tour') }}" class="sidebar-link">
                    <i class="fa-solid fa-play fa-fw me-3"></i> GSAP Tour
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Mobile toggle button (visible only on small screens) -->
    <div class="d-md-none text-center p-3 border-top position-absolute bottom-0 w-100">
        <button class="btn btn-outline-teal rounded-pill w-100" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
            <i class="fa-solid fa-times me-2"></i>Close Menu
        </button>
    </div>
</div>

<!-- Mobile trigger -->
<div class="d-md-none p-3 bg-white border-bottom d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
        <div class="bg-teal rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px;">
            <i class="fa-solid fa-paw text-white" style="font-size: 0.8rem;"></i>
        </div>
        <span class="marker-title text-teal mb-0" style="font-size: 1.2rem;">ADMIN</span>
    </div>
    <button class="btn btn-light shadow-sm rounded-circle" style="width: 40px; height: 40px;" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-expanded="false" aria-controls="sidebar">
        <i class="fa-solid fa-bars text-teal"></i>
    </button>
</div>
