@props(['name' => 'pencil', 'variant' => 'mini', 'size' => 'medium'])

@php
    $sizeClass = match($size) {
        'small' => 'w-5 h-5',
        'large' => 'w-7 h-7',
        default => '',
    }
@endphp

<a {{ $attributes->merge(['class' => 'p-1 inline-block rounded-lg border']) }}>
    <x-icon name="{{ $name }}" variant="{{ $variant }}" class="{{ $sizeClass }}"/>
</a>
