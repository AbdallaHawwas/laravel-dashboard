@props(['title' => null, 'options' => [], 'selected' => null, 'required' => false, 'tom' => [], 'id' => uniqid('select-')])

@if ($title)
    <label for="{{ $id }}" class="form-label">
        {{ $title }}

        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

<select id="{{ $id }}" {{ $attributes->merge(['class' => 'form-select']) }}
    @if ($required) required @endif>

    @foreach ($options as $key => $value)
        <option value="{{ $key }}" @selected($key == $selected)>{{ $value }}</option>
    @endforeach

    {{ $slot }}
</select>

<x-components::forms.invalid-feedback :field="$id" />

@if ($tom !== false)
    @push('scripts')
        <script>
            (() => {
                const instance = new TomSelect('#{{ $id }}', {
                    create: false,
                    placeholder: '-- {{ __('Select') }} --',
                    ...@json($tom)
                });

                $('#{{ $id }}').data('tom', instance);
            })();
        </script>
    @endpush
@endif
