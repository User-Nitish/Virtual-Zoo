<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Neo Apex Virtual Zoo')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Luckiest+Guy&family=Bangers&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Vite Directives for Bootstrap and App CSS/JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- AOS Animation Library CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <!-- 100% Bulletproof Fixed Background -->
    <div style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; z-index: -9999; pointer-events: none; background-color: #ffffff; background-image: radial-gradient(circle at 15% 15%, rgba(241, 178, 0, 0.3) 0%, transparent 45%), radial-gradient(circle at 85% 85%, rgba(0, 134, 145, 0.25) 0%, transparent 45%), radial-gradient(circle at 50% 50%, rgba(129, 56, 97, 0.2) 0%, transparent 50%);"></div>

    <!-- Navbar Partial -->
    @include('partials.navbar')

    <!-- Main Content -->
    <main>
        @if(session('success'))
            <div class="container mt-4">
                <x-alert type="success" :message="session('success')" />
            </div>
        @endif

        @if(session('error'))
            <div class="container mt-4">
                <x-alert type="danger" :message="session('error')" />
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer Partial -->
    @include('partials.footer')

    <!-- AOS Animation Library JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                offset: 100
            });
        });
    </script>
</body>
</html>
