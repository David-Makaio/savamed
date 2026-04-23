@props([
    'href' => '#',
    'class' => '',
])

<a
    href="{{ $href }}"
    {{ $attributes->merge(['class' => "px-4 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 transition-colors $class"]) }}
>
    {{ $slot }}
</a>
