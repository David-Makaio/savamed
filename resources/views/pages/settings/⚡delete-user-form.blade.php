<?php

use Livewire\Component;

new class extends Component {}; ?>

<section class="mt-10 space-y-6">
    <div class="relative mb-5">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ __('Delete account') }}</h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ __('Delete your account and all of its resources') }}</p>
    </div>

    <button
        type="button"
        wire:click="$dispatch('openModal', { name: 'confirm-user-deletion' })"
        data-test="delete-user-button"
        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors"
    >
        {{ __('Delete account') }}
    </button>

    <livewire:pages::settings.delete-user-modal />
</section>
