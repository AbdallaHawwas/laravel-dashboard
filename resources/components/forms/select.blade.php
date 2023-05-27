@props(['name', 'title' => null, 'options' => [], 'selected' => null, 'required' => false, 'tom' => []])

@if ($title)
    <label for="{{ $name }}" class="form-label">
        {{ $title }}

        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

<select type="text" name="{{ $name }}" id="{{ $name }}" class="form-select"
    {{ $attributes->merge(['required' => $required]) }}>

    @foreach ($options as $key => $value)
        <option value="{{ $key }}" @selected($key == $selected)>{{ $value }}</option>
    @endforeach
</select>

<x-components::forms.invalid-feedback :field="$name" />

@if ($tom !== false)
    @push('scripts')
        <script>
            new TomSelect('#{{ $name }}', {
                create: false,
                placeholder: '-- {{ __('Select') }} --',
                ...@json($tom)
            });
        </script>
    @endpush
@endif
