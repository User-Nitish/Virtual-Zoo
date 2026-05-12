<footer class="footer-zoo position-relative bg-teal text-white overflow-hidden" style="margin-top: 100px;">
    <!-- Curve Transition -->
    <div class="footer-curve" style="position: absolute; top: -50px; left: 0; width: 100%; height: 50px; background: #008691; border-radius: 50% 50% 0 0 / 100% 100% 0 0;"></div>

    <div class="container position-relative z-1 py-5">
        <div class="row g-5">
            <!-- Brand & Mission -->
            <div class="col-lg-5 col-md-12">
                <div class="mb-4">
                    <h2 class="marker-title text-white mb-3 d-flex align-items-center" style="font-size: 2.8rem;">
                        <i class="fa-solid fa-paw me-3 text-yellow"></i>Neo Apex Virtual Zoo
                    </h2>
                    <p class="text-white-50 fs-5 mb-4" style="max-width: 450px; line-height: 1.8;">
                        Exploring the boundaries of biological education. Join our interactive journey through the world's most magnificent habitats.
                    </p>
                </div>
                
                <!-- Social Connections -->
                <div class="d-flex gap-3">
                    <a href="#" class="social-circle-btn"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="social-circle-btn"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="social-circle-btn"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="social-circle-btn"><i class="fa-brands fa-github"></i></a>
                </div>
            </div>

            <!-- Links Grid -->
            <div class="col-lg-3 col-md-6">
                <h4 class="marker-title text-yellow mb-4" style="font-size: 1.6rem; letter-spacing: 1px;">Navigation</h4>
                <ul class="list-unstyled">
                    <li class="mb-3"><a href="{{ route('home') }}" class="footer-nav-link">The Wild Path</a></li>
                    <li class="mb-3"><a href="{{ route('directory') }}" class="footer-nav-link">Species Archive</a></li>
                    <li class="mb-3"><a href="{{ route('admin.dashboard') }}" class="footer-nav-link">Curator Portal</a></li>
                    <li class="mb-3"><a href="#" class="footer-nav-link">Member Dossier</a></li>
                </ul>
            </div>

            <!-- Contact Details -->
            <div class="col-lg-4 col-md-6">
                <h4 class="marker-title text-yellow mb-4" style="font-size: 1.6rem; letter-spacing: 1px;">Base Camp</h4>
                <div class="contact-card p-4 rounded-5" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
                    <p class="mb-3 d-flex align-items-start gap-3">
                        <i class="fa-solid fa-location-dot text-yellow mt-1"></i>
                        <span class="text-white-50">123 Biological Way, Conservation Park, NW 9901</span>
                    </p>
                    <p class="mb-3 d-flex align-items-center gap-3">
                        <i class="fa-solid fa-envelope text-yellow"></i>
                        <span class="text-white-50">hello@virtualzoo.eco</span>
                    </p>
                    <p class="mb-0 d-flex align-items-center gap-3">
                        <i class="fa-solid fa-phone text-yellow"></i>
                        <span class="text-white-50">+1 (800) VIRTUAL-Z</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Copyright Bar -->
        <div class="mt-5 pt-4 border-top border-white border-opacity-10 text-center text-md-start">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0 text-white-50 small">
                        © {{ date('Y') }} Neo Apex Virtual Zoo Modern Wildlife. Built for the future of conservation.
                    </p>
                </div>
                <div class="col-md-6 text-md-end mt-2 mt-md-0">
                    <a href="#" class="text-white-50 text-decoration-none small hover-white transition-all me-4">Privacy</a>
                    <a href="#" class="text-white-50 text-decoration-none small hover-white transition-all">Terms</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .footer-nav-link {
        color: rgba(255, 255, 255, 0.6);
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 500;
        display: block;
    }

    .footer-nav-link:hover {
        color: #f1b200;
        transform: translateX(8px);
    }

    .social-circle-btn {
        width: 42px;
        height: 42px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .social-circle-btn:hover {
        background: #f1b200;
        color: #2c3e50;
        transform: translateY(-5px) rotate(10deg);
        border-color: #f1b200;
        box-shadow: 0 10px 20px rgba(241, 178, 0, 0.3);
    }

    .hover-white:hover { color: white !important; }
    .transition-all { transition: all 0.3s ease; }
</style>

