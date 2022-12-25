@props(['name' => 'pencil', 'variant' => 'mini', 'size' => 'medium'])

@php
    $sizeClass = match($size) {
        'small' => 'w-5 h-5',
        'large' => 'w-7 h-7',
        default => '',
    }
@endphp

<div {{ $attributes->merge(['class' => 'p-1']) }}>
    <x-icon name="{{ $name }}" variant="{{ $variant }}" class="{{ $sizeClass }}"/>
</div>
