<x-app-layout>
    <x-dashboard.welcome
        user="Alex Morgan"
        subtitle="Here's what's happening in your rooms today."
    />

    {{-- Stat cards will go here next --}}
    <x-dashboard.stats-grid>
        <x-dashboard.stat-card
            label="Total Rooms"
            value="12"
            icon="meeting_room"
            icon_color="blue"
            side_text="1"
        />

        <x-dashboard.stat-card
            label="Active Rooms"
            value="4"
            icon="event"
            icon_color="green"
        />

        <x-dashboard.stat-card
            label="Check-ins Today"
            value="86"
            icon="check_circle"
            icon_color="purple"
            side_text="1"
        />

        <x-dashboard.stat-card
            label="Late Check-ins"
            value="3"
            icon="schedule"
            icon_color="orange"
            side_color="gray"
            side_text="4"
            
        />
    </x-dashboard.stats-grid>


   {{-- TWO-COLUMN SECTION --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Left: Active Rooms (1/3) --}}
        <div class="lg:col-span-1">
            <x-dashboard.active-rooms />
        </div>

        {{-- Right: Attendance Table (2/3) --}}
        <div class="lg:col-span-2">
            <x-dashboard.section title="Today’s Attendance">
            <x-slot:actions>
                <button
                    class="tmt-2 text-center text-sm font-medium
                        text-primary py-2 px-3 hover:bg-primary/5
                        rounded-lg transition-colors">
                    View all
                </button>
            </x-slot:actions>
        <x-table.table>
            <x-table.head>
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">Room</th>
                <th class="px-6 py-3 text-left">Status</th>
                <th class="px-6 py-3 text-left">Time</th>
            </x-table.head>

            <tbody>
                <x-table.row>
                    <td class="px-6 py-4">John Doe</td>
                    <td class="px-6 py-4">Room A</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-600">
                            Present
                        </span>
                    </td>
                    <td class="px-6 py-4">08:12 AM</td>
                </x-table.row>

                <x-table.row>
                    <td class="px-6 py-4">Sarah Lee</td>
                    <td class="px-6 py-4">Room B</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full bg-rose-100 text-rose-600">
                            Late
                        </span>
                    </td>
                    <td class="px-6 py-4">08:27 AM</td>
                </x-table.row>
            </tbody>

                </x-table.table>
        </x-dashboard.section>
        </div>

    </div>

</x-app-layout>