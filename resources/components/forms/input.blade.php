@props(['title' => null, 'type' => 'text', 'required' => false, 'id' => uniqid('input-'), 'before' => null, 'after' => null])
@php $isPassword = strtolower($type) === 'password'; @endphp

@if ($title)
    <label for="{{ $id }}" class="form-label">
        {{ $title }}

        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

<div @class(['col', 'input-group' => $before || $after || $isPassword])>
    @if ($before)
        <span class="input-group-text">{{ $before }}</span>
    @endif

    <input type="{{ $type }}" id="{{ $id }}" {{ $attributes->merge(['class' => 'form-control']) }}
        @if ($required) required @endif />

    @if ($isPassword)
        <span class="input-group-text" tabindex="-1">
            <a href="#" class="link-secondary text-decoration-none" onclick="event.preventDefault(); togglePassword(this, '#{{ $id }}')" title="{{ __('Toggle password visibility') }}" tabindex="-1">
                <i class="ti ti-eye"></i>
            </a>
        </span>
    @endif

    @if ($after)
        <span class="input-group-text">{{ $after }}</span>
    @endif

    <x-components::forms.invalid-feedback :field="$id" />
</div>
