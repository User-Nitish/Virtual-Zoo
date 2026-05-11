<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Virtual Zoo</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Vite Directives for Bootstrap and App CSS/JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #f8f9fa;
        }
        #sidebar {
            min-height: 100vh;
            background-color: #ffffff;
            border-right: 1px solid #e9ecef;
            box-shadow: 2px 0 5px rgba(0,0,0,0.05);
            z-index: 1000;
        }
        .admin-main {
            flex-grow: 1;
            padding: 2rem;
            min-height: 100vh;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.8rem 1.2rem;
            color: #495057;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }
        .sidebar-link:hover {
            background-color: #e8f5e9;
            color: var(--primary-color);
        }
        .sidebar-link.active {
            background-color: var(--primary-color);
            color: #ffffff;
            font-weight: 600;
            box-shadow: 0 4px 6px rgba(46, 125, 50, 0.2);
        }
    </style>
</head>
<body>

    <div class="d-flex flex-column flex-md-row">
        
        <!-- Sidebar Component -->
        <x-admin-sidebar />

        <!-- Main Content Area -->
        <div class="admin-main bg-light w-100">
            <!-- Topbar -->
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                <h4 class="mb-0 text-dark fw-bold">@yield('title')</h4>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('home') }}" class="btn btn-outline-success btn-sm rounded-pill px-3">
                        <i class="fa-solid fa-globe me-1"></i> View Site
                    </a>
                    <div class="dropdown">
                        <button class="btn btn-light rounded-circle shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user text-success"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                            <li><h6 class="dropdown-header">Admin User</h6></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('home') }}"><i class="fa-solid fa-sign-out-alt me-2 text-muted"></i>Exit Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Flash Messages Component -->
            @if(session('success'))
                <x-alert type="success" :message="session('success')" />
            @endif

            @if(session('error'))
                <x-alert type="danger" :message="session('error')" />
            @endif

            <!-- Content Injection -->
            @yield('content')
            
        </div>
    </div>

</body>
</html>
