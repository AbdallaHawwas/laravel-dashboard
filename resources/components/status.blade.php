@php
    foreach (['success', 'error', 'warning', 'info'] as $status) {
        if (session()->has($status)) {
            $color = $status == 'error' ? 'danger' : $status;
            break;
        }
    }
@endphp

@if (session()->has($status))
    <div {{ $attributes->merge(['class' => 'alert alert-dismissible alert-' . $color]) }}>
        {{ session($status) }}
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
@endif
