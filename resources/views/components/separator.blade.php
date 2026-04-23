@props([
    'class' => '',
])

<hr {{ $attributes->merge(['class' => "border-gray-200 dark:border-gray-700 $class"]) }} />
