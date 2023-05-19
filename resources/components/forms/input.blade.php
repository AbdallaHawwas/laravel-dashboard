@props(['name', 'title' => null, 'type' => 'text', 'required' => false])
@php $isPassword = strtolower($type) === 'password'; @endphp

@if ($title)
    <label for="{{ $name }}" class="form-label">
        {{ $title }}

        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

<div @class(['input-group' => $isPassword])>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control"
        {{ $attributes->merge(['required' => $required]) }}>

    @if ($isPassword)
        <span class="input-group-text">
            <a href="#" class="link-secondary text-decoration-none" onclick="event.preventDefault(); togglePassword(this, '#{{ $name }}')">
                <i class="ti ti-eye"></i>
            </a>
        </span>
    @endif
</div>

<x-components::forms.invalid-feedback :field="$name" />
