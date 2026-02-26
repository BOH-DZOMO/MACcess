@props([
    'active' => false,
    'count' => null,
])

<button
    {{ $attributes->merge([
        'class' =>
            'inline-flex items-center gap-1.5
             px-3 py-1 rounded-full
             text-xs font-medium
             transition-colors
             ' .
             ($active
                ? 'bg-slate-200 dark:bg-slate-700
                   text-slate-800 dark:text-slate-200'
                : 'border border-slate-200 dark:border-slate-700
                   text-slate-600 dark:text-slate-400
                   hover:bg-slate-50 dark:hover:bg-slate-800')
    ]) }}
>
    <span>{{ $slot }}</span>

    @if($count !== null)
        <span
            class="ml-1.5 flex items-center justify-center
                   size-4 rounded-full
                   bg-white dark:bg-slate-800
                   text-[10px] font-bold
                   text-slate-700 dark:text-slate-300"
        >
            {{ $count }}
        </span>
    @endif
</button>
