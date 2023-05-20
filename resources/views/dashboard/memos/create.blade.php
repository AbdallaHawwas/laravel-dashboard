<x-layouts::dashboard>
    <form class="card" action="{{ route('memos.store') }}" method="POST">
        @csrf

        <div class="card-header">
            <p class="card-title">{{ __('Create Memo') }}</p>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <x-components::forms.input name="title" :title="__('Title')" :value="old('title')" required />
            </div>

            <div class="mb-3">
                <x-components::forms.tinymce name="content" :title="__('Content')" :value="old('content')" required />
            </div>
        </div>

        <div class="card-footer text-end">
            <a href="{{ route('memos.index') }}" class="btn">{{ __('Cancel') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
        </div>
    </form>
</x-layouts::dashboard>
