@props([
    'class' => '',
])

<p {{ $attributes->merge(['class' => "text-sm text-gray-600 dark:text-gray-400 $class"]) }}>
    {{ $slot }}
</p>
