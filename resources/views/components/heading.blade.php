@props([
    'size' => 'lg',
    'level' => '1',
    'class' => '',
])

@php
    $sizeClasses = match($size) {
        'lg' => 'text-2xl',
        'md' => 'text-xl',
        'sm' => 'text-lg',
        default => 'text-2xl',
    };
    
    $tag = "h$level";
@endphp

<{{ $tag }} {{ $attributes->merge(['class' => "$sizeClasses font-bold text-gray-900 dark:text-white $class"]) }}>
    {{ $slot }}
</{{ $tag }}>
