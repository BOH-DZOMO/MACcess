{{-- @props(['title'])

<div class="bg-surface-light dark:bg-surface-dark
            rounded-2xl
            border border-slate-100 dark:border-gray-800
            shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)]
            flex flex-col"> --}}

    {{-- Header --}}
    {{-- <div class="px-6 py-5 border-b border-slate-100 dark:border-gray-800">
        <h2 class="text-lg font-bold text-slate-900 dark:text-white">
            {{ $title }}
        </h2>

    </div> --}}

    {{-- Body --}}
    {{-- <div {{ $attributes->merge(['class' => 'flex-1']) }}>
        {{ $slot }}
    </div>

    
</div> --}}

@props(['title'])

<div class="bg-surface-light dark:bg-surface-dark
            rounded-2xl
            border border-slate-100 dark:border-gray-800
            shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)]
            flex flex-col">

    {{-- Header --}}
    <div class="px-6 py-5 border-b border-slate-100 dark:border-gray-800
                flex items-center justify-between gap-4">

        <h2 class="text-lg font-bold text-slate-900 dark:text-white">
            {{ $title }}
        </h2>

        {{-- Header actions (optional) --}}
        @isset($actions)
            <div class="flex items-center gap-2">
                {{ $actions }}
            </div>
        @endisset
    </div>

    {{-- Body --}}
    <div class="flex-1 px-6 pb-6">
    {{ $slot }}
    </div>
</div>

