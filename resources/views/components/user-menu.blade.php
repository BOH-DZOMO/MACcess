@props([
    'name' => 'Alex Morgan',
    'role' => 'Admin Manager',
    'avatar' => null,
])

<div x-data="{ open: false }" class="relative">

    {{-- Trigger --}}
    <button
        @click="open = !open"
        @click.outside="open = false"
        class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-slate-100 dark:hover:bg-gray-800 transition"
    >
        {{-- Avatar --}}
        @if ($avatar)
            <img
                src="{{ $avatar }}"
                alt="{{ $name }}"
                class="h-8 w-8 rounded-full object-cover"
            >
        @else
            <div class="h-8 w-8 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">
                {{ collect(explode(' ', $name))->map(fn ($n) => $n[0])->join('') }}
            </div>
        @endif

        {{-- Caret --}}
        <x-icon name="expand_more" class="text-slate-400" />
    </button>

    {{-- Dropdown --}}
    <div
        x-show="open"
        x-transition
        x-cloak
        class="absolute right-0 mt-2 w-48
               bg-white dark:bg-surface-dark
               border border-slate-200 dark:border-gray-700
               rounded-xl shadow-lg overflow-hidden z-50"
    >
        <div class="px-4 py-3 border-b border-slate-100 dark:border-gray-800">
            <p class="text-sm font-semibold text-slate-900 dark:text-white">{{ $name }}</p>
            <p class="text-xs text-slate-500 dark:text-slate-400">{{ $role }}</p>
        </div>

        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm hover:bg-slate-100 dark:hover:bg-gray-800">
            <x-icon name="person" />
            Profile
        </a>

        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm hover:bg-slate-100 dark:hover:bg-gray-800">
            <x-icon name="logout" />
            Logout
        </a>
    </div>

</div>
