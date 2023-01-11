<form wire:submit.prevent="save" class="mb-2 md:mb-6">
    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <label for="comment" class="sr-only">{{ __('Your comment') }}</label>
        <textarea wire:model.debounce="content"
                  id="comment" rows="2"
                  class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800 whitespace-pre-wrap"
                  placeholder="{{ __('Write a comment...') }}" required></textarea>
        <x-input-error class="mt-2" :messages="$errors->get('content')" />
    </div>
    <div class="flex flex-wrap justify-end">
        <x-primary-button>
            {{ __('Add comment') }}
        </x-primary-button>
    </div>
</form>
