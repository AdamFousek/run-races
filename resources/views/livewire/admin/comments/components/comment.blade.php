<tr class="bg-white border-b dark:border-gray-900 transition duration-300 ease-in-out hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700">
    <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-50">
        {{ $comment->user->name }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap dark:text-gray-50">
        {{ __($comment->status) }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap dark:text-gray-50">
        {{ $comment->content }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap dark:text-gray-50">
        {{ $comment->created_at?->format('j.n.Y H:i') }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap dark:text-gray-50">
        {{ $comment->updated_at?->format('j.n.Y H:i') ?? $comment->created_at->format('j.n.Y H:i') }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap text-right dark:text-gray-50">
        @if($comment->deleted_at === null)
            @if($comment->status === \App\Models\Comment::STATUS_DRAFT)
                <x-icon-link title="{{ __('Publish comment') }}"
                             name="check-circle"
                             variant="outline"
                             size="small"
                             class="cursor-pointer hover:bg-emerald-400 dark:hover:bg-emerald-800"
                             wire:click="toggleStatus({{ true }})" />
            @else
                <x-icon-link title="{{ __('Redraw comment') }}"
                             name="x-circle"
                             variant="outline"
                             size="small"
                             class="cursor-pointer hover:bg-red-400 dark:hover:bg-red-800"
                             wire:click="toggleStatus({{ false }})" />
            @endif
            @can('delete', $comment)
                <x-icon-link title="{{ __('Delete comment') }}"
                             name="trash"
                             variant="outline"
                             size="small"
                             class="cursor-pointer hover:bg-red-400 dark:hover:bg-red-800"
                             data-bs-toggle="modal"
                             data-bs-target="#deleteComment_{{ $comment->id }}" />
            @endcan
        @else
            @can('restore', $comment)
                <x-icon-link title="{{ __('Restore comment') }}"
                             name="arrow-uturn-left"
                             variant="outline"
                             size="small"
                             class="cursor-pointer hover:bg-green-400 dark:hover:bg-green-800"
                             wire:click="restore({{ $comment->id }})" />
            @endcan
        @endif
    </td>
</tr>
