<form class="p-4" wire:submit.prevent="save">
    <div class="flex flex-wrap justify-between">
        <div class="flex-1 mb-2 mr-2">
            <x-input-label for="title" :value="__('Race name')" />
            <x-text-input wire:model.debounce.500ms="race.name"  id="title" name="title" type="text" class="mt-1 w-full" required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('race.name')" />
        </div>

        <div class="flex-1 mb-2">
            <x-input-label for="slug" :value="__('Race slug')" />
            <x-text-input wire:model.lazy="race.slug" id="slug" name="slug" type="text" class="mt-1 w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('race.slug')" />
        </div>
    </div>

    <div class="mb-2">
        <x-input-label for="published_at" :value="__('Race date')" />
        <x-text-input wire:model.lazy="date" id="race_date" name="race_date" type="datetime-local" class="mt-1" required />
        <x-input-error class="mt-2" :messages="$errors->get('post.race_dace')" />
    </div>

    <div class="mb-2">
        <x-input-label for="content" :value="__('Race description')" />
        <livewire:components.trix :value="$content"/>
        <x-input-error class="mt-2" :messages="$errors->get('post.content')" />
    </div>

    <div class="flex items-end justify-end mt-4">
        <x-primary-button class="ml-4">
            {{ __('Add race') }}
        </x-primary-button>
    </div>
</form>