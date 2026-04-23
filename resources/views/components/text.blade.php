@props([
    'variant' => 'default',
    'class' => '',
])

@php
    $variantClasses = match($variant) {
        'subtle' => 'text-gray-500 dark:text-gray-400',
        default => 'text-gray-900 dark:text-white',
    };
@endphp

<p {{ $attributes->merge(['class' => "text-sm $variantClasses $class"]) }}>
    {{ $slot }}
</p>
