@props(['title' => null, 'options' => [], 'selected' => null, 'tom' => true, 'id' => uniqid('select-')])

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

<select id="{{ $id }}" {{ $attributes->merge(['class' => 'form-select']) }}>

    @foreach ($options as $key => $value)
        <option value="{{ $key }}" @selected($key == $selected)>{{ $value }}</option>
    @endforeach

    {{ $slot }}
</select>

@if ($name)
    <x-components::forms.invalid-feedback :name="$name" />
@endif

@if ($tom)
    @push('scripts')
        <script>
            (() => {
                const instance = new TomSelect('#{{ $id }}', {
                    create: false,
                    placeholder: '-- {{ __('Select') }} --',
                });

                $('#{{ $id }}').data('tom', instance);
            })();
        </script>
    @endpush
@endif
