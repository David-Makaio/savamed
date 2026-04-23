<header class="fixed w-full bg-white z-50 border-b border-gray-100">
    <nav>
        <span class="max-w-[48px]">
            <x-app-logo-icon/>
        </span>
        <ul>
            <li class="inline-block mr-4">
                <a href="{{ route('home') }}" class="">Home</a>
            </li>
            <li class="inline-block mr-4">
                <a href="{{ route('about') }}" class="">About</a>
            </li>
            <li class="inline-block mr-4">
                <a href="{{ route('contact') }}" class="">Contact</a>
            </li>
            <li class="inline-block mr-4">
                <a href="{{ route('pricing') }}" class="">Pricing</a>
            </li>
            
        </ul>
    </nav>
    <x-theme-toggle />
</header>