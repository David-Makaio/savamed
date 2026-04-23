<button 
    id="theme-toggle" 
    class="p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors"
    aria-label="Toggle dark mode"
    title="Toggle theme"
>
    <!-- Sun icon (shown in dark mode) -->
    <svg id="theme-toggle-sun" class="hidden dark:block w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.293 2.293a1 1 0 011.414 0l.707.707a1 1 0 01-1.414 1.414l-.707-.707a1 1 0 010-1.414zm2.828 2.828a1 1 0 011.414 0l.707.707a1 1 0 01-1.414 1.414l-.707-.707a1 1 0 010-1.414zm2.828 2.828a1 1 0 011.414 0l.707.707a1 1 0 01-1.414 1.414l-.707-.707a1 1 0 010-1.414zM10 11a1 1 0 100-2 1 1 0 000 2zm4.293-1.293a1 1 0 011.414 0l.707.707a1 1 0 01-1.414 1.414l-.707-.707a1 1 0 010-1.414zm2.828-2.828a1 1 0 011.414 0l.707.707a1 1 0 01-1.414 1.414l-.707-.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
    </svg>

    <!-- Moon icon (shown in light mode) -->
    <svg id="theme-toggle-moon" class="block dark:hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
    </svg>
</button>

<script>
    // Initialize theme on page load
    (function() {
        const theme = localStorage.getItem('theme') || 'light';
        const html = document.documentElement;
        
        if (theme === 'dark') {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }
    })();

    // Theme toggle button handler
    const themeToggle = document.getElementById('theme-toggle');
    if (themeToggle) {
        themeToggle.addEventListener('click', function() {
            const html = document.documentElement;
            const currentTheme = localStorage.getItem('theme') || 'light';
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            localStorage.setItem('theme', newTheme);
            
            if (newTheme === 'dark') {
                html.classList.add('dark');
            } else {
                html.classList.remove('dark');
            }
        });
    }
</script>
