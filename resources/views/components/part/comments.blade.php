@props(['comments'])

@foreach($comments as $comment)
    <article class="p-2 md:p-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
        <footer class="flex justify-between items-center mb-2">
            <div class="flex items-center">
                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                    {{ $comment->user->name }}
                </p>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    <time datetime="{{ $comment->created_at->format('j. n. Y H:i') }}" title="{{ $comment->created_at->format('j. n. Y H:i') }}">
                        {{ $comment->created_at->format('j. n. Y H:i') }}
                    </time>
                </p>
            </div>
            @canany(['update', 'delete', 'report'], $comment)
            <button id="dropdownComment{{ $comment->id }}Button" data-dropdown-toggle="dropdownComment{{ $comment->id }}"
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    type="button">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                    </path>
                </svg>
                <span class="sr-only">Comment settings</span>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownComment{{ $comment->id }}"
                 class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownMenuIconHorizontalButton">
                    @can('update', $comment)
                        <li>
                            <a href="#"
                               class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                               data-bs-toggle="modal" data-bs-target="#updateComment_{{ $comment->id }}">
                                {{ __('Edit') }}
                            </a>
                        </li>
                    @endcan
                    @can('delete', $comment)
                        <li>
                            <a href="#"
                               class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                               data-bs-toggle="modal" data-bs-target="#deleteComment_{{ $comment->id }}">
                                {{ __('Remove') }}
                            </a>
                        </li>
                    @endcan
                    @can('report', $comment)
                        <li>
                            <a href="#"
                               class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                        </li>
                    @endcan
                </ul>
            </div>
            @endcanany
        </footer>
        <p class="text-gray-800 dark:text-gray-300">
            <pre class="font-sans">{!! $comment->content !!}</pre>
        </p>
    </article>
    @canany(['update', 'delete', 'report'], $comment)
        @can('update', $comment)
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                 id="updateComment_{{ $comment->id }}" tabindex="-1" aria-labelledby="updateComment_{{ $comment->id }}" aria-hidden="true">
                <div class="modal-dialog relative w-full h-full max-w-4xl md:h-auto pointer-events-none">
                    <livewire:forms.comments.update-comment :comment="$comment" />
                </div>
            </div>
        @endcan
        @can('delete', $comment)
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                 id="deleteComment_{{ $comment->id }}" tabindex="-1" aria-labelledby="deleteComment_{{ $comment->id }}" aria-hidden="true">
                <div class="modal-dialog relative w-auto pointer-events-none">
                    <livewire:forms.comments.delete-comment :comment="$comment" />
                </div>
            </div>
        @endcan
        @can('report', $comment)
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                 id="reportComment_{{ $comment->id }}" tabindex="-1" aria-labelledby="reportComment_{{ $comment->id }}" aria-hidden="true">
                <div class="modal-dialog relative w-auto pointer-events-none">
                    <livewire:forms.comments.report-comment :comment="$comment" />
                </div>
            </div>
        @endcan
    @endcanany
@endforeach