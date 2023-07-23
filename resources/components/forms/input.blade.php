@props(['name', 'title' => null, 'type' => 'text', 'required' => false])
@php $isPassword = strtolower($type) === 'password'; @endphp
@php $id = uniqid('input-'); @endphp

@if ($title)
    <label for="{{ $name }}" class="form-label">
        {{ $title }}

        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

<div @class(['col', 'input-group' => $isPassword])>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="form-control"
        {{ $attributes->merge(['required' => $required]) }}>

    @if ($isPassword)
        <span class="input-group-text" tabindex="-1">
            <a href="#" class="link-secondary text-decoration-none" onclick="event.preventDefault(); togglePassword(this, '#{{ $name }}')" title="{{ __('Toggle password visibility') }}" tabindex="-1">
                <i class="ti ti-eye"></i>
            </a>
        </span>
    @endif

    <x-components::forms.invalid-feedback :field="$id" />
</div>
