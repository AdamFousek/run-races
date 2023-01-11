<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="flex flex-wrap justify-between items-center flex-col md:flex-row">
        <h2 class="p-4 text-2xl dark:text-gray-100">{{ __('Posts') }}</h2>
        <div class="flex flex-wrap p-2">
            <label for="allMembers" class="inline-flex items-center mr-2 ">
                <input wire:model.lazy="showDeleted" id="showDeleted" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <span class="ml-2 text-sm text-gray-600">{{ __('Show Deleted') }}</span>
            </label>
            <x-text-input wire:model.debounc.500ms="search" id="search" name="search" placeholder="{{ __('Search') }}" type="text" class="p-1 mr-2 text-sm"></x-text-input>
        </div>
    </div>
    <div class="py-4 overflow-y-auto">
        <table class="min-w-full">
            <thead class="border-b bg-white dark:bg-gray-800 dark:border-gray-900">
            <tr class="text-left font-bold">
                <th scope="col" class="text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                    <div class="flex flex-wrap items-center cursor-pointer" wire:click="changeOrderBy('title')">
                        {{ __('Title') }}
                        @if($orderBy['field'] === 'title' && !$orderBy['desc'])
                            <x-icon-wrapper size="small" variant="outline" name="chevron-down" />
                        @else
                            <x-icon-wrapper size="small" variant="outline" name="chevron-up" />
                        @endif
                    </div>
                </th>
                <th scope="col" class="cursor-pointer text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                    {{ __('Author') }}
                </th>
                <th scope="col" class="cursor-pointer text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                    <div class="flex flex-wrap items-center cursor-pointer" wire:click="changeOrderBy('published_at')">
                        {{ __('Published at') }}
                        @if($orderBy['field'] === 'published_at' && !$orderBy['desc'])
                            <x-icon-wrapper size="small" variant="outline" name="chevron-down" />
                        @else
                            <x-icon-wrapper size="small" variant="outline" name="chevron-up" />
                        @endif
                    </div>
                </th>
                <th scope="col" class="cursor-pointer text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                    <div class="flex flex-wrap items-center cursor-pointer" wire:click="changeOrderBy('updated_at')">
                        {{ __('Post updated at') }}
                        @if($orderBy['field'] === 'updated_at' && !$orderBy['desc'])
                            <x-icon-wrapper size="small" variant="outline" name="chevron-down" />
                        @else
                            <x-icon-wrapper size="small" variant="outline" name="chevron-up" />
                        @endif
                    </div>
                </th>
                @if($showDeleted)
                    <th scope="col" class="text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                        {{ __('Post deleted at') }}
                    </th>
                @endif
                <th scope="col" class="cursor-pointer text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                    <div class="flex flex-wrap items-center cursor-pointer" wire:click="changeOrderBy('created_at')">
                        {{ __('Post created at') }}
                        @if($orderBy['field'] === 'created_at' && !$orderBy['desc'])
                            <x-icon-wrapper size="small" variant="outline" name="chevron-down" />
                        @else
                            <x-icon-wrapper size="small" variant="outline" name="chevron-up" />
                        @endif
                    </div>
                </th>
                <th scope="col" class="text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                    {{ __('Comments') }}
                </th>
                <th scope="col" class="text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                    <div class="flex flex-wrap justify-end items-center">
                        <span class="mr-4">{{ __('Actions') }}</span>
                        <x-icon-link :href="route('admin.post.create')" title="{{ __('Add post') }}" name="plus" variant="outline" class="cursor-pointer hover:bg-emerald-300 mr-1" />
                    </div>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <x-admin.posts.post :post="$post" wire:key="post-{{ $post->id }}" :showDeleted="$showDeleted" />
                @can('delete', $post)
                    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                         id="deletePost_{{ $post->id }}" tabindex="-1" aria-labelledby="deletePost_{{ $post->id }}" aria-hidden="true">
                        <div class="modal-dialog relative w-auto pointer-events-none">
                            <livewire:admin.posts.forms.delete-post :post="$post" wire:key="post-{{ $post->id }}" />
                        </div>
                    </div>
                @endcan
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-center">
        {{ $posts->links() }}
    </div>
</div>