<div class="relative group">
    <button class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white" data-test="sidebar-menu-button">
        <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-200 dark:bg-slate-700 text-gray-700 dark:text-gray-300 font-semibold text-xs">
            {{ auth()->user()->initials() }}
        </div>
        <div class="hidden sm:block text-left">
            <div class="text-sm font-semibold truncate">{{ auth()->user()->name }}</div>
            <div class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ auth()->user()->email }}</div>
        </div>
    </button>

    <div class="absolute bottom-0 left-0 w-full mt-2 w-48 rounded-lg shadow-lg bg-white dark:bg-slate-700 hidden group-hover:block z-10">
        <div class="p-3 border-b border-gray-100 dark:border-slate-600">
            <div class="flex items-center gap-2">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-200 dark:bg-slate-600 text-gray-700 dark:text-gray-300 font-semibold text-sm">
                    {{ auth()->user()->initials() }}
                </div>
                <div class="min-w-0 flex-1">
                    <div class="text-sm font-semibold truncate text-gray-900 dark:text-white">{{ auth()->user()->name }}</div>
                    <div class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ auth()->user()->email }}</div>
                </div>
            </div>
        </div>
        <nav class="py-1">
            <div class="px-4 py-2 border-b border-gray-100 dark:border-slate-600 flex items-center justify-between">
                <span class="text-sm text-gray-700 dark:text-gray-300">{{ __('Theme') }}</span>
                <x-theme-toggle />
            </div>
            <form method="POST" action="{{ route('logout') }}" class="block">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-slate-600 flex items-center gap-2" data-test="logout-button">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    {{ __('Log out') }}
                </button>
            </form>
        </nav>
    </div>
</div>
