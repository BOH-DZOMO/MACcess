@props(['title' => null])

<!DOCTYPE html>
<html
    lang="en"
    x-data="themeHandler()"
    x-init="init()"
    :class="{ 'dark': darkMode }"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Attendance Dashboard' }}</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
      x-data="{
        darkMode: localStorage.getItem('theme') === 'dark',
        toggleTheme() {
            this.darkMode = !this.darkMode
            localStorage.setItem('theme', this.darkMode ? 'dark' : 'light')
            document.documentElement.classList.toggle('dark', this.darkMode)
        }
    }"
    x-init="
        document.documentElement.classList.toggle(
            'dark',
            darkMode
        )
    "
    @toggle-sidebar.window="sidebarOpen = !sidebarOpen"
    class="bg-background-light dark:bg-background-dark text-[#0d121b] dark:text-white font-display overflow-hidden antialiased"
>

<div class="flex h-screen w-full">

    <x-sidebar />

    {{-- Mobile overlay --}}
    <div
        x-show="sidebarOpen"
        x-transition.opacity
        x-cloak
        @click="sidebarOpen = false"
        class="fixed inset-0 bg-black/50 z-30 md:hidden"
    ></div>

    <main class="flex-1 flex flex-col h-full overflow-hidden relative">
        <x-topbar :title="$title" />

        <div class="flex-1 overflow-y-auto p-6 md:p-8">
            {{ $slot }}
        </div>
    </main>

</div>

</body>
</html>
