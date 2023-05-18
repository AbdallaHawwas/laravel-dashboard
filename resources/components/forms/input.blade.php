@props(['name', 'title' => null, 'type' => 'text', 'required' => false])

@if ($title)
    <label for="{{ $name }}" class="form-label">
        {{ $title }}

        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

<input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control"
    {{ $attributes->merge(['required' => $required]) }}>

<x-components::forms.invalid-feedback :field="$name" />
