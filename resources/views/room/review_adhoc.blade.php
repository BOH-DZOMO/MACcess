<x-app-layout title="Review Adhoc Room Details">

    <div class="max-w-5xl mx-auto w-full p-6 md:p-10 flex flex-col gap-8">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
            <a class="hover:text-primary transition-colors" href="#">Rooms</a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <a class="hover:text-primary transition-colors" href="{{ route('rooms.adhoc.index') }}">Adhoc</a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <a class="hover:text-primary transition-colors" href="{{ route('rooms.adhoc.create') }}">Create</a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <span class="font-semibold text-slate-900 dark:text-white">Review</span>
        </nav>

        <!-- Page Heading -->
        <div class="flex flex-col gap-2">
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Review Adhoc Room</h2>
            <p class="text-slate-500 dark:text-slate-400 text-lg">Please review the information below before
                creating the one-time event room.</p>
        </div>

        <!-- Review Cards Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- General Information -->
            <div
                class="lg:col-span-3 bg-white dark:bg-[#1e2736] rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
                <div
                    class="flex items-center justify-between p-5 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">info</span>
                        <h3 class="font-bold text-slate-900 dark:text-white">General Information</h3>
                    </div>
                    <a href="{{ route('rooms.adhoc.create') }}#section-details"
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
                    <div class="flex flex-col gap-1 md:col-span-2">
                        <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Description</span>
                        <span class="text-base font-normal text-slate-900 dark:text-white">
                            {{ $draft['description'] ?? '—' }}
                        </span>
                    </div>
                    <div class="flex flex-col gap-1 md:col-span-2 mt-2 pt-4 border-t border-slate-100 dark:border-slate-800">
                        <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Physical Location</span>
                        <span class="text-base font-semibold text-slate-900 dark:text-white flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-sm">pin_drop</span>
                            {{ $draft['location'] ?? '—' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Location & Geofence (Only show if geofence is selected) -->
            @if(in_array('geofence', $draft['verification_type'] ?? []))
            <div
                class="lg:col-span-2 bg-white dark:bg-[#1e2736] rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden flex flex-col">
                <div
                    class="flex items-center justify-between p-5 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">location_on</span>
                        <h3 class="font-bold text-slate-900 dark:text-white">Location &amp; Geofence</h3>
                    </div>
                    <a href="{{ route('rooms.adhoc.create') }}#section-location"
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
                            <span class="text-xs font-medium">Map boundary confirmed</span>
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
            @endif

            <!-- Right Column Stack -->
            <div class="{{ in_array('geofence', $draft['verification_type'] ?? []) ? 'lg:col-span-1' : 'lg:col-span-3' }} flex flex-col gap-6">
                <!-- Connectivity -->
                <div
                    class="bg-white dark:bg-[#1e2736] rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden flex flex-col">
                    <div
                        class="flex items-center justify-between p-5 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">wifi</span>
                            <h3 class="font-bold text-slate-900 dark:text-white">Connectivity</h3>
                        </div>
                        <a href="{{ route('rooms.adhoc.create') }}#section-security"
                            class="text-primary hover:bg-primary/10 p-1.5 rounded-lg transition-colors">
                            <span class="material-symbols-outlined text-lg">edit</span>
                        </a>
                    </div>
                    <div class="p-5">
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-2">Wi-Fi BSSID Binding</p>
                        <div class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-200 bg-slate-50 dark:bg-slate-800/50 p-3 rounded-lg border border-slate-100 dark:border-slate-700">
                            <span class="material-symbols-outlined text-slate-400">router</span>
                            <span class="font-mono font-bold">{{ $draft['wifi_bssid'] ?? 'Any' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Verification Methods -->
                <div
                    class="bg-white dark:bg-[#1e2736] rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden flex flex-col flex-1">
                    <div
                        class="flex items-center justify-between p-5 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">verified_user</span>
                            <h3 class="font-bold text-slate-900 dark:text-white">Verification</h3>
                        </div>
                    </div>
                    <div class="p-5">
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-3">Active Checks</p>
                        <div class="flex flex-wrap gap-2">
                            @forelse($draft['verification_type'] ?? [] as $type)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium {{ $type === 'geofence' ? 'bg-blue-50 text-blue-700 border-blue-200 dark:bg-blue-900/20 dark:text-blue-300' : 'bg-green-50 text-green-700 border-green-200 dark:bg-green-900/20 dark:text-green-300' }} border">
                                    <span class="material-symbols-outlined text-lg">{{ $type === 'geofence' ? 'location_on' : 'fingerprint' }}</span>
                                    {{ ucfirst($type) }}
                                </span>
                            @empty
                                <span class="text-sm text-slate-400 italic">Basic check only</span>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activation Period -->
            <div
                class="lg:col-span-3 bg-white dark:bg-[#1e2736] rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden flex flex-col">
                <div
                    class="flex items-center justify-between p-5 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">schedule</span>
                    <h3 class="font-bold text-slate-900 dark:text-white">Activation Period</h3>
                </div>
                <a href="{{ route('rooms.adhoc.create') }}#section-activation"
                    class="flex items-center gap-1 text-sm font-medium text-primary hover:text-primary/80 transition-colors px-3 py-1.5 rounded-lg hover:bg-primary/10">
                    <span class="material-symbols-outlined text-lg">edit</span>
                    Edit
                </a>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex flex-col gap-1">
                    <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Date</span>
                    <span class="text-base font-bold text-slate-900 dark:text-white">
                        {{ \Carbon\Carbon::parse($draft['activation_date'] ?? now())->format('F j, Y') }}
                    </span>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Starts At</span>
                    <span class="text-base font-mono font-bold text-slate-900 dark:text-white bg-slate-50 dark:bg-slate-800 px-2 py-0.5 rounded w-fit">
                        {{ \Carbon\Carbon::parse($draft['activation_time'] ?? '00:00')->format('h:i A') }}
                    </span>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Duration</span>
                    <span class="text-base font-bold text-slate-900 dark:text-white">
                        {{ $draft['activation_duration'] ?? '0' }} Minutes
                    </span>
                </div>
            </div>
        </div>

        <!-- Questions & Feedback -->
        <div
            class="lg:col-span-3 bg-white dark:bg-[#1e2736] rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
            <div
                class="flex items-center justify-between p-5 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">quiz</span>
                    <h3 class="font-bold text-slate-900 dark:text-white">Questions &amp; Feedback</h3>
                </div>
                <a href="{{ route('rooms.adhoc.create') }}#section-questions"
                    class="flex items-center gap-1 text-sm font-medium text-primary hover:text-primary/80 transition-colors px-3 py-1.5 rounded-lg hover:bg-primary/10">
                    <span class="material-symbols-outlined text-lg">edit</span>
                    Edit
                </a>
            </div>
            <div class="p-6">
                @forelse($draft['questions'] ?? [] as $index => $q)
                    <div class="mb-4 last:mb-0 p-4 rounded-lg border border-slate-100 dark:border-slate-700 bg-slate-50/30 dark:bg-slate-800/20">
                        <div class="flex items-start gap-3">
                            <span class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-xs font-bold text-primary">{{ $index + 1 }}</span>
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-900 dark:text-white">{{ $q['title'] }}</h4>
                                <div class="mt-2 flex gap-4">
                                    <span class="text-xs font-medium text-slate-500 uppercase tracking-wider bg-slate-100 dark:bg-slate-800 px-2 py-0.5 rounded">{{ str_replace('_', ' ', $q['type']) }}</span>
                                    @if($q['type'] !== 'text')
                                        <div class="flex flex-wrap gap-2 text-xs text-slate-600 dark:text-slate-400">
                                            <span class="font-semibold">Options:</span>
                                            @foreach($q['options'] ?? [] as $opt)
                                                <span class="px-2 border-l border-slate-200 dark:border-slate-600 first:border-0">{{ $opt }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-slate-500 italic">No feedback questions added.</p>
                @endforelse
            </div>
        </div>

    </div>

    <!-- Sticky Footer Action Bar -->
    <div
        class="sticky bottom-0 left-0 w-full bg-white dark:bg-[#1e2736] border-t border-slate-200 dark:border-slate-700 p-4 md:px-10 z-30 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
        <div class="max-w-5xl mx-auto flex items-center justify-between">
            <a href="{{ route('rooms.adhoc.create') }}"
                class="px-6 py-2.5 rounded-lg text-slate-600 dark:text-slate-300 font-medium hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                Back to Edit
            </a>
            <form method="POST" action="{{ route('rooms.adhoc.store') }}">
                @csrf
                {{-- Hidden Inputs to "Properly Send Data" --}}
                <input type="hidden" name="name"                value="{{ $draft['name'] ?? '' }}">
                <input type="hidden" name="location"            value="{{ $draft['location'] ?? '' }}">
                <input type="hidden" name="description"         value="{{ $draft['description'] ?? '' }}">
                <input type="hidden" name="wifi_bssid"          value="{{ $draft['wifi_bssid'] ?? '' }}">
                <input type="hidden" name="activation_date"     value="{{ $draft['activation_date'] ?? '' }}">
                <input type="hidden" name="activation_time"     value="{{ $draft['activation_time'] ?? '' }}">
                <input type="hidden" name="activation_duration" value="{{ $draft['activation_duration'] ?? '' }}">
                <input type="hidden" name="latitude"            value="{{ $draft['latitude'] ?? '' }}">
                <input type="hidden" name="longitude"           value="{{ $draft['longitude'] ?? '' }}">
                <input type="hidden" name="geofence_radius"     value="{{ $draft['geofence_radius'] ?? '' }}">
                <input type="hidden" name="geofence_shape"      value="{{ $draft['geofence_shape'] ?? '' }}">
                <input type="hidden" name="geofence_polygon"    value="{{ $draft['geofence_polygon'] ?? '' }}">
                
                @foreach($draft['verification_type'] ?? [] as $type)
                    <input type="hidden" name="verification_type[]" value="{{ $type }}">
                @endforeach

                @foreach($draft['questions'] ?? [] as $index => $q)
                    <input type="hidden" name="questions[{{ $index }}][title]" value="{{ $q['title'] }}">
                    <input type="hidden" name="questions[{{ $index }}][type]"  value="{{ $q['type'] }}">
                    @foreach($q['options'] ?? [] as $optIndex => $opt)
                        <input type="hidden" name="questions[{{ $index }}][options][]" value="{{ $opt }}">
                    @endforeach
                @endforeach

                <button type="submit"
                    class="px-8 py-2.5 rounded-lg bg-primary hover:bg-blue-700 text-white font-bold shadow-lg shadow-blue-500/30 transition-all active:scale-95 flex items-center gap-2">
                    <span>Confirm & Create</span>
                    <span class="material-symbols-outlined text-lg">check_circle</span>
                </button>
            </form>
        </div>
    </div>

</x-app-layout>
