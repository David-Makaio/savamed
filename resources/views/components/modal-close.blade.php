@props([
    'class' => '',
])

<button
    type="button"
    @click="open = false"
    {{ $attributes->merge(['class' => "inline-flex $class"]) }}
>
    {{ $slot }}
</button>
