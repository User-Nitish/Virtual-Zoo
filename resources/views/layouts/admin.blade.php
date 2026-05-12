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
            overflow-x: hidden;
        }
        
        /* Fixed Background Blobs for consistency */
        .admin-bg-blobs {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            pointer-events: none;
            background-color: #ffffff;
            background-image: 
                radial-gradient(circle at 5% 5%, rgba(0, 134, 145, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 95% 95%, rgba(129, 56, 97, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 50% 50%, rgba(241, 178, 0, 0.05) 0%, transparent 50%);
        }

        #sidebar {
            min-height: 100vh;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(0,0,0,0.05);
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
            border-radius: 12px;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        .sidebar-link:hover {
            background-color: rgba(0, 134, 145, 0.1);
            color: var(--zoo-teal);
            transform: translateX(5px);
        }
        .sidebar-link.active {
            background-color: var(--zoo-teal);
            color: #ffffff;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(0, 134, 145, 0.2);
        }
    </style>
</head>
<body class="antialiased">

    <div class="admin-bg-blobs"></div>

    <div class="d-flex flex-column flex-md-row">
        
        <!-- Sidebar Component -->
        <x-admin-sidebar />

        <!-- Main Content Area -->
        <div class="admin-main w-100">
            <!-- Topbar -->
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom border-opacity-10 border-dark">
                <div>
                    <span class="text-uppercase small fw-bold text-muted mb-1 d-block" style="letter-spacing: 1px;">Admin Control Center</span>
                    <h4 class="mb-0 text-dark fw-bold">@yield('title')</h4>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('home') }}" class="btn-zoo py-2 px-4 fs-6" style="padding: 8px 20px !important;">
                        <i class="fa-solid fa-globe me-2"></i> View Site
                    </a>
                    <div class="dropdown">
                        <button class="btn btn-white rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user text-teal"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3 p-2 rounded-4">
                            <li><h6 class="dropdown-header text-dark fw-bold">Administrator</h6></li>
                            <li><hr class="dropdown-divider opacity-10"></li>
                            <li><a class="dropdown-item rounded-3 py-2" href="{{ route('home') }}"><i class="fa-solid fa-sign-out-alt me-2 text-muted"></i>Exit Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="container-fluid px-0">
                @yield('content')
            </div>
            
        </div>
    </div>

    @stack('scripts')

</body>
</html>
