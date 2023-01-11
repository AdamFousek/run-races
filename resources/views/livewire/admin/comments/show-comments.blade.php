<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex flex-wrap justify-between items-center flex-col md:flex-row">
                <h2 class="p-4 text-2xl dark:text-gray-100">{{ __('Comments') }} - {{ $post->title }}</h2>
            </div>
            <div class="py-4 overflow-y-auto">
                <table class="min-w-full">
                    <thead class="border-b bg-white dark:bg-gray-800 dark:border-gray-900">
                    <tr class="text-left font-bold">
                        <th scope="col" class="text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                            {{ __('Author') }}
                        </th>
                        <th scope="col" class="cursor-pointer text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                            {{ __('Status') }}
                        </th>
                        <th scope="col" class="cursor-pointer text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                            {{ __('Content') }}
                        </th>
                        <th scope="col" class="cursor-pointer text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                            {{ __('Created at') }}
                        </th>
                        <th scope="col" class="cursor-pointer text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                            {{ __('Updated at') }}
                        </th>
                        <th scope="col" class="text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <livewire:admin.comments.components.comment-row :comment="$comment" wire:key="comment-{{ $comment->id }}" />
                        @can('delete', $comment)
                            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                 id="deleteComment_{{ $comment->id }}" tabindex="-1" aria-labelledby="deleteComment_{{ $comment->id }}" aria-hidden="true">
                                <div class="modal-dialog relative w-auto pointer-events-none">
                                    <livewire:admin.comments.forms.delete-comment :comment="$comment" wire:key="comment-{{ $comment->id }}" />
                                </div>
                            </div>
                        @endcan
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
