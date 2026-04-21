<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800 flex flex-col lg:flex-row">
        <!-- Sidebar for Desktop -->
        <nav class="hidden lg:flex lg:flex-col lg:w-64 border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="p-4 border-b border-zinc-200 dark:border-zinc-700">
                <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
            </div>

            <div class="flex-1 overflow-y-auto">
                <div class="px-3 py-6">
                    <div class="mb-6">
                        <h3 class="px-3 mb-3 text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase">{{ __('Platform') }}</h3>
                        <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center gap-3 px-3 py-2 text-sm {{ request()->routeIs('dashboard') ? 'bg-zinc-200 dark:bg-zinc-700 text-gray-900 dark:text-white font-semibold' : 'text-gray-700 dark:text-gray-300 hover:bg-zinc-100 dark:hover:bg-zinc-800' }} rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 4v4m-4-4v4m8-4v4"></path></svg>
                            {{ __('Dashboard') }}
                        </a>
                    </div>
                </div>

                <div class="px-3 py-6 border-t border-zinc-200 dark:border-zinc-700">
                    <a href="https://github.com/laravel/livewire-starter-kit" target="_blank" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4m0 0l1 12M5 8l4 4m0 0l-1 12"></path></svg>
                        {{ __('Repository') }}
                    </a>
                    <a href="https://laravel.com/docs/starter-kits#livewire" target="_blank" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17s4.5 10.747 10 10.747c5.5 0 10-4.998 10-10.747S17.5 6.253 12 6.253z"></path></svg>
                        {{ __('Documentation') }}
                    </a>
                </div>
            </div>

            <div class="p-3 border-t border-zinc-200 dark:border-zinc-700">
                <x-desktop-user-menu />
            </div>
        </nav>

        <div class="flex-1 flex flex-col">
            <!-- Mobile Header -->
            <header class="lg:hidden border-b border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900 px-4 py-3 flex items-center justify-between">
                <button class="p-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-lg" onclick="document.getElementById('mobile-sidebar').classList.toggle('hidden')">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <x-app-logo href="{{ route('dashboard') }}" wire:navigate />
                <button class="p-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-lg relative group">
                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-semibold text-xs">
                        {{ auth()->user()->initials() }}
                    </div>
                    <div class="absolute right-0 mt-8 w-48 rounded-lg shadow-lg bg-white dark:bg-zinc-700 hidden group-hover:block z-10">
                        <div class="p-3 border-b border-gray-100 dark:border-zinc-600">
                            <div class="flex items-center gap-2">
                                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-200 font-semibold text-sm">
                                    {{ auth()->user()->initials() }}
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="text-sm font-semibold truncate text-gray-900 dark:text-white">{{ auth()->user()->name }}</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ auth()->user()->email }}</div>
                                </div>
                            </div>
                        </div>
                        <nav class="py-1">
                            <a href="{{ route('profile.edit') }}" wire:navigate class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-zinc-600 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ __('Settings') }}
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-zinc-600 flex items-center gap-2" data-test="logout-button">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    {{ __('Log out') }}
                                </button>
                            </form>
                        </nav>
                    </div>
                </button>
            </header>

            <!-- Mobile Sidebar -->
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
        </div>
    </body>
</html>
