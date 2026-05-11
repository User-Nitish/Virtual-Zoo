@props(['title', 'subtitle' => null, 'actionUrl' => null, 'actionText' => null, 'actionIcon' => 'fa-plus'])

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="section-title mb-0">{{ $title }}</h2>
        @if($subtitle)
            <p class="text-muted mt-2">{{ $subtitle }}</p>
        @endif
    </div>
    
    @if($actionUrl && $actionText)
        <a href="{{ $actionUrl }}" class="btn btn-accent shadow-sm">
            <i class="fa-solid {{ $actionIcon }} me-2"></i>{{ $actionText }}
        </a>
    @endif
</div>
