@props([
    'variant' => 'filled',
    'type' => 'button',
    'disabled' => false,
    'icon' => null,
    'class' => '',
])

@php
    $baseClasses = 'inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2';
    
    $variantClasses = match($variant) {
        'primary' => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
        'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
        'filled' => 'bg-gray-200 text-gray-900 hover:bg-gray-300 focus:ring-gray-500 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600',
        'outline' => 'border border-gray-300 text-gray-900 hover:bg-gray-100 focus:ring-gray-500 dark:border-gray-600 dark:text-white dark:hover:bg-gray-700',
        default => 'bg-gray-100 text-gray-900 hover:bg-gray-200 focus:ring-gray-500 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700',
    };
    
    $disabledClasses = $disabled ? 'opacity-50 cursor-not-allowed' : '';
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => "$baseClasses $variantClasses $disabledClasses $class"]) }}
    @disabled($disabled)
>
    @if($icon)
        <x-icon :name="$icon" class="w-4 h-4" />
    @endif
    {{ $slot }}
</button>
