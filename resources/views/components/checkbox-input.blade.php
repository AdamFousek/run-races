<label for="allMembers" class="inline-flex items-center mr-2 ">
    <input wire:model.lazy="showDeleted" id="showDeleted" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    <span class="ml-2 text-sm text-gray-600">{{ __('Show Deleted') }}</span>
</label>