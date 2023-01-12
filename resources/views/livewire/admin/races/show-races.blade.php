<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex flex-wrap justify-between items-center flex-col md:flex-row">
                <h2 class="p-4 text-2xl dark:text-gray-100">{{ __('Races') }} ({{ $races->count() }})</h2>
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
                                {{ __('Race name') }}
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
                        @if($showDeleted)
                            <th scope="col" class="text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                                {{ __('Post deleted at') }}
                            </th>
                        @endif
                        <th scope="col" class="cursor-pointer text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                            <div class="flex flex-wrap items-center cursor-pointer" wire:click="changeOrderBy('race_date')">
                                {{ __('Race date') }}
                                @if($orderBy['field'] === 'race_date' && !$orderBy['desc'])
                                    <x-icon-wrapper size="small" variant="outline" name="chevron-down" />
                                @else
                                    <x-icon-wrapper size="small" variant="outline" name="chevron-up" />
                                @endif
                            </div>
                        </th>
                        <th scope="col" class="cursor-pointer text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                            <div class="flex flex-wrap items-center cursor-pointer" wire:click="changeOrderBy('created_at')">
                                {{ __('Race created at') }}
                                @if($orderBy['field'] === 'created_at' && !$orderBy['desc'])
                                    <x-icon-wrapper size="small" variant="outline" name="chevron-down" />
                                @else
                                    <x-icon-wrapper size="small" variant="outline" name="chevron-up" />
                                @endif
                            </div>
                        </th>
                        <th scope="col" class="text-sm text-gray-900 dark:text-gray-100 px-6 py-2">
                            <div class="flex flex-wrap justify-end items-center">
                                <span class="mr-4">{{ __('Actions') }}</span>
                                <x-icon-link :href="route('admin.races.create')" title="{{ __('Add race') }}" name="plus" variant="outline" class="cursor-pointer hover:bg-emerald-300 mr-1" />
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($races as $race)
                        <livewire:admin.races.components.race-item :race="$race" wire:key="race-{{ $race->id }}" :showDeleted="$showDeleted" />
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center">
                {{ $races->links() }}
            </div>
        </div>
    </div>
</div>
