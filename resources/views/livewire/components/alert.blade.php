<div>
    @if($message !== '' && $type !== '')
    <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8" data-alert="{{ $type }}">
        @if($type === 'success')
            <div class="text-white px-6 py-4 border-0 rounded relative bg-emerald-500">
                <span class="inline-block align-middle mr-8">
                    {{ $message }}
                </span>
        @elseif($type === 'error')
            <div class="text-white px-6 py-4 border-0 rounded relative bg-red-500">
                <span class="inline-block align-middle mr-8">
                    {{ $message }}
                </span>
        @elseif($type === 'warning')
            <div class="text-white px-6 py-4 border-0 rounded relative bg-amber-500">
                <span class="inline-block align-middle mr-8">
                    {{ $message }}
                </span>
        @elseif($type === 'info')
            <div class="text-white px-6 py-4 border-0 rounded relative bg-cyan-500">
                <span class="inline-block align-middle mr-8">
                    {{ $message }}
                </span>
        @endif
                <button wire:click="resetMessage" data-alert-close="info" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                    <span>×</span>
                </button>
            </div>
    </div>
    @endif
</div>
