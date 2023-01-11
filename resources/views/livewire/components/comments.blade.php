<section class="bg-white dark:bg-gray-900 px-6 py-3 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-2 md:mb-6">
        <h2 class="text-lg lg:text-lg font-bold text-gray-900 dark:text-white">{{ __('Comments') }} ({{ $comments->count() }})</h2>
    </div>
    @auth
        <livewire:forms.comments.create-comment :post="$post" />
    @else
        <p class="text-center my-2"><x-primary-link :href="route('login')">{{ __('To add new comment, you have to login first') }}</x-primary-link></p>
    @endauth
    @if (!$comments->isEmpty())
        <x-part.comments :comments="$comments"></x-part.comments>
    @endif
</section>