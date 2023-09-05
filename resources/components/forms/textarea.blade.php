@props(['title' => null, 'value' => '', 'id' => uniqid('textarea-')])

@php
    $name = $attributes->get('name') ?? false;
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

<textarea id="{{ $id }}" {{ $attributes->merge(['class' => 'form-control']) }}>{{ $value ?: $slot }}</textarea>

@if ($name)
    <x-components::forms.invalid-feedback :name="$name" />
@endif
