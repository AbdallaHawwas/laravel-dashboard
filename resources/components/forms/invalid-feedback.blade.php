@props(['name'])

@error($name)
    <div class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('[name="{{ $name }}"]').addClass('is-invalid');
            })
        </script>
    @endpush
@enderror
