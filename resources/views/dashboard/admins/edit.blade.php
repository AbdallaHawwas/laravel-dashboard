<x-layouts::dashboard>
    <form class="card" action="{{ route('admins.update', $admin) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-header">
            <div class="card-title">{{ __('Assign role to (:name)', ['name' => $admin->name]) }}</div>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <x-components::forms.select name="role" title="{{ __('Role') }}" :options="$roles" :selected="$admin->roles()->first()?->id"
                    required />
            </div>
        </div>

        <div class="card-footer text-end">
            <a href="{{ route('admins.index') }}" class="btn">{{ __('Cancel') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
        </div>
    </form>
</x-layouts::dashboard>
