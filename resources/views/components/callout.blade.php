@props([
    'variant' => 'default',
    'icon' => null,
    'heading' => '',
    'class' => '',
])

@php
    $variantClasses = match($variant) {
        'danger' => 'bg-red-50 border-red-200 text-red-800 dark:bg-red-900/20 dark:border-red-800 dark:text-red-200',
        'success' => 'bg-green-50 border-green-200 text-green-800 dark:bg-green-900/20 dark:border-green-800 dark:text-green-200',
        'warning' => 'bg-yellow-50 border-yellow-200 text-yellow-800 dark:bg-yellow-900/20 dark:border-yellow-800 dark:text-yellow-200',
        'info' => 'bg-blue-50 border-blue-200 text-blue-800 dark:bg-blue-900/20 dark:border-blue-800 dark:text-blue-200',
        default => 'bg-gray-50 border-gray-200 text-gray-800 dark:bg-gray-900/20 dark:border-gray-800 dark:text-gray-200',
    };
@endphp

<div {{ $attributes->merge(['class' => "flex gap-4 p-4 border rounded-lg $variantClasses $class"]) }}>
    @if($icon)
        <div class="flex-shrink-0">
            <x-icon :name="$icon" class="w-5 h-5" />
        </div>
    @endif

    <div class="flex-1">
        @if($heading)
            <p class="font-semibold mb-1">{{ $heading }}</p>
        @endif
        <p class="text-sm">{{ $slot }}</p>
    </div>
</div>
