<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Integration Test</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <!-- 1. Navbar Test -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Virtual Zoo Test</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- 2. Grid & Card Test -->
        <div class="row g-4 justify-content-center">
            
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-primary text-white rounded-top-4">
                        <h5 class="mb-0">Card Test 1</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">If you see this card with a blue header and rounded corners, Bootstrap CSS is working perfectly!</p>
                        <!-- 3. Button Test -->
                        <button class="btn btn-primary w-100">Primary Button</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-success text-white rounded-top-4">
                        <h5 class="mb-0">Card Test 2</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">This is a success card. Bootstrap grid is aligning these cards perfectly side-by-side on desktop.</p>
                        <!-- 3. Button Test -->
                        <button class="btn btn-success w-100">Success Button</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="text-center mt-5">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary rounded-pill px-4">Return to Main Project</a>
        </div>
    </div>

</body>
</html>
