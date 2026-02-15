@props([
    'user' => 'Alex',
    'subtitle' => 'Here’s what’s happening today'
])

<div class="mb-8">
    <h1 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">
        Welcome back, {{ $user }} 👋
    </h1>

    <p class="mt-2 text-slate-500 dark:text-slate-400 text-sm md:text-base">
        {{ $subtitle }}
    </p>
</div>
