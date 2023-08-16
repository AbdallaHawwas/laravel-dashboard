@props(['name', 'title' => null, 'value' => '', 'required' => false, 'id' => uniqid('textarea-')])

@if ($title)
    <label for="{{ $name }}" class="form-label">
        {{ $title }}

        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

<textarea class="form-control" name="{{ $name }}" id="{{ $id }}" {{ $attributes }}>{{ $value ?: $slot }}</textarea>

<x-components::forms.invalid-feedback :field="$id" />
