<x-layouts::auth :title="__('Register')">
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Create an account')" :description="__('Register your pharmacy to start managing inventory')" />

        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-6">
            @csrf

            <div class="grid grid-cols-1 gap-6 p-4 rounded-xl bg-blue-50/50 dark:bg-blue-900/10 border border-blue-100 dark:border-blue-900/20">
                <h3 class="text-sm font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400">{{ __('Pharmacy Information') }}</h3>
                
                <div>
                    <label for="pharmacy_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Pharmacy Name') }}</label>
                    <input
                        id="pharmacy_name"
                        name="pharmacy_name"
                        type="text"
                        value="{{ old('pharmacy_name') }}"
                        required
                        placeholder="{{ __('e.g. Healthy Life Pharmacy') }}"
                        class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    />
                    @error('pharmacy_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="license_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Pharmacy License Number') }}</label>
                    <input
                        id="license_number"
                        name="license_number"
                        type="text"
                        value="{{ old('license_number') }}"
                        required
                        placeholder="{{ __('e.g. SIA-123456789') }}"
                        class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    />
                    @error('license_number')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <hr class="border-gray-200 dark:border-gray-700">

            <h3 class="text-sm font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">{{ __('Admin Account Details') }}</h3>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Full Name') }}</label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                    autocomplete="name"
                    placeholder="{{ __('Your full name') }}"
                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                />
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Email address') }}</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    placeholder="email@example.com"
                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                />
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Password') }}</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="{{ __('Password') }}"
                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                />
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Confirm password') }}</label>
                <input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="{{ __('Confirm password') }}"
                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                />
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" data-test="register-user-button" class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                {{ __('Register Pharmacy') }}
            </button>
        </form>

        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
            <span>{{ __('Already have an account?') }}</span>
            <a href="{{ route('login') }}" wire:navigate class="font-medium text-blue-600 hover:text-blue-700">{{ __('Log in') }}</a>
        </div>
    </div>
</x-layouts::auth>