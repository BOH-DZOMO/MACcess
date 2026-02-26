@props([
    'type' => 'active',
])

@php
$map = [
    'active' => [
        'bg' => 'bg-green-100 dark:bg-green-900/30',
        'text' => 'text-green-800 dark:text-green-400',
        'border' => 'border-green-200 dark:border-green-900/50',
        'dot' => 'bg-green-500',
        'label' => 'Active',
    ],
    'draft' => [
        'bg' => 'bg-slate-100 dark:bg-slate-700',
        'text' => 'text-slate-800 dark:text-slate-300',
        'border' => 'border-slate-200 dark:border-slate-600',
        'dot' => 'bg-slate-400',
        'label' => 'Draft',
    ],
    'archived' => [
        'bg' => 'bg-yellow-100 dark:bg-yellow-900/30',
        'text' => 'text-yellow-800 dark:text-yellow-400',
        'border' => 'border-yellow-200 dark:border-yellow-900/50',
        'dot' => 'bg-yellow-500',
        'label' => 'Archived',
    ],
];

$status = $map[$type] ?? $map['active'];
@endphp

<span
    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
           {{ $status['bg'] }} {{ $status['text'] }} {{ $status['border'] }} border"
>
    <span class="size-1.5 rounded-full mr-1.5 {{ $status['dot'] }}"></span>
    {{ $status['label'] }}
</span>
