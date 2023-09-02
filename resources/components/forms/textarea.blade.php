@props(['title' => null, 'value' => '', 'required' => false, 'id' => uniqid('textarea-')])

@if ($title)
    <label for="{{ $id }}" class="form-label">
        {{ $title }}

        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

<textarea id="{{ $id }}" {{ $attributes->merge(['class' => 'form-control']) }}
    @if ($required) required @endif>{{ $value ?: $slot }}</textarea>

<x-components::forms.invalid-feedback :field="$id" />
