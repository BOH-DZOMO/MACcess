<aside 
{{-- class="w-64 hidden md:flex flex-col bg-surface-light dark:bg-surface-dark border-r border-[#e7ebf3] dark:border-gray-800 transition-all" --}}
class="fixed md:static inset-y-0 left-0 z-40 w-64
           flex-col bg-surface-light dark:bg-surface-dark
           border-r border-[#e7ebf3] dark:border-gray-800
           transition-transform duration-200 ease-in-out
           -translate-x-full md:translate-x-0
           flex"
    :class="{ 'translate-x-0': sidebarOpen }"

>

    {{-- Logo --}}
    <div class="p-6 pb-2">
        <div class="flex items-center gap-3">
            <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-primary text-white">
                <x-icon name="grid_view" />
            </div>
            <span class="text-xl font-bold">MaCcess</span>
        </div>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
        <x-sidebar-link icon="dashboard" :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-sidebar-link>
        <x-sidebar-link icon="meeting_room" :href="route('rooms.official.index')" :active="request()->routeIs('rooms.official.index')" >Official Rooms</x-sidebar-link>
        <x-sidebar-link icon="meeting_room" :href="route('rooms.adhoc.index')" :active="request()->routeIs('rooms.adhoc.index')">Adhoc Rooms</x-sidebar-link>
        <x-sidebar-link icon="location_on">Locations</x-sidebar-link>
        <x-sidebar-link icon="bar_chart">Reports</x-sidebar-link>
        <x-sidebar-link icon="settings">Settings</x-sidebar-link>
    </nav>

    {{-- User --}}
    {{-- <x-sidebar-user /> --}}
</aside>
