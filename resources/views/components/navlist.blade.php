@props([
    'class' => '',
])

<nav {{ $attributes->merge(['class' => "flex flex-col gap-1 $class"]) }}>
    {{ $slot }}
</nav>
