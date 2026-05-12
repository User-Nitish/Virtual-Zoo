@props(['title', 'subtitle' => null, 'actionUrl' => null, 'actionText' => null, 'actionIcon' => 'fa-plus'])

<div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
    <div>
        <h2 class="marker-title text-plum mb-1" style="font-size: 3.5rem;">{{ $title }}</h2>
        @if($subtitle)
            <p class="text-muted fs-5 mb-0" style="max-width: 600px;">{{ $subtitle }}</p>
        @endif
    </div>
    
    @if($actionUrl && $actionText)
        <a href="{{ $actionUrl }}" class="btn-zoo shadow-sm">
            <i class="fa-solid {{ $actionIcon }} me-2"></i>{{ $actionText }}
        </a>
    @endif
</div>
