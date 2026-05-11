@props(['type' => 'info', 'message'])

<div class="alert alert-{{ $type }} alert-dismissible fade show shadow-sm rounded-3" role="alert">
    @if($type == 'success')
        <i class="fa-solid fa-check-circle me-2"></i>
    @elseif($type == 'danger')
        <i class="fa-solid fa-triangle-exclamation me-2"></i>
    @else
        <i class="fa-solid fa-info-circle me-2"></i>
    @endif
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
