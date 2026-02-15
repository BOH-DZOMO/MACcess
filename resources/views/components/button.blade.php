@props([
    'icon' => null,
])

<button
    {{ $attributes->merge([
        'class' => 'bg-primary hover:bg-primary/90
                    text-white text-sm font-medium
                    py-2 px-4 rounded-lg
                    shadow-sm shadow-primary/30
                    flex items-center gap-2
                    transition-all'
    ]) }}
>
    @if($icon)
        <x-icon :name="$icon" />
    @endif

    {{ $slot }}
</button>
