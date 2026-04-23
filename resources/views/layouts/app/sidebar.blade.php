<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
        <script>
            // Initialize theme on page load (before rendering)
            (function() {
                const theme = localStorage.getItem('theme') || 'light';
                if (theme === 'dark') {
                    document.documentElement.classList.add('dark');
                }
            })();
        </script>
    </head>
    <body class="min-h-screen bg-gradient-to-br from-primary-50 via-white to-teal-50 dark:from-brand-darker dark:via-slate-900 dark:to-slate-800 flex flex-col lg:flex-row transition-colors duration-300">
        <!-- Sidebar for Desktop -->
        <nav class="hidden lg:flex lg:flex-col lg:w-64 border-r border-primary-200 dark:border-slate-700 bg-white dark:bg-slate-800 shadow-sm">
            <div class="p-4 border-b border-primary-200 dark:border-slate-700">
                {{-- <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate /> --}}
            </div>

            <div class="flex-1 overflow-y-auto">
                    <div class="mb-6 px-3 py-6">
                        <h3 class="px-3 mb-3 text-xs font-semibold text-primary-600 dark:text-teal-300 uppercase tracking-wider">{{ __('Platform') }}</h3>
                        <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center gap-3 px-3 py-2.5 text-sm rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-teal-100 dark:bg-teal-900/30 text-primary-900 dark:text-teal-300 font-semibold shadow-sm' : 'text-primary-700 dark:text-slate-300 hover:bg-teal-50 dark:hover:bg-slate-700' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 4v4m-4-4v4m8-4v4"></path></svg>
                            {{ __('Dashboard') }}
                        </a>
                        <a href="{{ route('inventory.index') }}" wire:navigate class="flex items-center gap-3 px-3 py-2.5 text-sm rounded-lg transition-all duration-200 {{ request()->routeIs('inventory.*') ? 'bg-teal-100 dark:bg-teal-900/30 text-primary-900 dark:text-teal-300 font-semibold shadow-sm' : 'text-primary-700 dark:text-slate-300 hover:bg-teal-50 dark:hover:bg-slate-700' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            {{ __('Inventory') }}
                        </a>
                        <a href="{{ route('history.index') }}" wire:navigate class="flex items-center gap-3 px-3 py-2.5 text-sm rounded-lg transition-all duration-200 {{ request()->routeIs('history.*') ? 'bg-teal-100 dark:bg-teal-900/30 text-primary-900 dark:text-teal-300 font-semibold shadow-sm' : 'text-primary-700 dark:text-slate-300 hover:bg-teal-50 dark:hover:bg-slate-700' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            {{ __('History') }}
                        </a>
                    </div>
            </div>

            <div class="p-3 border-t border-primary-200 dark:border-slate-700">
                <x-desktop-user-menu />
            </div>
        </nav>

        <div class="flex-1 flex flex-col">
            

            <!-- Mobile Sidebar --> 
            <nav id="mobile-sidebar" class="hidden lg:hidden border-b border-primary-200 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 py-4 flex flex-col gap-4">
                <div class="space-y-2">
                    <h3 class="px-2 text-xs font-semibold text-primary-600 dark:text-teal-300 uppercase tracking-wider">{{ __('Platform') }}</h3>
                    <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center gap-3 px-3 py-2.5 text-sm rounded-lg transition-all {{ request()->routeIs('dashboard') ? 'bg-teal-100 dark:bg-teal-900/30 text-primary-900 dark:text-teal-300 font-semibold shadow-sm' : 'text-primary-700 dark:text-slate-300' }} rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 4v4m-4-4v4m8-4v4"></path></svg>
                        {{ __('Dashboard') }}
                    </a>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto">
                {{ $slot }}
            </main>

            @if (session('message'))
                <div class="fixed top-4 right-4 bg-teal-50 dark:bg-teal-900/20 border border-teal-300 dark:border-teal-700/50 text-teal-900 dark:text-teal-200 px-4 py-3 rounded-lg shadow-lg max-w-sm z-50 backdrop-blur-sm" role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-teal-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
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
