@props([
    'name',
    'filled' => false,
])

<span
    class="material-symbols-outlined"
    @if($filled)
        style="font-variation-settings: 'FILL' 1;"
    @endif
>
    {{ $name }}
</span>
