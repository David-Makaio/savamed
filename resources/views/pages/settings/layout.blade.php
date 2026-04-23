<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <x-navlist aria-label="{{ __('Settings') }}">
            <x-navlist-item href="{{ route('profile.edit') }}" wire:navigate>{{ __('Profile') }}</x-navlist-item>
            <x-navlist-item href="{{ route('security.edit') }}" wire:navigate>{{ __('Security') }}</x-navlist-item>
            <x-navlist-item href="{{ route('appearance.edit') }}" wire:navigate>{{ __('Appearance') }}</x-navlist-item>
        </x-navlist>
    </div>

    <x-separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6">
        <x-heading>{{ $heading ?? '' }}</x-heading>
        <x-subheading>{{ $subheading ?? '' }}</x-subheading>

        <div class="mt-5 w-full max-w-lg">
            {{ $slot }}
        </div>
    </div>
</div>
