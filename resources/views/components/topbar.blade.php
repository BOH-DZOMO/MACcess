<header
    class="h-16 flex items-center justify-between px-6 py-4
           bg-surface-light/80 dark:bg-surface-dark/80
           backdrop-blur-md border-b border-[#e7ebf3] dark:border-gray-800
           z-10"
>

    {{-- Left side --}}
    <div class="flex items-center gap-4">

        {{-- Mobile menu button --}}
        <button
            class="md:hidden p-2 rounded-lg text-slate-500 hover:bg-slate-100 dark:hover:bg-gray-800"
            @click="$dispatch('toggle-sidebar')"
        >
            <x-icon name="menu" />
        </button>

        {{-- Page title / breadcrumb --}}
        <div class="hidden sm:flex text-sm text-slate-500 dark:text-slate-400 font-medium">
            {{ $title ?? 'Dashboard' }}
        </div>
    </div>

    {{-- Right side --}}
    <div class="flex items-center gap-3 ml-auto">

        {{-- Search --}}
       <div class="hidden lg:flex relative w-64">
    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
        <x-icon name="search" />
    </span>

    <input
        type="text"
        placeholder="Search rooms, people..."
        class="block w-full pl-10 pr-3 py-2 rounded-lg
               bg-slate-100 dark:bg-gray-800
               text-slate-900 dark:text-white
               placeholder-slate-400
               focus:outline-none focus:ring-2 focus:ring-primary/50
               text-sm"
    >
</div>

        {{-- Dark mode toggle --}}
<button
    @click="toggleTheme()"
    class="p-2 rounded-lg text-slate-500 hover:bg-slate-100 dark:hover:bg-gray-800 transition-colors"
    aria-label="Toggle dark mode"
>
    <template x-if="!darkMode">
        <x-icon name="dark_mode" />
    </template>

    <template x-if="darkMode">
        <x-icon name="light_mode" />
    </template>
</button>

        {{-- Notifications --}}
        <button class="relative p-2 rounded-lg text-slate-500 hover:bg-slate-100 dark:hover:bg-gray-800">
            <x-icon name="notifications" />
            <span class="absolute top-2 right-2 h-2 w-2 rounded-full bg-red-500"></span>
        </button>

        {{-- avatar menu --}}
<x-user-menu
    name="Alex Morgan"
    role="Admin Manager"
    avatar="https://lh3.googleusercontent.com/aida-public/AB6AXuBB2sFVFiRPK7GyMa38j9WZ3VAVDExaAfKPHrePgXiphkJwAzzRwyTlCH0K0VgOvS-A6wzMALqq_txjtVZo_3zzKX37-5JwmF15HYc80o9LhiY0bU2YDoNyypXmdqKIUMU4YV3jqYDsRvVggDceI-q5NNPMbSt52xszZWjzR2PBQooybctfdWiy3pvPf-aNvkrEvHHz6XNVrZVu9P5VGxdBP3OoBZ1vShQIj4hlsIuHTzVHzJ1iWua0bgrgYjVZZj3hY2sPvy6CQjw"
/>

    </div>
</header>
