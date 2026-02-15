import './bootstrap';
import Alpine from 'alpinejs';



window.Alpine = Alpine;


Alpine.data('themeHandler', () => ({
    darkMode: false,
    sidebarOpen: false,

    init() {
        // Load saved theme
        const saved = localStorage.getItem('theme')

        if (saved === 'dark') {
            this.darkMode = true
        } else if (saved === 'light') {
            this.darkMode = false
        } else {
            // System preference fallback
            this.darkMode = window.matchMedia('(prefers-color-scheme: dark)').matches
        }
    },

    toggleTheme() {
        this.darkMode = !this.darkMode
        localStorage.setItem('theme', this.darkMode ? 'dark' : 'light')
    }
}))

Alpine.start();



