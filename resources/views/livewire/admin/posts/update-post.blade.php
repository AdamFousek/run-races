<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex flex-wrap justify-between items-center flex-col md:flex-row">
                <h2 class="p-4 text-2xl dark:text-gray-100">{{ __('Edit post') }} - {{ $post->title }}</h2>
            </div>
            <livewire:admin.posts.forms.update-post :post="$post" />
        </div>
    </div>
</div>