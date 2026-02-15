@props([
    'icon',
    'active' => false,
    'href' => '#'
])

<a {{ $attributes->merge([
    'class' =>
        'flex items-center gap-3 px-3 py-3 rounded-lg transition-colors ' .
        ($active
            ? 'bg-primary/10 text-primary font-semibold'
            : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50 dark:text-slate-400 dark:hover:text-white dark:hover:bg-gray-800'),'href' => $href]) }}>
    <x-icon :name="$icon" />
    <span class="text-sm">{{ $slot }}</span>
</a>
