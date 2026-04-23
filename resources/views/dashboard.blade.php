<x-layouts::app :title="__('Dashboard')">
    <x-slot name="header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-primary-900 dark:text-white mb-2">
                {{ __('Pharmacy Dashboard') }}
            </h1>
            <p class="text-zinc-600 dark:text-zinc-400">{{ __('Welcome back! Monitor and manage your inventory with ease.') }}</p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <livewire:dashboard.stats-overview />

            <div class="card-base overflow-hidden p-6 lg:p-8">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-teal-400 to-teal-500 rounded-lg flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1m2-1v2.5M8 7l-2 1m2-1l-2-1m2 1v2.5"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-primary-900 dark:text-white">{{ __('Welcome back, Admin!') }}</h3>
                        <p class="text-primary-600 dark:text-slate-400 text-sm">{{ __('You\'re all set to manage your pharmacy inventory') }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                    <a href="{{ route('inventory.index') }}" wire:navigate class="group flex items-center gap-4 p-4 rounded-lg border border-primary-200 dark:border-slate-700 hover:bg-teal-50 dark:hover:bg-slate-700 transition-all hover:border-teal-300 dark:hover:border-teal-700">
                        <div class="w-10 h-10 bg-teal-100 dark:bg-teal-900/30 rounded-lg flex items-center justify-center group-hover:bg-teal-200 dark:group-hover:bg-teal-800 transition-colors">
                            <svg class="w-6 h-6 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <div>
                            <p class="font-semibold text-primary-900 dark:text-white">{{ __('Manage Inventory') }}</p>
                            <p class="text-sm text-primary-600 dark:text-slate-400">{{ __('View and update your products') }}</p>
                        </div>
                    </a>
                    <a href="{{ route('history.index') }}" wire:navigate class="group flex items-center gap-4 p-4 rounded-lg border border-primary-200 dark:border-slate-700 hover:bg-teal-50 dark:hover:bg-slate-700 transition-all hover:border-teal-300 dark:hover:border-teal-700">
                        <div class="w-10 h-10 bg-teal-100 dark:bg-teal-900/30 rounded-lg flex items-center justify-center group-hover:bg-teal-200 dark:group-hover:bg-teal-800 transition-colors">
                            <svg class="w-6 h-6 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="font-semibold text-primary-900 dark:text-white">{{ __('View History') }}</p>
                            <p class="text-sm text-primary-600 dark:text-slate-400">{{ __('Track changes and activity') }}</p>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-layouts::app>