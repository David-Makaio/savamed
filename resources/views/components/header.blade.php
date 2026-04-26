<header 
    id="navbar"
    class="fixed w-full z-50 p-4 transition-all duration-300 bg-transparent"
>
    <nav class="flex justify-between items-center max-w-7xl mx-auto">
        <div class="max-w-10">
            <x-app-logo-icon/>
        </div>
        <ul class="flex items-center gap-4 ml-auto mr-4">
            <li class="inline-block">
                <a href="{{ route('home') }}" class="">Home</a>
            </li>
            <li class="inline-block">
                <a href="{{ route('home') }}" class="">About</a>
            </li>
            <li class="inline-block">
                <a href="{{ route('home') }}" class="">Contact</a>
            </li>
            <li class="inline-block">
                <a href="{{ route('home') }}" class="">Pricing</a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="bg-transparent border border-charcoal text-charcoal px-4 py-2 rounded-lg font-800 text-center hover:bg-accent transition-smooth">
                    Log in
                </a>
            </li>
            
        </ul>
        <x-theme-toggle />
    </nav>
</header>

<script>
    const navbar = document.getElementById('navbar');
    const heroHeight = window.innerHeight;

    window.addEventListener('scroll', () => {
        if (window.scrollY > heroHeight / 6) {
            navbar.classList.remove('bg-transparent');
            navbar.classList.add('bg-white', 'shadow-lg', 'dark:bg-gray-800');
        } else {
            navbar.classList.remove('bg-white', 'shadow-lg', 'dark:bg-gray-800');
            navbar.classList.add('bg-transparent');
        }
    });
</script>