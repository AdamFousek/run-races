<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex flex-wrap justify-between items-center flex-col md:flex-row">
                <h2 class="p-4 text-2xl dark:text-gray-100">{{ __('Users') }}</h2>
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
                                <div class="flex flex-wrap items-center cursor-pointer" wire:click="changeOrderBy('name')">
                                    {{ __('Name') }}
                                    @if($orderBy['field'] === 'name' && !$orderBy['desc'])
                                    <x-icon-wrapper size="small" variant="outline" name="chevron-down" />
                                    @else
                                    <x-icon-wrapper size="small" variant="outline" name="chevron-up" />
                                    @endif
                                </div>
                            </th>
                            <th scope="col" class="cursor-pointer text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                                <div class="flex flex-wrap items-center cursor-pointer" wire:click="changeOrderBy('email')">
                                    {{ __('Email') }}
                                    @if($orderBy['field'] === 'email' && !$orderBy['desc'])
                                        <x-icon-wrapper size="small" variant="outline" name="chevron-down" />
                                    @else
                                        <x-icon-wrapper size="small" variant="outline" name="chevron-up" />
                                    @endif
                                </div>
                            </th>
                            <th scope="col" class="text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                                {{ __('Role') }}
                            </th>
                            <th scope="col" class="cursor-pointer text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                                <div class="flex flex-wrap items-center cursor-pointer" wire:click="changeOrderBy('is_active')">
                                    {{ __('Is active') }}
                                    @if($orderBy['field'] === 'is_active' && !$orderBy['desc'])
                                        <x-icon-wrapper size="small" variant="outline" name="chevron-down" />
                                    @else
                                        <x-icon-wrapper size="small" variant="outline" name="chevron-up" />
                                    @endif
                                </div>
                            </th>
                            @if($showDeleted)
                                <th scope="col" class="text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                                    {{ __('Account deleted at') }}
                                </th>
                            @endif
                            <th scope="col" class="cursor-pointer text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                                <div class="flex flex-wrap items-center cursor-pointer" wire:click="changeOrderBy('created_at')">
                                    {{ __('Account created at') }}
                                    @if($orderBy['field'] === 'created_at' && !$orderBy['desc'])
                                        <x-icon-wrapper size="small" variant="outline" name="chevron-down" />
                                    @else
                                        <x-icon-wrapper size="small" variant="outline" name="chevron-up" />
                                    @endif
                                </div>
                            </th>
                            <th scope="col" class="text-sm text-gray-900 dark:text-gray-100 px-6 py-2 text-right">
                                {{ __('Actions') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <x-admin.users.user :user="$user" wire:key="user-{{ $user->id }}" :showDeleted="$showDeleted" />
                        @if(Auth::user()->isAdmin())
                            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                 id="deleteUser_{{ $user->id }}" tabindex="-1" aria-labelledby="deleteUser_{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog relative w-auto pointer-events-none">
                                    <livewire:admin.users.forms.delete-user :user="$user" wire:key="user-{{ $user->id }}" />
                                </div>
                            </div>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center">
                {{ $users->onEachSide(4)->links() }}
            </div>
        </div>
    </div>
</div>