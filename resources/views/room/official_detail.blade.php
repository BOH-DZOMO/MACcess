<x-app-layout title="Official Room Details">
    {{-- <div class="p-8 max-w-7xl mx-auto w-full"> --}}
        <!-- Room Overview -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div class="flex items-center gap-5">
                <div class="size-20 bg-primary/10 rounded-xl flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-4xl">domain</span>
                </div>
                <div>
                    <div class="flex items-center gap-3">
                        <h1 class="text-2xl font-bold">{{ $room->name }}</h1>
                        @if(!$room->delete_status)
                        <span
                            class="px-2.5 py-0.5 text-xs font-semibold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 rounded-full">Active</span>
                        @else
                        <span
                            class="px-2.5 py-0.5 text-xs font-semibold bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 rounded-full">Inactive</span>
                        @endif
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">ID: {{ $room->room_uuid }} • {{ $room->location }}
                    </p>
                </div>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('rooms.official.edit', $room->room_uuid) }}"
                    class="px-4 py-2 border border-slate-200 dark:border-slate-700 text-sm font-bold rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">Edit
                    Room</a>
                <a href="{{ route('rooms.official.invite', $room->room_uuid) }}"
                    class="px-4 py-2 border border-primary text-primary text-sm font-bold rounded-lg hover:bg-primary/5 transition-colors">Invite
                    </a>
                <button
                    class="px-4 py-2 bg-primary text-white text-sm font-bold rounded-lg hover:bg-primary/90 transition-colors">Generate
                    Report</button>
            </div>
        </div>
        <!-- Stats Summary -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-slate-500">Currently Present</span>
                    <span class="material-symbols-outlined text-primary">groups</span>
                </div>
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-bold">42</span>
                    <span class="text-sm text-green-600 mb-1">+12% vs yesterday</span>
                </div>
            </div>
            <div
                class="bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-slate-500">Registered Employees</span>
                    <span class="material-symbols-outlined text-primary">event_available</span>
                </div>
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-bold">{{ $membersCount }}</span>
                    <span class="text-sm text-slate-400 mb-1">capacity n/a</span>
                </div>
            </div>
            <div
                class="bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-slate-500">Late Arrivals</span>
                    <span class="material-symbols-outlined text-red-500">schedule</span>
                </div>
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-bold">4</span>
                    <span class="text-sm text-red-500 mb-1">Requires attention</span>
                </div>
            </div>
        </div>
        <!-- Configuration & Map -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <div
                class="lg:col-span-2 bg-white dark:bg-background-dark rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
                <div class="p-6 border-b border-slate-100 dark:border-slate-800">
                    <h3 class="font-bold">Room Configuration</h3>
                </div>
                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-1/2 p-6 space-y-4">
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Geofencing
                                Status</label>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="material-symbols-outlined text-slate-500">{{ $room->geofence_shape === 'circle' ? 'circle' : 'pentagon' }}</span>
                                <span class="font-medium">
                                    @if($room->geofence_shape === 'circle')
                                        Radius: {{ $room->geofence_radius }} meters
                                    @else
                                        Polygon (Custom Shape)
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Required
                                Wi-Fi</label>
                            <div class="mt-1 space-y-1">
                                <div class="flex items-center gap-2 text-sm">
                                    <span class="material-symbols-outlined text-xs text-primary">wifi</span>
                                    <code>{{ $room->wifi_bssid }}</code>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Active
                                Verification</label>
                            <div class="flex flex-wrap gap-2 mt-2">
                                <span
                                    class="px-2 py-1 bg-primary/10 text-primary text-xs font-medium rounded capitalize">Geofencing</span>
                                @foreach($room->verification_type ?? [] as $type)
                                <span
                                    class="px-2 py-1 bg-primary/10 text-primary text-xs font-medium rounded capitalize">{{ $type }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Timeframe
                                Window</label>
                            <div class="mt-2 space-y-2">
                                <div class="flex items-center gap-2 text-sm font-bold text-slate-900 dark:text-white">
                                    <span class="material-symbols-outlined text-xs text-primary">calendar_today</span>
                                    {{ $room->timeframe_label }}
                                </div>
                                <div class="flex items-center gap-4 text-xs text-slate-500">
                                    <div class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[14px]">schedule</span>
                                        {{ $room->timeframe_start }} - {{ $room->timeframe_end }}
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[14px]">event_repeat</span>
                                        @php
                                            $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                                            $selectedDays = collect($room->timeframe_days)->map(fn($i) => $days[$i] ?? '')->filter()->implode(', ');
                                        @endphp
                                        {{ $selectedDays ?: 'No days set' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 min-h-48 bg-slate-200 dark:bg-slate-800 relative">
                        <div class="absolute inset-0 bg-center bg-no-repeat bg-cover"
                            id="room-map"
                            data-lat="{{ $room->latitude }}"
                            data-lng="{{ $room->longitude }}"
                            style="background-image: url('https://maps.googleapis.com/maps/api/staticmap?center={{ $room->latitude }},{{ $room->longitude }}&zoom=16&size=600x300&markers=color:blue%7Clabel:S%7C{{ $room->latitude }},{{ $room->longitude }}&key=YOUR_API_KEY_HERE');">
                        </div>
                        <div class="absolute inset-0 bg-primary/10 flex items-center justify-center">
                            <div class="size-20 bg-primary/20 border-2 border-primary rounded-full animate-pulse"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Join Requests Preview -->
            <div
                class="bg-white dark:bg-background-dark rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
                <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex justify-between items-center">
                    <h3 class="font-bold">Join Requests</h3>
                    <span class="bg-primary text-white text-[10px] px-2 py-0.5 rounded-full font-bold">3 NEW</span>
                </div>
                <div class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($room->joinRequests ?? [] as $request)
                        <!-- Request Item -->
                        <div class="p-4 flex items-center gap-3">
                            <img class="rounded-full size-10" alt="{{ $request->name }}"
                                src="{{ $request->avatar_url ?? 'https://ui-avatars.com/api/?name='.urlencode($request->name) }}" />
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold truncate">{{ $request->name }}</p>
                                <p class="text-xs text-slate-500 truncate">{{ $request->department ?? 'N/A' }}</p>
                            </div>
                            <div class="flex gap-2">
                                <button
                                    class="size-8 rounded-lg bg-green-100 text-green-600 hover:bg-green-200 flex items-center justify-center transition-colors">
                                    <span class="material-symbols-outlined text-sm">check</span>
                                </button>
                                <button
                                    class="size-8 rounded-lg bg-red-100 text-red-600 hover:bg-red-200 flex items-center justify-center transition-colors">
                                    <span class="material-symbols-outlined text-sm">close</span>
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center bg-slate-50/50 dark:bg-slate-900/20">
                            <span class="material-symbols-outlined text-slate-300 text-4xl mb-2">person_add</span>
                            <p class="text-xs text-slate-400 font-medium">No pending requests</p>
                        </div>
                    @endforelse
                </div>
                <button
                    class="w-full py-3 text-sm font-bold text-primary hover:bg-primary/5 border-t border-slate-100 dark:border-slate-800 transition-colors">
                    View All Requests
                </button>
            </div>
        </div>
        <!-- Tabs Section -->
        <div
            class="bg-white dark:bg-background-dark rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
            <div class="border-b border-slate-100 dark:border-slate-800">
                <div class="flex gap-8 px-6">
                    <button class="py-4 border-b-2 border-primary text-sm font-bold text-primary">Registered Employees
                        (42)</button>
                    <button
                        class="py-4 border-b-2 border-transparent text-sm font-medium text-slate-500 hover:text-slate-700">Access
                        Logs</button>
                    <button
                        class="py-4 border-b-2 border-transparent text-sm font-medium text-slate-500 hover:text-slate-700">Admin
                        History</button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 dark:bg-slate-900/50 text-slate-500 text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Employee</th>
                            <th class="px-6 py-4 font-semibold">Department</th>
                            <th class="px-6 py-4 font-semibold">Joined Date</th>
                            <th class="px-6 py-4 font-semibold">Compliance</th>
                            <th class="px-6 py-4 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        @forelse($room->users ?? [] as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <img class="rounded-full size-8" alt="{{ $user->name }}"
                                            src="{{ $user->avatar_url ?? 'https://ui-avatars.com/api/?name='.urlencode($user->name) }}" />
                                        <div class="text-sm font-bold">{{ $user->name }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">{{ $user->department ?? 'General' }}</td>
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">{{ $user->pivot->joined_at->format('M d, Y') }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div
                                            class="w-16 bg-slate-200 dark:bg-slate-700 h-1.5 rounded-full overflow-hidden">
                                            <div class="bg-green-500 h-full w-full"></div>
                                        </div>
                                        <span class="text-xs font-medium text-green-600">100%</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-slate-400 hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center bg-slate-50/50 dark:bg-slate-900/20">
                                    <span class="material-symbols-outlined text-slate-300 text-5xl mb-3">group_off</span>
                                    <p class="text-sm text-slate-400 font-medium tracking-tight">No registered employees yet</p>
                                    <p class="text-xs text-slate-400/70 mt-1">Approved members will appear here automatically.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                <p class="text-xs text-slate-500">Showing 1 to 3 of 42 employees</p>
                <div class="flex gap-2">
                    <button
                        class="px-3 py-1 border border-slate-200 dark:border-slate-700 rounded text-xs font-medium hover:bg-slate-50">Previous</button>
                    <button
                        class="px-3 py-1 border border-slate-200 dark:border-slate-700 rounded text-xs font-medium bg-slate-100 dark:bg-slate-800">1</button>
                    <button
                        class="px-3 py-1 border border-slate-200 dark:border-slate-700 rounded text-xs font-medium hover:bg-slate-50">2</button>
                    <button
                        class="px-3 py-1 border border-slate-200 dark:border-slate-700 rounded text-xs font-medium hover:bg-slate-50">Next</button>
                </div>
            </div>
        </div>
    {{-- </div> --}}
</x-app-layout>
