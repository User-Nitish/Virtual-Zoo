@props(['title', 'subtitle' => null])

<div class="text-center mb-5">
    <h2 class="section-title fw-bold text-dark">{{ $title }}</h2>
    @if($subtitle)
        <p class="text-muted">{{ $subtitle }}</p>
    @endif
</div>
