<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
    <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
        <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLongLabel">
            {{ __('Edit comment') }}
        </h5>
        <button type="button"
                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <label for="comment" class="sr-only">{{ __('Your comment') }}</label>
            <textarea wire:model="content"
                      id="comment" rows="2"
                      class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                      required>
                {!! $comment->content !!}
            </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('comment.content')" />
        </div>
    </div>
    <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
        <x-primary-button data-bs-dismiss="modal" color="blue" type="''">
            {{ __('Close') }}
        </x-primary-button>
        <x-primary-button wire:click="update" data-bs-dismiss="modal">
            {{ __('Update') }}
        </x-primary-button>
    </div>
</div>
