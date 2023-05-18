@props(['name', 'title', 'value' => '', 'options' => [], 'required' => false])

<label for="{{ $name }}" class="form-label">
    {{ $title }}

    @if ($required)
        <span class="text-danger">*</span>
    @endif
</label>

<textarea name="{{ $name }}" id="{{ $name }}" {{ $attributes }}>{{ $value }}</textarea>

<x-components::forms.invalid-feedback :field="$name" />

@push('scripts')
    <script>
        initTinyMCE('#{{ $name }}', @json($options));
    </script>
@endpush
