<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ $heading ?? '' }}</h1>
        <p class="text-lg text-gray-600 dark:text-gray-400">{{ $subheading ?? '' }}</p>
    </div>

    <div class="w-full">
        {{ $slot }}
    </div>
</div>
