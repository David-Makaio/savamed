@props([
    'label' => null,
    'type' => 'text',
    'required' => false,
    'viewable' => false,
    'class' => '',
])

@php
    $inputId = $attributes->get('id') ?? 'input-';
@endphp

<div class="flex flex-col gap-2">
    @if($label)
        <label for="{{ $inputId }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            {{ $label }}
            @if($required)
                <span class="text-red-600">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        <input
            id="{{ $inputId }}"
            type="{{ $type }}"
            {{ $attributes->merge(['class' => "block w-full px-4 py-2 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:border-gray-600 dark:text-white $class"]) }}
            @required($required)
        />

        @if($viewable && $type === 'password')
            <button
                type="button"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                @click="$el.parentElement.querySelector('input').type = $el.parentElement.querySelector('input').type === 'password' ? 'text' : 'password'"
            >
                <span class="text-sm">👁️</span>
            </button>
        @endif
    </div>

    @error($attributes->get('wire:model') ?? '')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
