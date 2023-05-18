@props(['name', 'title' => null, 'options' => [], 'selected' => null, 'required' => false])

@if ($title)
    <label for="{{ $name }}" class="form-label">
        {{ $title }}

        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

<select name="{{ $name }}" id="{{ $name }}" class="form-select"
    {{ $attributes->merge(['required' => $required]) }}>

    <option value=""> -- {{ __('Select') }} -- </option>

    @foreach ($options as $key => $value)
        <option value="{{ $key }}" @selected($key == $selected)>{{ $value }}</option>
    @endforeach
</select>

<x-components::forms.invalid-feedback :field="$name" />
