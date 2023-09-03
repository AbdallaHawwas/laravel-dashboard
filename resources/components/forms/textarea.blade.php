@props(['title' => null, 'value' => '', 'id' => uniqid('textarea-')])

@php
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

<x-components::forms.invalid-feedback :field="$id" />
