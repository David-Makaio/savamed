@props([
    'class' => '',
])

<a {{ $attributes->merge(['class' => "text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 underline $class"]) }}>
    {{ $slot }}
</a>
