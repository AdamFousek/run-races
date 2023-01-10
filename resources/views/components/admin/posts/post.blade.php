<tr class="bg-white border-b dark:border-gray-900 transition duration-300 ease-in-out hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700">
    <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-50">
        {{ $post->title }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap dark:text-gray-50">
        {{ __($post->user->name) }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap dark:text-gray-50">
        {{ $post->published_at?->format('j.n.Y H:i') ?? $post->created_at->format('j.n.Y H:i') }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap dark:text-gray-50">
        {{ $post->updated_at?->format('j.n.Y H:i') ?? $post->created_at->format('j.n.Y H:i') }}
    </td>
    @if($showDeleted)
        <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap dark:text-gray-50">
            {{ $post->deleted_at->format('j.n.Y H:i') }}
        </td>
    @endif
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap dark:text-gray-50">
        {{ $post->created_at->format('j.n.Y H:i') }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap text-right dark:text-gray-50">
        @if($post->deleted_at === null)
            @can('update', $post)
                <x-icon-link :href="route('admin.post.update', $post->id)" title="{{ __('Update post') }}" name="pencil" variant="outline" size="small" class="cursor-pointer hover:bg-amber-300 dark:hover:bg-amber-600 mr-1" />
            @endcan
            @can('delete', $post)
                <x-icon-link title="{{ __('Delete post') }}" name="trash" variant="outline" size="small" class="cursor-pointer hover:bg-red-400 dark:hover:bg-red-800" data-bs-toggle="modal" data-bs-target="#deletePost_{{ $post->id }}" />
            @endcan
        @else
            @can('restore', $post)
                <x-icon-link title="{{ __('Restore post') }}" name="arrow-uturn-left" variant="outline" size="small" class="cursor-pointer hover:bg-green-400 dark:hover:bg-green-800" wire:click="restore({{ $post->id }})" />
            @endcan
        @endif
    </td>
</tr>
