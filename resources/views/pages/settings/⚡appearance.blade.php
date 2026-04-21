<?php

use Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Appearance settings')] class extends Component {
    //}; 
    // ?>

<section class="w-full">
    @include('partials.settings-heading')

      <h1 class="text-2xl font-bold text-gray-900 dark:text-white sr-only">{{ __('Appearance settings') }}</h1>

    <x-pages::settings.layout :heading="__('Appearance')" :subheading="__('Update the appearance settings for your account')">
        <div class="flex gap-4" x-data>
            <label class="flex items-center gap-2 cursor-pointer p-4 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                <input type="radio" name="appearance" value="light" class="w-4 h-4 text-blue-600" />
                <span>{{ __('Light') }}</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer p-4 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                <input type="radio" name="appearance" value="dark" class="w-4 h-4 text-blue-600" />
                <span>{{ __('Dark') }}</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer p-4 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                <input type="radio" name="appearance" value="system" class="w-4 h-4 text-blue-600" />
                <span>{{ __('System') }}</span>
            </label>
        </div>
    </x-pages::settings.layout>
</section>
