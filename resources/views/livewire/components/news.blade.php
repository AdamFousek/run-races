<div class="overflow-hidden shadow-sm sm:rounded-lg">
    @foreach($news as $new)
        <article class="mb-4">
            <div class="max-w-4xl px-10 py-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <div class="flex justify-end items-center">
                    <span class="font-light text-gray-600">{{ $new->published_at->diffForHumans() }} {{-- $new->published_at->isoFormat('dddd D. MMMM Y') --}}</span>
                </div>
                <div class="mt-2">
                    <x-primary-link :href="route('article.detail', $new)" class="text-2xl text-gray-700 font-bold hover:underline">{{ $new->title }}</x-primary-link>
                    <p class="mt-2 text-gray-600">{{ $new->perex ?: Str::limit($new->content->toPlainText(), 300) }}</p>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <div class="text-gray-500 text-sm">{{ __('Comments') }} {{ $new->comments()->published()->count() }}</div>
                    <x-primary-link :href="route('article.detail', $new)">
                        {{ __('Show post') }}
                    </x-primary-link>
                </div>
            </div>
        </article>
    @endforeach

    <div>
        {{ $news->links() }}
    </div>
</div>
