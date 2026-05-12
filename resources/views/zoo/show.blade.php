@extends('layouts.zoo')

@section('content')
<div class="flex flex-col md:flex-row min-h-screen pt-24">
    
    <!-- Left: Sticky Image Container -->
    <div class="w-full md:w-1/2 h-[50vh] md:h-[calc(100vh-6rem)] sticky top-24 p-8">
        <div class="w-full h-full rounded-[3rem] overflow-hidden shadow-2xl">
            <img src="https://images.unsplash.com/photo-1614027164847-1b28cfe1df60" class="w-full h-full object-cover">
        </div>
    </div>

    <!-- Right: Scrolling Content & Panorama -->
    <div class="w-full md:w-1/2 p-12 lg:p-24 overflow-y-auto">
        <span class="text-matte-terra font-bold uppercase tracking-widest">Panthera leo</span>
        <h1 class="text-6xl font-bold text-matte-green mt-2 mb-8">African Lion</h1>
        
        <p class="text-lg text-matte-slate leading-relaxed mb-12">
            The African lion is the apex predator of the savanna. Known for their tight-knit family groups called prides, they are a symbol of strength and social intelligence.
        </p>

        <!-- Quick Facts Grid -->
        <div class="grid grid-cols-2 gap-6 mb-16">
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                <p class="text-sm text-matte-slate mb-1">Diet</p>
                <p class="font-bold text-matte-green">Carnivore</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                <p class="text-sm text-matte-slate mb-1">Status</p>
                <p class="font-bold text-matte-terra">Vulnerable</p>
            </div>
        </div>

        <!-- 360 Panorama Section -->
        <h3 class="text-2xl font-bold text-matte-green mb-6">Explore the Enclosure</h3>
        <div class="w-full h-80 rounded-3xl overflow-hidden shadow-md" id="panorama"></div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize 360 Panorama using Pannellum
    pannellum.viewer('panorama', {
        "type": "equirectangular",
        "panorama": "https://pannellum.org/images/alma.jpg", // Demo 360 image
        "autoLoad": true,
        "compass": false,
        "showControls": false
    });
</script>
@endpush
