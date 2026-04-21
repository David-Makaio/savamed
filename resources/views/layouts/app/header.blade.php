<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800 flex flex-col">
        <!-- Header -->
        <header class="border-b border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900 sticky top-0 z-40">
            <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
                <!-- Left Section -->
                <div class="flex items-center gap-4">
                    <button class="lg:hidden p-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-lg" onclick="document.getElementById('mobile-sidebar').classList.toggle('hidden')">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <x-app-logo href="{{ route('dashboard') }}" wire:navigate />
                </div>

                <!-- Center Navigation (Desktop) -->
                <nav class="hidden lg:flex items-center gap-1">
                    <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center gap-2 px-3 py-2 text-sm {{ request()->routeIs('dashboard') ? 'text-gray-900 dark:text-white font-semibold bg-zinc-200 dark:bg-zinc-700' : 'text-gray-700 dark:text-gray-300 hover:bg-zinc-100 dark:hover:bg-zinc-800' }} rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H2V6a2 2 0 012-2zm0 4v7a2 2 0 002 2h12a2 2 0 002-2v-7"></path></svg>
                        {{ __('Dashboard') }}
                    </a>
                </nav>

                <!-- Right Section -->
                <div class="flex items-center gap-2">
                    <!-- Search Button -->
                    <button class="p-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-lg" title="{{ __('Search') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>

                    <!-- Repository Link (Desktop) -->
                    <a href="https://github.com/laravel/livewire-starter-kit" target="_blank" class="hidden lg:flex p-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-lg" title="{{ __('Repository') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4m0 0l1 12M5 8l4 4m0 0l-1 12"></path></svg>
                    </a>

                    <!-- Documentation Link (Desktop) -->
                    <a href="https://laravel.com/docs/starter-kits#livewire" target="_blank" class="hidden lg:flex p-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-lg" title="{{ __('Documentation') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17s4.5 10.747 10 10.747c5.5 0 10-4.998 10-10.747S17.5 6.253 12 6.253z"></path></svg>
                    </a>

                    <!-- User Menu -->
                    <x-desktop-user-menu />
                </div>
            </div>
        </header>

        <!-- Mobile Sidebar Navigation -->
        <nav id="mobile-sidebar" class="hidden lg:hidden border-b border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900 px-4 py-4 flex flex-col gap-4">
            <div class="space-y-2">
                <h3 class="px-2 text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase">{{ __('Platform') }}</h3>
                <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center gap-3 px-3 py-2 text-sm {{ request()->routeIs('dashboard') ? 'bg-zinc-200 dark:bg-zinc-700 text-gray-900 dark:text-white font-semibold' : 'text-gray-700 dark:text-gray-300' }} rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 4v4m-4-4v4m8-4v4"></path></svg>
                    {{ __('Dashboard') }}
                </a>
            </div>

            <div class="space-y-2 pt-4 border-t border-zinc-200 dark:border-zinc-700">
                <a href="https://github.com/laravel/livewire-starter-kit" target="_blank" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 dark:text-gray-300 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4m0 0l1 12M5 8l4 4m0 0l-1 12"></path></svg>
                    {{ __('Repository') }}
                </a>
                <a href="https://laravel.com/docs/starter-kits#livewire" target="_blank" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 dark:text-gray-300 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17s4.5 10.747 10 10.747c5.5 0 10-4.998 10-10.747S17.5 6.253 12 6.253z"></path></svg>
                    {{ __('Documentation') }}
                </a>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            {{ $slot }}
        </main>

        @if (session('message'))
            <div class="fixed top-4 right-4 bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 text-green-800 dark:text-green-100 px-4 py-3 rounded-lg shadow-lg max-w-sm z-50" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
        @endif
    </body>
</html>
