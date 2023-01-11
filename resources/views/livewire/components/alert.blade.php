<div>
    @if($message !== '' && $type !== '')
        <div wire:poll.5s="resetMessage">
            @php
                $classes = match($type) {
                    'success' => 'text-white px-6 py-4 border-0 rounded relative bg-emerald-500',
                    'error' => 'text-white px-6 py-4 border-0 rounded relative bg-red-500',
                    'warning' => 'text-white px-6 py-4 border-0 rounded relative bg-amber-500',
                    default => 'text-white px-6 py-4 border-0 rounded relative bg-cyan-500',
                }
            @endphp
            <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8" data-alert="{{ $type }}">
                <div class="{{ $classes }}">
                    <span class="inline-block align-middle mr-8">
                        {{ $message }}
                    </span>
                    <button wire:click="resetMessage" id="alertClose" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                        <span>×</span>
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
