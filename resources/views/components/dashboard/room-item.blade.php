@props([
    'name',
    'subtitle',
    'icon',
    'status' => 'free' // free | occupied
])

@php
    $isFree = $status === 'free';
@endphp

<div class="flex items-center justify-between p-3 rounded-xl
            bg-slate-50 dark:bg-gray-800/50
            hover:bg-slate-100 dark:hover:bg-gray-800
            transition-colors cursor-pointer group">

    <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-lg
                    bg-white dark:bg-gray-700 shadow-sm
                    flex items-center justify-center
                    text-slate-400 group-hover:text-primary transition-colors">
            <x-icon :name="$icon" />
        </div>

        <div>
            <p class="text-sm font-semibold text-slate-900 dark:text-white">
                {{ $name }}
            </p>
            <p class="text-xs text-slate-500">
                {{ $subtitle }}
            </p>
        </div>
    </div>

    <span class="text-xs font-medium px-2 py-1 rounded-md"
          @class([
              'text-green-600 bg-green-50 dark:bg-green-900/20' => $isFree,
              'text-red-500 bg-red-50 dark:bg-red-900/20' => ! $isFree,
          ])>
        {{ $isFree ? 'Free' : 'Occupied' }}
    </span>
</div>
