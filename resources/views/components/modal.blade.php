@props([
    'name' => '',
    'show' => false,
    'focusable' => false,
    'class' => '',
])

<div
    x-data="{ open: @js($show) }"
    @keydown.escape="open = false"
    data-modal="{{ $name }}"
    class="relative z-50"
>
    <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="open = false"></div>

    <div
        x-show="open"
        x-transition
        class="fixed inset-0 overflow-y-auto flex items-center justify-center p-4"
        {{ $focusable ? '@keydown.tab.prevent="$focus.wrap()"' : '' }}
    >
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl w-full {{ $class }}" @click.stop>
            {{ $slot }}
        </div>
    </div>
</div>
