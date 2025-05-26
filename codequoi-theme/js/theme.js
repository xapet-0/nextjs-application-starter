(function() {
    const themeToggleBtn = document.getElementById('theme-toggle');
    const darkModeClass = 'dark';

    // Load saved theme from localStorage
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.documentElement.classList.add(darkModeClass);
        themeToggleBtn.textContent = '☀️';
    } else {
        document.documentElement.classList.remove(darkModeClass);
        themeToggleBtn.textContent = '🌙';
    }

    themeToggleBtn.addEventListener('click', () => {
        if (document.documentElement.classList.contains(darkModeClass)) {
            document.documentElement.classList.remove(darkModeClass);
            localStorage.setItem('theme', 'light');
            themeToggleBtn.textContent = '🌙';
        } else {
            document.documentElement.classList.add(darkModeClass);
            localStorage.setItem('theme', 'dark');
            themeToggleBtn.textContent = '☀️';
        }
    });
})();
