@props([
    'label',
    'md' => 'md:col-span-3',
])
{{-- md:col-span-3 --}}

<div class=" {{ $md }} lg:col-span-4">
    <label
        class="block text-sm font-medium
               text-slate-700 dark:text-slate-300
               mb-1.5">
        {{ $label }}
    </label>

    <div class="relative">
        <select
            {{ $attributes->merge([
                'class' =>
                    'w-full h-10 rounded-lg
                     border-slate-200 dark:border-slate-700
                     bg-white dark:bg-[#151c2b]
                     text-slate-900 dark:text-white
                     pl-3 pr-8
                     focus:border-primary focus:ring-primary
                     shadow-sm text-sm
                     appearance-none cursor-pointer'
            ]) }}
        >
            {{ $slot }}
        </select>

        <span
            class="material-symbols-outlined
                   absolute right-3 top-1/2 -translate-y-1/2
                   text-slate-400 pointer-events-none
                   text-[20px]">
            expand_more
        </span>
    </div>
</div>
