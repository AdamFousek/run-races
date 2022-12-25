<tr class="bg-white border-b dark:border-gray-900 transition duration-300 ease-in-out hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700">
    <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-50">
        {{ $user->name }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap dark:text-gray-50">
        {{ $user->email }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap dark:text-gray-50">
        {{ __($user->role->name) }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap dark:text-gray-50">
        {{ $user->is_active }}
    </td>
    @if($showDeleted)
        <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap dark:text-gray-50">
            {{ $user->deleted_at->format('j.n.Y H:i') }}
        </td>
    @endif
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap dark:text-gray-50">
        {{ $user->created_at->format('j.n.Y H:i') }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap text-right dark:text-gray-50">
        @if(Auth::user()->isAdmin())
            <x-icon-link title="{{ __('Update user') }}" name="pencil" variant="outline" size="small" class="cursor-pointer hover:bg-amber-300 dark:hover:bg-amber-600 mr-1" />
        @endif
        @if(Auth::user()->isAdmin())
            <x-icon-link title="{{ __('Delete user') }}" name="trash" variant="outline" size="small" class="cursor-pointer hover:bg-red-400 dark:hover:bg-red-800" data-bs-toggle="modal" data-bs-target="#deleteUser_{{ $user->id }}" />
        @endif
    </td>
</tr>
