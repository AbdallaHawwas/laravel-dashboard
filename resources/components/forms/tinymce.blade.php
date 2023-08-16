@props(['name', 'title' => null, 'value' => '', 'options' => [], 'required' => false, 'id' => uniqid('tinymce-')])

<x-components::forms.textarea :name="$name" :title="$title" :value="$value" :required="$required" :id="$id" />

@push('scripts')
    <script>
        initTinyMCE('#{{ $id }}', @json($options));
    </script>
@endpush
