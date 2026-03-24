<x-app-layout title="Review Official Room Details">

                <!-- Scrollable Content -->

                <div class="max-w-5xl mx-auto w-full p-6 md:p-10 flex flex-col gap-8">
                    <!-- Breadcrumbs -->
                    <div class="flex flex-wrap items-center gap-2 text-sm">
                        <a class="text-slate-500 hover:text-primary transition-colors dark:text-slate-400"
                            href="#">Dashboard</a>
                        <span class="text-slate-400 material-symbols-outlined text-sm">chevron_right</span>
                        <a class="text-slate-500 hover:text-primary transition-colors dark:text-slate-400"
                            href="{{ route('rooms.official.index') }}">Official</a>
                        <span class="text-slate-400 material-symbols-outlined text-sm">chevron_right</span>
                        <a class="text-slate-500 hover:text-primary transition-colors dark:text-slate-400"
                            href="{{ route('rooms.official.create') }}">Create</a>
                        <span class="text-slate-400 material-symbols-outlined text-sm">chevron_right</span>
                        <span class="text-slate-900 font-medium dark:text-white">Review</span>
                    </div>
                    <!-- Page Heading -->
                    <div class="flex flex-col gap-2">
                        <p class="text-slate-500 dark:text-slate-400 text-lg">Please review the information below before
                            creating the official room.</p>
                    </div>
                    <!-- Review Cards Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- General Information -->
                        <div
                            class="lg:col-span-3 bg-surface-light dark:bg-surface-dark rounded-xl border border-border-light dark:border-border-dark shadow-sm overflow-hidden">
                            <div
                                class="flex items-center justify-between p-5 border-b border-border-light dark:border-border-dark bg-slate-50/50 dark:bg-slate-800/50">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-primary">info</span>
                                    <h3 class="font-bold text-slate-900 dark:text-white">General Information</h3>
                                </div>
                                <a href="{{ route('rooms.official.create') }}#section-details"
                                    class="flex items-center gap-1 text-sm font-medium text-primary hover:text-primary/80 transition-colors px-3 py-1.5 rounded-lg hover:bg-primary/10">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                    Edit
                                </a>
                            </div>
                            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="flex flex-col gap-1">
                                    <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Room Name</span>
                                    <span class="text-base font-semibold text-slate-900 dark:text-white">
                                        {{ $draft['name'] ?? '—' }}
                                    </span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Description</span>
                                    <span class="text-base font-normal text-slate-900 dark:text-white">
                                        {{ $draft['description'] ?? '—' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Location & Geofence -->
                        <div
                            class="lg:col-span-2 bg-surface-light dark:bg-surface-dark rounded-xl border border-border-light dark:border-border-dark shadow-sm overflow-hidden flex flex-col">
                            <div
                                class="flex items-center justify-between p-5 border-b border-border-light dark:border-border-dark bg-slate-50/50 dark:bg-slate-800/50">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-primary">location_on</span>
                                    <h3 class="font-bold text-slate-900 dark:text-white">Location &amp; Geofence</h3>
                                </div>
                                <a href="{{ route('rooms.official.create') }}#section-location"
                                    class="flex items-center gap-1 text-sm font-medium text-primary hover:text-primary/80 transition-colors px-3 py-1.5 rounded-lg hover:bg-primary/10">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                    Edit
                                </a>
                            </div>
                            <div class="p-0 flex flex-col md:flex-row h-full">
                                <div
                                    class="w-full md:w-1/2 h-48 md:h-auto bg-slate-100 dark:bg-slate-800 relative flex items-center justify-center">
                                    <div class="flex flex-col items-center gap-2 text-slate-400">
                                        <span class="material-symbols-outlined text-[48px]">location_on</span>
                                        <span class="text-xs font-medium">Map preview on save</span>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 p-6 flex flex-col gap-6">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="flex flex-col gap-1">
                                            <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Shape</span>
                                            <span class="text-base font-normal text-slate-900 dark:text-white flex items-center gap-1">
                                                <span class="material-symbols-outlined text-lg text-slate-400">
                                                    {{ ($draft['geofence_shape'] ?? 'circle') === 'polygon' ? 'pentagon' : 'circle' }}
                                                </span>
                                                {{ ucfirst($draft['geofence_shape'] ?? '—') }}
                                            </span>
                                        </div>
                                        @if(($draft['geofence_shape'] ?? 'circle') === 'circle')
                                        <div class="flex flex-col gap-1">
                                            <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Radius</span>
                                            <span class="text-base font-normal text-slate-900 dark:text-white">
                                                {{ $draft['geofence_radius'] ?? '—' }} meters
                                            </span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Coordinates</span>
                                        <span class="text-sm font-mono text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded w-fit">
                                            {{ $draft['latitude'] ?? '—' }}°, {{ $draft['longitude'] ?? '—' }}°
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Right Column Stack -->
                        <div class="lg:col-span-1 flex flex-col gap-6">
                            <!-- Connectivity -->
                            <div
                                class="bg-surface-light dark:bg-surface-dark rounded-xl border border-border-light dark:border-border-dark shadow-sm overflow-hidden flex flex-col">
                                <div
                                    class="flex items-center justify-between p-5 border-b border-border-light dark:border-border-dark bg-slate-50/50 dark:bg-slate-800/50">
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-primary">wifi</span>
                                        <h3 class="font-bold text-slate-900 dark:text-white">Connectivity</h3>
                                    </div>
                                    <a href="{{ route('rooms.official.create') }}#section-security"
                                        class="text-primary hover:bg-primary/10 p-1.5 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-lg">edit</span>
                                    </a>
                                </div>
                                <div class="p-5">
                                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-3">Wi-Fi BSSID</p>
                                    @if(!empty($draft['wifi_bssid']))
                                        <div class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-200 bg-slate-50 dark:bg-slate-800/50 p-2 rounded border border-slate-100 dark:border-slate-700">
                                            <span class="material-symbols-outlined text-slate-400 text-lg">router</span>
                                            <span class="font-mono">{{ $draft['wifi_bssid'] }}</span>
                                        </div>
                                    @else
                                        <span class="text-sm text-slate-400 italic">None configured</span>
                                    @endif
                                </div>
                            </div>
                            <!-- Verification Methods -->
                            <div
                                class="bg-surface-light dark:bg-surface-dark rounded-xl border border-border-light dark:border-border-dark shadow-sm overflow-hidden flex flex-col flex-1">
                                <div
                                    class="flex items-center justify-between p-5 border-b border-border-light dark:border-border-dark bg-slate-50/50 dark:bg-slate-800/50">
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-primary">verified_user</span>
                                        <h3 class="font-bold text-slate-900 dark:text-white">Verification</h3>
                                    </div>
                                    <a href="{{ route('rooms.official.create') }}#section-security"
                                        class="text-primary hover:bg-primary/10 p-1.5 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-lg">edit</span>
                                    </a>
                                </div>
                                <div class="p-5">
                                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-3">Required Methods</p>
                                    <div class="flex flex-wrap gap-2">
                                        {{-- Geofencing is always active --}}
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium bg-blue-50 text-blue-700 border border-blue-200 dark:bg-blue-900/20 dark:text-blue-300 dark:border-blue-800">
                                            <span class="material-symbols-outlined text-lg">location_on</span>
                                            Geofencing
                                        </span>
                                        @forelse($draft['verification_type'] ?? [] as $type)
                                            @if($type === 'fingerprint')
                                                <span
                                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium bg-green-50 text-green-700 border border-green-200 dark:bg-green-900/20 dark:text-green-300 dark:border-green-800">
                                                    <span class="material-symbols-outlined text-lg">fingerprint</span>
                                                    Fingerprint
                                                </span>
                                            @elseif($type === 'qr')
                                                <span
                                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium bg-purple-50 text-purple-700 border border-purple-200 dark:bg-purple-900/20 dark:text-purple-300 dark:border-purple-800">
                                                    <span class="material-symbols-outlined text-lg">qr_code_2</span>
                                                    QR Code
                                                </span>
                                            @endif
                                        @empty
                                            <span class="text-sm text-slate-400 italic">None selected</span>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                        <!-- Time Frame -->
                        <div
                            class="lg:col-span-3 bg-surface-light dark:bg-surface-dark rounded-xl border border-border-light dark:border-border-dark shadow-sm overflow-hidden flex flex-col">
                            <div
                                class="flex items-center justify-between p-5 border-b border-border-light dark:border-border-dark bg-slate-50/50 dark:bg-slate-800/50">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-primary">schedule</span>
                                    <h3 class="font-bold text-slate-900 dark:text-white">Time Frame Window</h3>
                                </div>
                                <a href="{{ route('rooms.official.create') }}#section-timeframe"
                                    class="flex items-center gap-1 text-sm font-medium text-primary hover:text-primary/80 transition-colors px-3 py-1.5 rounded-lg hover:bg-primary/10">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                    Edit
                                </a>
                            </div>
                            <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-8">
                                <div class="flex flex-col gap-1">
                                    <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Timeframe Name</span>
                                    <span class="text-base font-semibold text-slate-900 dark:text-white">
                                        {{ $draft['timeframe_label'] ?? '—' }}
                                    </span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Time Range</span>
                                    <span class="text-base font-mono text-slate-900 dark:text-white bg-slate-50 dark:bg-slate-800 px-2 py-0.5 rounded w-fit">
                                        {{ $draft['timeframe_start'] ?? '--:--' }} – {{ $draft['timeframe_end'] ?? '--:--' }}
                                    </span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Repeating Days</span>
                                    <div class="flex flex-wrap gap-1 mt-1">
                                        @php
                                            $daysJson = $draft['timeframe_days'] ?? '[]';
                                            $selectedDays = json_decode($daysJson, true) ?? [];
                                            $dayNames = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                                        @endphp
                                        
                                        @forelse($selectedDays as $dayIndex)
                                            <span class="text-xs font-bold bg-primary/10 text-primary border border-primary/20 px-2.5 py-1 rounded-full">
                                                {{ $dayNames[$dayIndex] ?? '' }}
                                            </span>
                                        @empty
                                            <span class="text-sm text-slate-400 italic">None selected</span>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            <!-- Sticky Footer Action Bar -->
            <div
                class="sticky bottom-0 left-0 w-full bg-surface-light dark:bg-surface-dark border-t border-border-light dark:border-border-dark p-4 md:px-10 z-30 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
                <div class="max-w-5xl mx-auto flex items-center justify-between">
                    <a href="{{ route('rooms.official.create') }}"
                        class="px-6 py-2.5 rounded-lg text-slate-600 dark:text-slate-300 font-medium hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        Back
                    </a>
                    <form method="POST" action="{{ route('rooms.official.store') }}">
                        @csrf
                        <button type="submit"
                            class="px-8 py-2.5 rounded-lg bg-primary hover:bg-blue-700 text-white font-bold shadow-lg shadow-blue-500/30 transition-all active:scale-95 flex items-center gap-2">
                            <span>Create Room</span>
                            <span class="material-symbols-outlined text-lg">arrow_forward</span>
                        </button>
                    </form>
                </div>
            </div>

</x-app-layout>