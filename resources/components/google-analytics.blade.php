@push('scripts')
    @if (setting('google_analytics_property_id'))
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('google_analytics_property_id') }}"></script>

        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());
            gtag('config', '{{ setting('google_analytics_property_id') }}');
        </script>
    @endif
@endpush
