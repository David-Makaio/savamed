<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
    <script>
        // Initialize theme BEFORE page renders to prevent flash
        function applyTheme() {
            const savedTheme = localStorage.getItem('theme');
            const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (savedTheme === 'dark' || (!savedTheme && systemDark)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }

        applyTheme();

        document.addEventListener('livewire:navigated', applyTheme);
    </script>
</head>

<body
    class="h-screen bg-preset-gradient flex flex-col lg:flex-row ">
    <!-- Sidebar for Desktop -->
    <nav
        class=" h-svh hidden lg:flex lg:flex-col lg:w-64 border-r border-primary-200 dark:border-slate-700 bg-white dark:bg-slate-800 shadow-sm">
        <x-app-logo-icon class="ml-4 mt-3" width="32" height="32" withBrand/>

        <div class="flex-1 overflow-y-auto mt-3">
            <div class="mb-6 px-3 py-6">
                <h3 class="px-3 mb-3 text-xs font-semibold text-primary-600 dark:text-teal-300 uppercase tracking-wider">
                    {{ __('Platform') }}</h3>
                <a href="{{ route('dashboard') }}" wire:navigate
                    class="flex items-center gap-3 px-3 py-2.5 text-sm rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-teal-100 dark:bg-teal-900/30 text-primary-900 dark:text-teal-300 font-semibold shadow-sm' : 'text-primary-700 dark:text-slate-300 hover:bg-teal-50 dark:hover:bg-slate-700' }}">
                    <x-icon name="home"/>
                    {{ __('Dashboard') }}
                </a>
                <a href="{{ route('inventory.index') }}" wire:navigate
                    class="flex items-center gap-3 px-3 py-2.5 text-sm rounded-lg transition-all duration-200 {{ request()->routeIs('inventory.*') ? 'bg-teal-100 dark:bg-teal-900/30 text-primary-900 dark:text-teal-300 font-semibold shadow-sm' : 'text-primary-700 dark:text-slate-300 hover:bg-teal-50 dark:hover:bg-slate-700' }}">
                    <x-icon name="inventory"/>
                    {{ __('Inventory') }}
                </a>
                <a href="{{ route('history.index') }}" wire:navigate
                    class="flex items-center gap-3 px-3 py-2.5 text-sm rounded-lg transition-all duration-200 {{ request()->routeIs('history.*') ? 'bg-teal-100 dark:bg-teal-900/30 text-primary-900 dark:text-teal-300 font-semibold shadow-sm' : 'text-primary-700 dark:text-slate-300 hover:bg-teal-50 dark:hover:bg-slate-700' }}">
                    <x-icon name="history"/>
                    {{ __('History') }}
                </a>
            </div>

            <div class="mb-6 px-3 py-6">
                <h3 class="px-3 mb-3 text-xs font-semibold text-primary-600 dark:text-teal-300 uppercase tracking-wider">
                    {{ __('Settings') }}</h3>
                <div class="space-y-1">
                    <a href="{{ route('profile.edit') }}" wire:navigate
                        class="flex items-center gap-3 px-3 py-2.5 text-sm rounded-lg transition-all duration-200 {{ request()->routeIs('profile.edit') ? 'bg-teal-100 dark:bg-teal-900/30 text-primary-900 dark:text-teal-300 font-semibold shadow-sm' : 'text-primary-700 dark:text-slate-300 hover:bg-teal-50 dark:hover:bg-slate-700' }}">
                        <x-icon name="user"/>
                        {{ __('Profil') }}
                    </a>
                    <a href="{{ route('security.edit') }}" wire:navigate
                        class="flex items-center gap-3 px-3 py-2.5 text-sm rounded-lg transition-all duration-200 {{ request()->routeIs('security.edit') ? 'bg-teal-100 dark:bg-teal-900/30 text-primary-900 dark:text-teal-300 font-semibold shadow-sm' : 'text-primary-700 dark:text-slate-300 hover:bg-teal-50 dark:hover:bg-slate-700' }}">
                        <x-icon name="shield"/>
                        {{ __('Keamanan') }}
                    </a>
                    <a href="{{ route('appearance.edit') }}" wire:navigate
                        class="flex items-center gap-3 px-3 py-2.5 text-sm rounded-lg transition-all duration-200 {{ request()->routeIs('appearance.edit') ? 'bg-teal-100 dark:bg-teal-900/30 text-primary-900 dark:text-teal-300 font-semibold shadow-sm' : 'text-primary-700 dark:text-slate-300 hover:bg-teal-50 dark:hover:bg-slate-700' }}">
                        <x-icon name="palette"/>
                        {{ __('Tampilan') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="p-3 border-t border-primary-200 dark:border-slate-700">
            <x-desktop-user-menu />
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto">
        {{ $slot }}
    </main>
</body>
</html>
