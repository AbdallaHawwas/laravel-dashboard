@props(['name', 'title' => null, 'value' => '', 'options' => [], 'required' => false])

@if ($title)
    <label for="{{ $name }}" class="form-label">
        {{ $title }}

        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

<textarea name="{{ $name }}" id="{{ $name }}" {{ $attributes }}>{{ $value }}</textarea>

<x-components::forms.invalid-feedback :field="$name" />

@push('scripts')
    <script>
        initTinyMCE('#{{ $name }}', @json($options));
    </script>
@endpush
