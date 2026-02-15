<x-dashboard.section title="Active Rooms">
        <x-slot:actions>
        <button
            class="mt-2 text-center text-sm font-medium
                   text-primary py-2 px-3 hover:bg-primary/5
                   rounded-lg transition-colors">
            View all
        </button>
    </x-slot:actions>

    <div class="p-4 space-y-3 overflow-y-auto max-h-[400px]">

        <x-dashboard.room-item
            name="Boardroom A"
            subtitle="Meeting: Q3 Strategy"
            icon="videocam"
            status="occupied"
        />

        <x-dashboard.room-item
            name="Huddle Space"
            subtitle="Meeting: Design Sync"
            icon="groups"
            status="occupied"
        />

        <x-dashboard.room-item
            name="Auditorium"
            subtitle="Event: Town Hall"
            icon="podium"
            status="occupied"
        />

        <x-dashboard.room-item
            name="Room 404"
            subtitle="Available for booking"
            icon="meeting_room"
            status="free"
        />

        {{-- <button
            class="w-full mt-2 text-center text-sm font-medium
                   text-primary py-2 hover:bg-primary/5
                   rounded-lg transition-colors">
            View All Rooms
        </button> --}}

    </div>

</x-dashboard.section>
