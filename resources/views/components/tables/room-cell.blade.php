@props([
    'icon',
    'title',
    'id',
])

<div class="flex items-center gap-3 min-w-0">
    <div
        class="size-9 rounded-lg bg-blue-100 dark:bg-blue-900/30
               flex items-center justify-center text-blue-600 dark:text-blue-400 shrink-0">
        <span class="material-symbols-outlined text-[20px]">
            {{ $icon }}
        </span>
    </div>

    <div class="flex flex-col min-w-0">
        <span class="text-sm font-semibold text-slate-900 dark:text-white truncate">
            {{ $title }}
        </span>
        <span class="text-xs text-slate-500 dark:text-slate-400 truncate">
            ID: {{ $id }}
        </span>
    </div>
</div>
