<div class="relative group">
    <button class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-700 hover:text-gray-900" data-test="sidebar-menu-button">
        <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-200 text-gray-700 font-semibold text-xs">
            {{ auth()->user()->initials() }}
        </div>
        <div class="hidden sm:block">
            <div class="text-sm font-semibold truncate">{{ auth()->user()->name }}</div>
            <div class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</div>
        </div>
    </button>

    <div class="absolute right-0 mt-2 w-48 rounded-lg shadow-lg bg-white hidden group-hover:block z-10">
        <div class="p-3 border-b border-gray-100">
            <div class="flex items-center gap-2">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-200 text-gray-700 font-semibold text-sm">
                    {{ auth()->user()->initials() }}
                </div>
                <div class="min-w-0 flex-1">
                    <div class="text-sm font-semibold truncate">{{ auth()->user()->name }}</div>
                    <div class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</div>
                </div>
            </div>
        </div>
        <nav class="py-1">
            <a href="{{ route('profile.edit') }}" wire:navigate class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                {{ __('Settings') }}
            </a>
            <form method="POST" action="{{ route('logout') }}" class="block">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2" data-test="logout-button">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    {{ __('Log out') }}
                </button>
            </form>
        </nav>
    </div>
</div>
