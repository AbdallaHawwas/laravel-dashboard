<x-layouts::dashboard>
    <form class="card" action="{{ route('memos.update', $memo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-header">
            <p class="card-title">{{ __('Edit (:title)', ['title' => $memo->title]) }}</p>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <x-components::forms.input name="title" :title="__('Title')" :value="$memo->title" />
            </div>

            <div class="mb-3">
                <x-components::forms.tinymce name="content" :title="__('Content')" :value="$memo->content" />
            </div>
        </div>

        <div class="card-footer text-end">
            <a href="{{ route('memos.index') }}" class="btn">{{ __('Cancel') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
        </div>
    </form>
</x-layouts::dashboard>
