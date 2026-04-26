<x-layouts::auth :title="__('Pending Verification')">
    <div class="text-center space-y-4">
        <div class="flex justify-center">
            <div class="p-4 bg-amber-100 rounded-full">
                <svg class="w-12 h-12 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
        
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Verification Pending</h1>
        
        <p class="text-gray-600 dark:text-gray-400">
            Thank you for registering <strong>{{ auth()->user()->apotek->name }}</strong>. 
            Our team is currently reviewing your pharmacy license ({{ auth()->user()->apotek->license_number }}).
        </p>

        <div class="pt-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-blue-600 hover:underline">
                    Log out and check back later
                </button>
            </form>
        </div>
    </div>
</x-layouts::auth>