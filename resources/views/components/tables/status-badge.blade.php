@props(['label'])

@php
$styles = [
    'Active' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400 border-green-200 dark:border-green-900/50',
    'Draft' => 'bg-slate-100 text-slate-800 dark:bg-slate-700 dark:text-slate-300 border-slate-200 dark:border-slate-600',
    'Archived' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400 border-yellow-200 dark:border-yellow-900/50',
];
@endphp

<span
    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border
           {{ $styles[$label] ?? $styles['Draft'] }}">
    <span class="size-1.5 rounded-full bg-current opacity-70 mr-1.5"></span>
    {{ $label }}
</span>
