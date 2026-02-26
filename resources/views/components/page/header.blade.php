@props([
    'title',
    'subtitle' => null,
])

<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-3">
    {{-- Left: Title & subtitle --}}
    <div class="space-y-1">
        <h2
            class="text-2xl md:text-3xl font-bold
                   text-slate-900 dark:text-white
                   tracking-tight">
            {{ $title }}
        </h2>

        @if ($subtitle)
            <p class="text-slate-500 dark:text-slate-400">
                {{ $subtitle }}
            </p>
        @endif
    </div>

    {{-- Right: Actions --}}
    @isset($actions)
        <div class="flex items-center gap-2">
            {{ $actions }}
        </div>
    @endisset
</div>
