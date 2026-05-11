<div id="sidebar" class="col-md-3 col-lg-2 d-md-block collapse p-0 position-sticky top-0 h-100">
    <div class="p-4 d-flex align-items-center border-bottom border-light">
        <i class="fa-solid fa-leaf fa-2x text-success me-2"></i>
        <span class="fs-5 fw-bold text-success">Admin Panel</span>
    </div>
    
    <div class="p-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-line fa-fw me-3"></i> Dashboard
                </a>
            </li>
            
            <li class="nav-item mt-3 mb-2">
                <small class="text-uppercase text-muted fw-bold px-3" style="font-size: 0.75rem;">Management</small>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('animals.index') }}" class="sidebar-link {{ request()->routeIs('animals.index') ? 'active' : '' }}">
                    <i class="fa-solid fa-hippo fa-fw me-3"></i> All Animals
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('animals.create') }}" class="sidebar-link {{ request()->routeIs('animals.create') ? 'active' : '' }}">
                    <i class="fa-solid fa-plus-circle fa-fw me-3"></i> Add Animal
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="sidebar-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-tags fa-fw me-3"></i> Categories
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Mobile toggle button (visible only on small screens) -->
    <div class="d-md-none text-center p-3 border-top position-absolute bottom-0 w-100">
        <button class="btn btn-outline-secondary w-100" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
            <i class="fa-solid fa-times me-2"></i>Close Menu
        </button>
    </div>
</div>

<!-- Mobile trigger -->
<div class="d-md-none p-3 bg-white border-bottom d-flex justify-content-between align-items-center">
    <span class="fw-bold text-success"><i class="fa-solid fa-leaf me-2"></i>Admin</span>
    <button class="btn btn-light shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-expanded="false" aria-controls="sidebar">
        <i class="fa-solid fa-bars"></i>
    </button>
</div>
