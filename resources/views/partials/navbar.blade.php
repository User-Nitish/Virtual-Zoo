<nav class="navbar navbar-expand-lg navbar-minimal fixed-top" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <i class="fa-solid fa-leaf me-2 text-accent"></i>
            <span class="text-white fw-900 letter-spacing-1">VIRTUAL ZOO</span>
        </a>
        
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item mx-3">
                    <a class="nav-link text-white small fw-bold text-uppercase letter-spacing-2 {{ request()->routeIs('home') ? 'text-accent' : 'opacity-75' }}" href="{{ route('home') }}">Journey</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link text-white small fw-bold text-uppercase letter-spacing-2 {{ request()->routeIs('directory') ? 'text-accent' : 'opacity-75' }}" href="{{ route('directory') }}">Discovery</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link text-white small fw-bold text-uppercase letter-spacing-2 {{ request()->routeIs('categories.*') ? 'text-accent' : 'opacity-75' }}" href="{{ route('categories.index') }}">Kingdoms</a>
                </li>
                <li class="nav-item ms-lg-4">
                    <a class="btn btn-outline-light rounded-pill px-4 py-2 small fw-bold text-uppercase letter-spacing-1" href="{{ route('admin.dashboard') }}">
                        <i class="fa-solid fa-user-shield me-2"></i>Admin
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('mainNavbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>

<style>
    .letter-spacing-1 { letter-spacing: 1px; }
    .letter-spacing-2 { letter-spacing: 2px; }
    .fw-900 { font-weight: 900; }
    .nav-link:hover { color: var(--accent-color) !important; opacity: 1 !important; }
</style>
