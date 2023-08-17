<x-layouts::dashboard :title="__('Settings')">
    <x-components::status />

    <form class="card" action="{{ route('dashboard.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-header">
            <div class="card-title">{{ __('Website settings') }}</div>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <x-components::forms.input name="app_name" :title="__('App name')" value="{{ setting('app_name') }}"
                    required />
            </div>
        </div>

        <div class="card-footer text-end">
            <button type="reset" class="btn">{{ __('Reset') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
        </div>
    </form>
</x-layouts::dashboard>
