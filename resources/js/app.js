import './bootstrap';
import Alpine from 'alpinejs';



window.Alpine = Alpine;

// This makes the variable global
window.myAppEventSource = new EventSource("/sse");

// Global listener for notifications (things that happen on every page)
window.myAppEventSource.addEventListener('notification', (e) => {
    const data = JSON.parse(e.data);
    console.log("New alert: " + data.message);
});


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



