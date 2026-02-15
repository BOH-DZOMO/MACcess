{{-- @props([
    'label',
    'value',
    'icon',
    'color' => 'primary'
]) --}}

{{-- <div class="bg-surface-light dark:bg-surface-dark
            border border-[#e7ebf3] dark:border-gray-800
            rounded-xl p-5 flex items-center gap-4
            hover:shadow-sm transition-shadow"> --}}

    {{-- Icon --}}
    {{-- <div class="flex items-center justify-center w-12 h-12 rounded-lg
                bg-{{ $color }}/10 text-{{ $color }}">
        <x-icon :name="$icon" />
    </div> --}}

    {{-- Text --}}
    {{-- <div class="flex flex-col">
        <span class="text-sm text-slate-500 dark:text-slate-400">
            {{ $label }}
        </span>

        <span class="text-2xl font-bold text-slate-900 dark:text-white">
            {{ $value }}
        </span>
    </div>
</div> --}}
@props([
    'label',
    'value',
    'icon',
    'icon_color' => 'indigo', // Changed 'primary' to 'indigo' or similar for standard TW colors
    'side_color' => 'green',
    'side_text' => null
])

<div class="bg-surface-light dark:bg-surface-dark p-5 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 dark:border-gray-800 flex flex-col gap-4 group hover:border-primary/20 transition-all">

    <div class="flex justify-between items-start">
        {{-- Icon Container --}}
        {{-- Note: If you use dynamic colors, ensure they are whitelisted or use standard Tailwind names --}}
        <div class="p-2 bg-{{ $icon_color }}-50 dark:bg-{{ $icon_color }}-900/20 rounded-lg text-{{ $icon_color }}-600">
            <x-icon :name="$icon" />
        </div>

        {{-- Side Status Logic --}}
        <div class="flex items-center">
            @if (empty($side_text))
                <span class="flex h-3 w-3 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-{{ $side_color }}-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-{{ $side_color }}-500"></span>
                </span>
            @else
                <span class="text-[10px] uppercase tracking-wider font-bold text-{{ $icon_color }}-600 bg-{{ $icon_color }}-50 dark:bg-{{ $icon_color }}-900/30 px-2.5 py-1 rounded-full">
                    {{ $side_text }}
                </span>
            @endif
        </div>
    </div>

    <div>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">{{ $label }}</p>
        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mt-1">{{ $value }}</h3>
    </div>
</div>

