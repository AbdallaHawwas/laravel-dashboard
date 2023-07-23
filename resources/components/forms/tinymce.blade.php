@props(['name', 'title' => null, 'value' => '', 'options' => [], 'required' => false])
@php $id = uniqid('mce-'); @endphp

@if ($title)
    <label for="{{ $name }}" class="form-label">
        {{ $title }}

        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

<textarea name="{{ $name }}" id="{{ $id }}" {{ $attributes }}>{{ $value }}</textarea>

<x-components::forms.invalid-feedback :field="$id" />

@push('scripts')
    <script>
        initTinyMCE('#{{ $id }}', @json($options));
    </script>
@endpush
