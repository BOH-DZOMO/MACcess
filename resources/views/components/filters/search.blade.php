@props([
    'label',
    'placeholder' => '',
])

<div class="md:col-span-5 lg:col-span-4">
    <label
        class="block text-sm font-medium
               text-slate-700 dark:text-slate-300
               mb-1.5">
        {{ $label }}
    </label>

    <div class="relative group">
        <span
            class="material-symbols-outlined
                   absolute left-3 top-1/2 -translate-y-1/2
                   text-slate-400
                   group-focus-within:text-primary
                   transition-colors">
            search
        </span>

        <input
            {{ $attributes->merge([
                'class' =>
                    'w-full h-10 rounded-lg
                     border-slate-200 dark:border-slate-700
                     bg-white dark:bg-[#151c2b]
                     text-slate-900 dark:text-white
                     pl-10 pr-4
                     focus:border-primary focus:ring-primary
                     shadow-sm text-sm'
            ]) }}
            placeholder="{{ $placeholder }}"
            type="text"
        />
    </div>
</div>
