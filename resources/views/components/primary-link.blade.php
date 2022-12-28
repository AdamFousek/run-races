@props(['color' => ''])

@php
    $classes = match($color) {
        'green' => 'text-emerald-500 hover:text-emerald-600',
        'red' => 'text-rose-500 hover:text-rose-600',
        'yellow' => 'text-gold-500 hover:text-gold-600',
        default => 'text-indigo-500 hover:text-indigo-600',
    }
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
