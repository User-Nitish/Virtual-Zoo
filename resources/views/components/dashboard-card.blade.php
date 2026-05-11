@props(['title', 'count', 'icon', 'color' => 'success'])

<div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
    <div class="card-body p-4 position-relative">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <p class="text-muted text-uppercase fw-bold mb-1" style="font-size: 0.85rem;">{{ $title }}</p>
                <h2 class="display-5 fw-bold text-dark mb-0">{{ $count }}</h2>
            </div>
            <div class="bg-{{ $color }} bg-opacity-10 p-3 rounded-circle text-{{ $color }}">
                <i class="fa-solid {{ $icon }} fa-2x"></i>
            </div>
        </div>
    </div>
    <!-- Decorative bottom border -->
    <div class="bg-{{ $color }} w-100" style="height: 4px;"></div>
</div>
