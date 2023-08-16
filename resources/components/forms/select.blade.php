@props(['name', 'title' => null, 'options' => [], 'selected' => null, 'required' => false, 'tom' => [], 'id' => uniqid('select-')])

@if ($title)
    <label for="{{ $name }}" class="form-label">
        {{ $title }}

        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

<select type="text" name="{{ $name }}" id="{{ $id }}" class="form-select"
    {{ $attributes->merge(['required' => $required]) }}>

    @foreach ($options as $key => $value)
        <option value="{{ $key }}" @selected($key == $selected)>{{ $value }}</option>
    @endforeach

    {{ $slot }}
</select>

<x-components::forms.invalid-feedback :field="$id" />

@if ($tom !== false)
    @push('scripts')
        <script>
            new TomSelect('#{{ $id }}', {
                create: false,
                placeholder: '-- {{ __('Select') }} --',
                ...@json($tom)
            });
        </script>
    @endpush
@endif
