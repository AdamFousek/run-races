<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="w-full grid grid-cols-1 items-start md:grid-cols-4 gap-4 mb-4">
            <div class="col-start-1 md:col-start-1 md:col-end-4">
                <div class="px-6 py-3 bg-white dark:bg-gray-800 rounded-lg shadow-md mb-4">
                    <div class="flex flex-wrap justify-between items-center mb-2">
                        <h1 class="text-3xl">{{ $race->name }}</h1>
                        <p class="text-sm">{{ $race->race_date->format('j. n. Y H:i') }}</p>
                    </div>
                    {!! $race->description !!}
                </div>
            </div>
            <div class="text-gray-900 dark:text-gray-100">
                <livewire:components.latest-races />
            </div>
        </div>
    </div>
</div>