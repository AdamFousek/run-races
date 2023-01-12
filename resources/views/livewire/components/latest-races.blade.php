<div class="px-10 py-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
    <h2 class="text-2xl border-b mb-2">Latest races</h2>
    <ul>
        @foreach($races as $race)
            <li><x-primary-link :href="route('race.detail', $race)">{{ $race->name }}</x-primary-link></li>
        @endforeach
    </ul>
</div>
