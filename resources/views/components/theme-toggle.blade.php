<button 
    id="theme-toggle" 
    class="p-2 rounded-lg dark:text-gray-200 text-primary-800 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors"
    aria-label="Toggle dark mode"
    title="Toggle theme"
>
    <!-- Sun icon (shown in dark mode) -->
    <x-icon name="light" class="w-5 h-5 text-white" id="theme-toggle-sun" class="hidden dark:block w-5 h-5"/>

    <!-- Moon icon (shown in light mode) -->
    <x-icon name="dark" class="block dark:hidden w-5 h-5" id="theme-toggle-moon"/>
</button>

<script>
    function attachThemeToggleListener() {
        const themeToggle = document.getElementById('theme-toggle');
        if (!themeToggle) return;
        
        // Remove any existing listeners to prevent duplicates
        const newToggle = themeToggle.cloneNode(true);
        themeToggle.parentNode.replaceChild(newToggle, themeToggle);
        
        newToggle.addEventListener('click', function() {
            const html = document.documentElement;
            const isDark = html.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        });
    }

    // Attach listener on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', attachThemeToggleListener);
    } else {
        attachThemeToggleListener();
    }

    // Re-attach listener on Livewire navigation
    document.addEventListener('livewire:navigated', attachThemeToggleListener);
</script>