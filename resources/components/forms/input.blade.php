@props(['title' => null, 'id' => uniqid('input-'), 'before' => null, 'after' => null])

@php
    $type = strtolower($attributes->get('type') ?? 'text');
    $isPassword = $type === 'password';

    $required = $attributes->get('required') ?? false;
@endphp

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

    <input type="{{ $type }}" id="{{ $id }}" {{ $attributes->merge(['class' => 'form-control']) }} />

    @if ($isPassword)
        <button type="button" class="input-group-text" onclick="togglePassword(this, '#{{ $id }}')" tabindex="-1">
            <i class="ti ti-eye"></i>
        </button>
    @endif

    @if ($after)
        <span class="input-group-text">{{ $after }}</span>
    @endif

    <x-components::forms.invalid-feedback :field="$id" />
</div>
