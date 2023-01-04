<form class="p-4" wire:submit.prevent="save">
    <div class="flex flex-wrap justify-between">
        <div class="flex-1 mb-2 mr-2">
            <x-input-label for="title" :value="__('Post title')" />
            <x-text-input wire:model.debounce.500ms="post.title"  id="title" name="title" type="text" class="mt-1 w-full" required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('post.title')" />
        </div>

        <div class="flex-1 mb-2">
            <x-input-label for="slug" :value="__('Post slug')" />
            <x-text-input wire:model.lazy="post.slug" id="slug" name="slug" type="text" class="mt-1 w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('post.slug')" />
        </div>
    </div>

    <div class="mb-2">
        <x-input-label for="perex" :value="__('Post perex')" />
        <x-text-input wire:model.lazy="post.perex" id="perex" name="perex" type="text" class="mt-1 block w-full" />
        <x-input-error class="mt-2" :messages="$errors->get('post.perex')" />
    </div>

    <div class="mb-2">
        <x-input-label for="content" :value="__('Post content')" />
        <livewire:components.trix :value="$content"/>
        <x-input-error class="mt-2" :messages="$errors->get('post.content')" />
    </div>

    <div class="mb-2">
        <x-input-label for="published_at" :value="__('Post publish at')" />
        <x-text-input wire:model.lazy="date" id="published_at" name="published_at" type="datetime-local" class="mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('post.published_at')" />
    </div>

    <div class="flex items-end justify-end mt-4">
        <x-primary-button class="ml-4">
            {{ __('Add post') }}
        </x-primary-button>
    </div>
</form>