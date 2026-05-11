<footer class="footer-zoo text-center text-lg-start mt-auto">
    <div class="container p-5">
        <div class="row g-4">
            <!-- Brand Section -->
            <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                <h4 class="footer-title d-flex align-items-center justify-content-center justify-content-lg-start">
                    <i class="fa-solid fa-leaf me-2"></i>Virtual Zoo
                </h4>
                <p class="text-white-50">
                    Experience the wonders of wildlife from the comfort of your home. 
                    A modern college project showcasing Laravel MVC architecture, 
                    clean UI design, and an interactive zoo management system.
                </p>
                <div class="mt-4">
                    <a href="#" class="btn btn-outline-light rounded-circle me-2"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-light rounded-circle me-2"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="btn btn-outline-light rounded-circle me-2"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="btn btn-outline-light rounded-circle"><i class="fa-brands fa-github"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4 font-weight-bold text-white">Explore</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-3"><a href="{{ route('home') }}" class="footer-link"><i class="fa-solid fa-angle-right me-2 small"></i>Home</a></li>
                    <li class="mb-3"><a href="{{ route('directory') }}" class="footer-link"><i class="fa-solid fa-angle-right me-2 small"></i>Animal Directory</a></li>
                    <li class="mb-3"><a href="{{ route('categories.index') }}" class="footer-link"><i class="fa-solid fa-angle-right me-2 small"></i>Categories</a></li>
                    <li class="mb-3"><a href="{{ route('admin.dashboard') }}" class="footer-link"><i class="fa-solid fa-angle-right me-2 small"></i>Admin Dashboard</a></li>
                </ul>
            </div>

            <!-- Contact Section -->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4 font-weight-bold text-white">Contact Us</h5>
                <ul class="list-unstyled mb-0 text-white-50">
                    <li class="mb-3"><i class="fa-solid fa-location-dot me-3 text-accent"></i> 123 Wildlife Ave, Nature City</li>
                    <li class="mb-3"><i class="fa-solid fa-envelope me-3 text-accent"></i> info@virtualzoo.edu</li>
                    <li class="mb-3"><i class="fa-solid fa-phone me-3 text-accent"></i> +1 (555) 123-4567</li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
        <span class="text-white-50">© {{ date('Y') }} Virtual Zoo College Project (INT221). All Rights Reserved.</span>
    </div>
</footer>
