@extends('layouts.zoo')

@section('content')
<!-- Hero Section -->
<section class="h-screen w-full relative flex items-center justify-center overflow-hidden" id="hero">
    <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-90" id="hero-vid">
        <source src="https://cdn.pixabay.com/vimeo/328221876/forest-22802.mp4?width=1280&hash=07f59d5c317f2bc2b55fbe9e3bba5b83842c75a7" type="video/mp4">
    </video>
    <div class="absolute inset-0 bg-matte-green/40"></div>
    
    <div class="relative z-10 text-center text-matte-bg">
        <h1 class="text-7xl font-bold tracking-tighter mb-6 gs-reveal">Into The Wild</h1>
        <p class="text-xl font-light gs-reveal">A digital sanctuary for education and discovery.</p>
    </div>
</section>

<!-- Pinned Habitats Experience -->
<div id="habitats-wrapper" class="bg-matte-bg">
    <!-- Habitat 1 -->
    <section class="h-screen w-full flex items-center relative habitat-panel overflow-hidden">
        <div class="w-1/2 h-full bg-[url('https://images.unsplash.com/photo-1516426122078-c23e76319801')] bg-cover bg-center"></div>
        <div class="w-1/2 px-20 flex flex-col justify-center">
            <span class="text-matte-terra font-bold uppercase tracking-widest text-sm mb-4">Habitat 01</span>
            <h2 class="text-6xl font-bold text-matte-green mb-6">The Savanna</h2>
            <p class="text-matte-slate text-lg leading-relaxed">Vast plains where life moves in ancient rhythms beneath the endless sun.</p>
        </div>
    </section>

    <!-- Habitat 2 -->
    <section class="h-screen w-full flex items-center relative habitat-panel overflow-hidden">
        <div class="w-1/2 px-20 flex flex-col justify-center text-right">
            <span class="text-matte-terra font-bold uppercase tracking-widest text-sm mb-4">Habitat 02</span>
            <h2 class="text-6xl font-bold text-matte-green mb-6">The Rainforest</h2>
            <p class="text-matte-slate text-lg leading-relaxed">A dense, vertical world breathing with biodiversity and hidden wonders.</p>
        </div>
        <div class="w-1/2 h-full bg-[url('https://images.unsplash.com/photo-1540573133985-87b6da6d54a9')] bg-cover bg-center"></div>
    </section>
</div>

<!-- Horizontal Carousel: Meet the Animals -->
<section class="py-32 overflow-hidden bg-matte-green text-matte-bg" id="carousel-section">
    <div class="px-12 mb-16">
        <h2 class="text-5xl font-bold">Meet the Residents</h2>
    </div>
    
    <!-- Horizontal Scroll Container -->
    <div class="flex gap-8 px-12 w-[300vw]" id="horizontal-carousel">
        <!-- Card 1 -->
        <a href="{{ route('modern.animal') }}" class="w-[400px] h-[550px] relative group cursor-pointer overflow-hidden rounded-[3rem]">
            <img src="https://images.unsplash.com/photo-1564349683136-77e08dba1ef7" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-matte-green/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-8">
                <h3 class="text-3xl font-bold">Panda</h3>
            </div>
        </a>
        <!-- Card 2 -->
        <a href="{{ route('modern.animal') }}" class="w-[400px] h-[550px] relative group cursor-pointer overflow-hidden rounded-[3rem]">
            <img src="https://images.unsplash.com/photo-1614027164847-1b28cfe1df60" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-matte-green/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-8">
                <h3 class="text-3xl font-bold">African Lion</h3>
            </div>
        </a>
         <!-- Card 3 -->
         <a href="{{ route('modern.animal') }}" class="w-[400px] h-[550px] relative group cursor-pointer overflow-hidden rounded-[3rem]">
            <img src="https://images.unsplash.com/photo-1582967788606-a171c1080cb0" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-matte-green/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-8">
                <h3 class="text-3xl font-bold">Great White Shark</h3>
            </div>
        </a>
    </div>
</section>
@endsection

@push('scripts')
<script>
    gsap.registerPlugin(ScrollTrigger);

    // Hero Parallax
    gsap.to('#hero-vid', {
        yPercent: 30,
        scrollTrigger: { trigger: "#hero", start: "top top", scrub: true }
    });

    // Pinned Habitats (Wipes)
    const panels = gsap.utils.toArray('.habitat-panel');
    panels.forEach((panel, i) => {
        ScrollTrigger.create({
            trigger: panel,
            start: "top top",
            pin: true,
            pinSpacing: false
        });
    });

    // Horizontal Carousel Scrub
    gsap.to('#horizontal-carousel', {
        xPercent: -30, // Move left slightly
        ease: "none",
        scrollTrigger: {
            trigger: "#carousel-section",
            pin: true,
            scrub: 1,
            end: "+=2000"
        }
    });
</script>
@endpush
