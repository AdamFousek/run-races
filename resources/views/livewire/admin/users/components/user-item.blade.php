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
            {{ $user->deleted_at?->format('j.n.Y H:i') }}
        </td>
    @endif
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap dark:text-gray-50">
        {{ $user->created_at->format('j.n.Y H:i') }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap text-right dark:text-gray-50">
        @if(!$user->deleted_at)
        @if(Auth::user()->isAdmin())
            <x-icon-link title="{{ __('Update user') }}" name="pencil" variant="outline" size="small" class="cursor-pointer hover:bg-amber-300 dark:hover:bg-amber-600 mr-1" />
        @endif
        @if(Auth::user()->id !== $user->id && Auth::user()->isAdmin())
            <x-icon-link title="{{ __('Delete user') }}" name="trash" variant="outline" size="small" class="cursor-pointer hover:bg-red-400 dark:hover:bg-red-800" data-bs-toggle="modal" data-bs-target="#deleteUser_{{ $user->id }}" />
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                 id="deleteUser_{{ $user->id }}" tabindex="-1" aria-labelledby="deleteUser_{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog relative w-auto pointer-events-none">
                    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                        <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                            <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLongLabel">
                                {{ __('Are you sure, you want delete this user?') }}
                            </h5>
                            <button type="button"
                                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                            <x-primary-button type="'button'" data-bs-dismiss="modal" color="primary-outline" type="''">
                                {{ __('Close') }}
                            </x-primary-button>
                            <x-primary-button wire:click="delete" data-bs-dismiss="modal" color="red">
                                {{ __('Delete') }}
                            </x-primary-button>
                        </div>
                    </div>

                </div>
            </div>
        @endif
        @else
            @can('restore', $user)
                <x-icon-link title="{{ __('Restore user') }}" name="arrow-uturn-left" variant="outline" size="small" class="cursor-pointer hover:bg-green-400 dark:hover:bg-green-800" wire:click="restore" />
            @endcan
        @endif
    </td>
</tr>
