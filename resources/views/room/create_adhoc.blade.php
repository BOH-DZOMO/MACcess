<x-app-layout title="Create Adhoc Room">

    <div class="mx-auto max-w-5xl">
        <nav class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 mb-6">
            <a class="hover:text-primary transition-colors" href="#">Rooms</a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <span class="font-semibold text-slate-900 dark:text-white">Create Adhoc</span>
        </nav>
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-6">
                <div>
                    <p class="mt-2 text-slate-500 dark:text-slate-400 text-lg">Step 1 of 2: Define basic details,
                        connectivity, and location settings.</p>
                </div>
            </div>
            <div class="w-full border-b border-slate-200 dark:border-slate-700">
                <div class="flex gap-8">
                    <div class="flex items-center gap-2 border-b-[3px] border-primary pb-3 px-1">
                        <div
                            class="flex size-6 items-center justify-center rounded-full bg-primary text-[12px] font-bold text-white">
                            1</div>
                        <span class="text-sm font-bold text-primary">Basic Info & Configuration</span>
                    </div>
                    <div class="flex items-center gap-2 border-b-[3px] border-transparent pb-3 px-1 opacity-50">
                        <div
                            class="flex size-6 items-center justify-center rounded-full bg-slate-200 text-[12px] font-bold text-slate-500 dark:bg-slate-700 dark:text-slate-400">
                            2</div>
                        <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Review</span>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('rooms.adhoc.store-session') }}" method="POST" id="create-adhoc-form" x-data="{ requiresGeofence: {{ in_array('geofence', old('verification_type', session('adhoc_room_draft.verification_type', []))) ? 'true' : 'false' }} }">
        @csrf
        <div
            class="flex flex-col gap-8 rounded-xl bg-white p-6 shadow-sm border border-slate-200 dark:bg-[#1e2736] dark:border-slate-700 dark:shadow-none">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="col-span-1 md:col-span-2" id="section-details">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4">Room Details</h3>
                </div>
                <div class="col-span-1 md:col-span-2 space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300" for="roomName">Room Name <span
                            class="text-red-500">*</span></label>
                    <input
                        class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-900 placeholder-slate-400 hover:border-slate-300 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 transition-all shadow-sm"
                        id="roomName" name="name" placeholder="e.g. Main Conference Hall A" type="text"
                        value="{{ old('name', session('adhoc_room_draft.name', '')) }}" />
                </div>
                <div class="col-span-1 md:col-span-2 space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300"
                        for="description">Description</label>
                    <textarea
                        class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-900 placeholder-slate-400 hover:border-slate-300 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 resize-none transition-all shadow-sm"
                        id="description" name="description" placeholder="Briefly describe the purpose of this attendance room..." rows="3">{{ old('description', session('adhoc_room_draft.description', '')) }}</textarea>
                </div>
                <div class="col-span-1 md:col-span-2 space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300" for="location">Physical Location <span class="text-red-500">*</span></label>
                    <input
                        class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-900 placeholder-slate-400 hover:border-slate-300 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 transition-all shadow-sm"
                        id="location" name="location" placeholder="e.g. Hall A, Block 3" type="text"
                        value="{{ old('location', session('adhoc_room_draft.location', '')) }}" />
                </div>
            </div>
            <hr class="border-slate-100 dark:border-slate-700" />
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="col-span-1 md:col-span-2" id="section-security">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4">Security &amp;
                        Verification</h3>
                </div>
                <div class="col-span-1 md:col-span-2 space-y-2">
                    <div class="flex items-center gap-2">
                        <label class="text-sm font-medium text-slate-700 dark:text-slate-300" for="wifiBSSID">Wi-Fi
                            BSSID Binding</label>
                        <span class="material-symbols-outlined text-slate-400 text-[16px] cursor-help"
                            title="Bind attendance to a specific Wi-Fi Access Point MAC Address">help</span>
                    </div>
                    <div class="relative">
                        <input
                            class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 pl-10 text-sm text-slate-900 placeholder-slate-400 hover:border-slate-300 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 transition-all shadow-sm"
                            id="wifiBSSID" name="wifi_bssid" placeholder="xx:xx:xx:xx:xx:xx" type="text"
                            
                            value="{{ old('wifi_bssid', session('adhoc_room_draft.wifi_bssid', '')) }}" />
                        <span
                            class="material-symbols-outlined absolute left-3 top-2.5 text-slate-400 text-[20px]">wifi</span>
                    </div>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Optional: Restrict attendance to
                        specific network hardware.</p>
                </div>
                <div class="col-span-1 md:col-span-2 space-y-4">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Verification
                        Type</label>
                    <div class="flex flex-col gap-4">
                        <div class="space-y-2">
                            <p
                                class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                                Additional Verification(select one or more)</p>
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-2">
                                <label class="relative cursor-pointer group">
                                    <input class="peer sr-only" name="verification_type[]" type="checkbox" value="geofence" x-model="requiresGeofence" />
                                    <div class="flex flex-col h-full rounded-xl border-2 border-slate-200 bg-white p-5 transition-all hover:bg-slate-50 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700 dark:peer-checked:bg-primary/10">
                                        <div class="flex justify-between items-start mb-4">
                                            <span class="material-symbols-outlined text-[32px] text-slate-400 dark:text-slate-500 peer-checked:text-primary transition-colors">location_on</span>
                                            <span class="material-symbols-outlined text-primary text-[20px] opacity-0 peer-checked:opacity-100 transition-opacity">check</span>
                                        </div>
                                        <span class="font-bold text-sm block mb-1">Geofencing</span>
                                        <span class="text-xs text-slate-500 dark:text-slate-400">Require users to be in location</span>
                                    </div>
                                </label>

                                <label class="relative cursor-pointer group">
                                    <input class="peer sr-only" name="verification_type[]" type="checkbox" value="fingerprint" {{ in_array('fingerprint', old('verification_type', session('adhoc_room_draft.verification_type', []))) ? 'checked' : '' }} />
                                    <div class="flex flex-col h-full rounded-xl border-2 border-slate-200 bg-white p-5 transition-all hover:bg-slate-50 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700 dark:peer-checked:bg-primary/10">
                                        <div class="flex justify-between items-start mb-4">
                                            <span class="material-symbols-outlined text-[32px] text-slate-400 dark:text-slate-500 peer-checked:text-primary transition-colors">fingerprint</span>
                                            <span class="material-symbols-outlined text-primary text-[20px] opacity-0 peer-checked:opacity-100 transition-opacity">check</span>
                                        </div>
                                        <span class="font-bold text-sm block mb-1">Fingerprint</span>
                                        <span class="text-xs text-slate-500 dark:text-slate-400">Dedicated Scanner Hardware</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr x-show="requiresGeofence" x-transition class="border-slate-100 dark:border-slate-700" />
            
            {{-- ============================================================ --}}
            {{-- LOCATION & GEOFENCE SECTION                                --}}
            {{-- ============================================================ --}}

            @once
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
            @endonce

            <div x-show="requiresGeofence" x-transition class="flex flex-col gap-6" x-data="geofenceMap('{{ old('latitude', session('adhoc_room_draft.latitude', '')) }}', '{{ old('longitude', session('adhoc_room_draft.longitude', '')) }}', '{{ old('geofence_radius', session('adhoc_room_draft.geofence_radius', 50)) }}', '{{ old('geofence_shape', session('adhoc_room_draft.geofence_shape', 'circle')) }}', '{{ old('geofence_polygon', session('adhoc_room_draft.geofence_polygon', '')) }}')" x-init="init()" id="section-location">

                <div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white">Location &amp; Geofence</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Set the physical center point and
                        attendance boundary.</p>
                </div>

                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <span class="material-symbols-outlined text-slate-400">search</span>
                    </div>
                    <input x-model="searchQuery" @keydown.enter.prevent="searchAddress()"
                        class="block w-full rounded-lg border border-slate-200 bg-slate-50 py-3 pl-10 pr-28 text-sm placeholder-slate-500 hover:border-slate-300 focus:outline-none focus:border-primary focus:bg-white focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:placeholder-slate-400 dark:text-white transition-all shadow-sm"
                        placeholder="Search address, city or coordinates..." type="text" />
                    <button type="button" @click="locateMe()" :disabled="locating"
                        class="absolute inset-y-1 right-1 flex items-center gap-1 rounded-md bg-white px-3 text-xs font-semibold text-slate-600 hover:bg-slate-100 border border-slate-200 shadow-sm dark:bg-slate-700 dark:border-slate-600 dark:text-slate-200 dark:hover:bg-slate-600 transition-colors disabled:opacity-60">
                        <span class="material-symbols-outlined text-[14px]" :class="locating ? 'animate-spin' : ''"
                            x-text="locating ? 'progress_activity' : 'my_location'"></span>
                        <span x-text="locating ? 'Locating…' : 'Locate Me'"></span>
                    </button>
                </div>

                <p x-show="statusMsg" x-text="statusMsg" x-transition class="text-xs text-red-500 -mt-4 px-1"></p>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <div
                        class="lg:col-span-2 h-[420px] w-full overflow-hidden rounded-xl border border-slate-200 dark:border-slate-700 shadow-inner">
                        <div id="geofence-map" class="h-full w-full" style="z-index: 0;"></div>
                    </div>

                    <div
                        class="lg:col-span-1 flex flex-col gap-5 rounded-xl bg-slate-50 p-5 border border-slate-100 dark:bg-slate-800/50 dark:border-slate-700">

                        <div class="flex items-center gap-2 text-slate-900 dark:text-white">
                            <span class="material-symbols-outlined text-primary">radar</span>
                            <h4 class="font-bold text-sm">Geofence Settings</h4>
                        </div>

                        <div class="space-y-3">
                            <label class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Shape</label>
                            <div class="grid grid-cols-2 gap-2">
                                <button type="button" @click="switchShape('circle')"
                                    :class="shape === 'circle'
                                        ? 'border-2 border-primary bg-primary/5 text-primary dark:bg-primary/20'
                                        : 'border border-slate-200 bg-white text-slate-600 hover:border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300'"
                                    class="flex flex-col items-center justify-center gap-1 rounded-lg p-2 transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">circle</span>
                                    <span class="text-[10px] font-bold">Circle</span>
                                </button>
                                <button type="button" @click="switchShape('polygon')"
                                    :class="shape === 'polygon'
                                        ? 'border-2 border-primary bg-primary/5 text-primary dark:bg-primary/20'
                                        : 'border border-slate-200 bg-white text-slate-600 hover:border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300'"
                                    class="flex flex-col items-center justify-center gap-1 rounded-lg p-2 transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">pentagon</span>
                                    <span class="text-[10px] font-bold">Polygon</span>
                                </button>
                            </div>
                        </div>

                        <div x-show="shape === 'circle'" x-transition class="space-y-5">
                            <div class="space-y-4">
                                <div class="flex justify-between items-center">
                                    <label class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Area Control</label>
                                    <span class="text-xs font-bold text-primary bg-primary/10 px-2 py-1 rounded"
                                        x-text="radius + ' meters'"></span>
                                </div>
                                <input x-model.number="radius" @input="updateOverlay()"
                                    class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-primary dark:bg-slate-700"
                                    max="500" min="10" type="range" />
                                <div class="flex justify-between text-[10px] text-slate-400">
                                    <span>10m</span>
                                    <span>500m</span>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">GPS Coordinates</label>
                                <div class="flex gap-2">
                                    <div class="relative w-full">
                                        <span class="absolute left-2 top-1.5 text-[10px] text-slate-400 font-bold">LAT</span>
                                        <input x-model="lat" @change="onManualCoordChange()"
                                            class="w-full pl-8 pr-2 py-1.5 text-xs font-mono rounded border border-slate-200 bg-white text-slate-700 hover:border-slate-300 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:bg-slate-900 dark:border-slate-600 dark:text-slate-300 transition-all shadow-sm"
                                            type="text" placeholder="—" />
                                    </div>
                                    <div class="relative w-full">
                                        <span class="absolute left-2 top-1.5 text-[10px] text-slate-400 font-bold">LNG</span>
                                        <input x-model="lng" @change="onManualCoordChange()"
                                            class="w-full pl-8 pr-2 py-1.5 text-xs font-mono rounded border border-slate-200 bg-white text-slate-700 hover:border-slate-300 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:bg-slate-900 dark:border-slate-600 dark:text-slate-300 transition-all shadow-sm"
                                            type="text" placeholder="—" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div x-show="shape === 'polygon'" x-transition class="space-y-4">
                            <div class="flex items-center justify-between">
                                <label class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Vertices</label>
                                <span class="text-xs font-bold text-primary bg-primary/10 px-2 py-1 rounded"
                                    x-text="polygonPoints.length + ' point' + (polygonPoints.length !== 1 ? 's' : '') + (polygonClosed ? ' (closed)' : '')"></span>
                            </div>
                            <div class="rounded-lg bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-800 p-3 text-xs text-blue-700 dark:text-blue-300 space-y-1">
                                <p class="font-semibold">How to draw:</p>
                                <ol class="list-decimal list-inside space-y-0.5">
                                    <li>Click the map to add each corner</li>
                                    <li>Add at least 3 vertices</li>
                                    <li>Click <strong>Close</strong> to finish the shape</li>
                                </ol>
                            </div>
                            <div class="flex flex-col gap-2">
                                <button type="button" @click="closePolygon()"
                                    :disabled="polygonPoints.length < 3 || polygonClosed"
                                    class="flex items-center justify-center gap-1.5 w-full rounded-lg bg-primary text-white text-xs font-bold py-2 transition-opacity disabled:opacity-40 disabled:cursor-not-allowed hover:bg-blue-600">
                                    <span class="material-symbols-outlined text-[16px]">check_circle</span>
                                    Close &amp; Finish Polygon
                                </button>
                                <button type="button" @click="undoLastVertex()"
                                    :disabled="polygonPoints.length === 0 || polygonClosed"
                                    class="flex items-center justify-center gap-1.5 w-full rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-xs font-semibold py-2 transition-colors hover:bg-slate-50 dark:hover:bg-slate-700 disabled:opacity-40 disabled:cursor-not-allowed">
                                    <span class="material-symbols-outlined text-[16px]">undo</span>
                                    Undo Last Point
                                </button>
                                <button type="button" @click="clearPolygon()"
                                    :disabled="polygonPoints.length === 0"
                                    class="flex items-center justify-center gap-1.5 w-full rounded-lg border border-red-200 dark:border-red-800 bg-white dark:bg-slate-800 text-red-500 dark:text-red-400 text-xs font-semibold py-2 transition-colors hover:bg-red-50 dark:hover:bg-red-900/20 disabled:opacity-40 disabled:cursor-not-allowed">
                                    <span class="material-symbols-outlined text-[16px]">delete</span>
                                    Clear &amp; Restart
                                </button>
                            </div>
                            <p x-show="polygonPoints.length > 0 && !polygonClosed"
                               class="text-[10px] text-amber-600 dark:text-amber-400 text-center">
                                <span x-show="polygonPoints.length < 3">Add at least <span x-text="3 - polygonPoints.length"></span> more point(s) to close.</span>
                                <span x-show="polygonPoints.length >= 3">Ready to close — click the button above.</span>
                            </p>
                        </div>
                        <div class="mt-auto pt-4 border-t border-slate-200 dark:border-slate-700">
                            <div class="flex gap-3 text-xs text-slate-500 dark:text-slate-400">
                                <span class="material-symbols-outlined text-[16px]">info</span>
                                <p x-show="shape === 'circle'">Drag the marker or click the map to set a location.</p>
                                <p x-show="shape === 'polygon'">Click the map to add corners. Close the shape when done. Switch to Circle to start over.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="latitude"         :value="lat">
                <input type="hidden" name="longitude"        :value="lng">
                <input type="hidden" name="geofence_radius"  :value="shape === 'circle' ? radius : ''">
                <input type="hidden" name="geofence_shape"   :value="shape">
                <input type="hidden" name="geofence_polygon" :value="polygonJson">

            </div>

            @once
                <script>
                    function geofenceMap(initLat, initLng, initRadius, initShape, initPolygon) {
                        return {
                            map:            null,
                            marker:         null,
                            overlay:        null,
                            lat:            initLat,
                            lng:            initLng,
                            radius:         parseInt(initRadius) || 50,
                            shape:          initShape,
                            locating:       false,
                            searchQuery:    '',
                            statusMsg:      '',
                            polygonPoints:  [],
                            polygonMarkers: [],
                            polygonLine:    null,
                            polygonClosed:  false,
                            polygonJson:    initPolygon,

                            init() {
                                this.map = L.map('geofence-map', { center: [20, 0], zoom: 2, zoomControl: false });
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; OpenStreetMap', maxZoom: 19
                                }).addTo(this.map);
                                L.control.zoom({ position: 'bottomright' }).addTo(this.map);

                                this.map.on('click', (e) => {
                                    if (this.shape === 'polygon') this.addPolygonVertex(e.latlng);
                                    else {
                                        this.map.setView(e.latlng, Math.max(this.map.getZoom(), 15));
                                        this.setPin(e.latlng.lat, e.latlng.lng);
                                    }
                                });

                                if (this.lat && this.lng) {
                                    this.map.setView([parseFloat(this.lat), parseFloat(this.lng)], 17);
                                    if (this.shape === 'circle') this.setPin(this.lat, this.lng);
                                    else if (this.shape === 'polygon' && this.polygonJson) {
                                        try {
                                            const ring = JSON.parse(this.polygonJson);
                                            const style = { color: '#3b82f6', fillColor: '#3b82f6', fillOpacity: 0.15, weight: 2, dashArray: '6 4' };
                                            this.overlay = L.polygon(ring, style).addTo(this.map);
                                            this.polygonPoints = ring.slice(0, -1);
                                            this.polygonClosed = true;
                                        } catch (e) {}
                                    }
                                } else {
                                    this.locateMe();
                                }
                            },
                            switchShape(newShape) {
                                if (this.shape === newShape) return;
                                if (this.shape === 'circle') {
                                    if (this.marker)  { this.marker.remove();  this.marker  = null; }
                                    if (this.overlay) { this.overlay.remove(); this.overlay = null; }
                                } else if (this.shape === 'polygon') {
                                    this.clearPolygon();
                                }
                                this.shape = newShape;
                            },
                            locateMe() {
                                if (!navigator.geolocation) { this.statusMsg = 'Geolocation not supported.'; return; }
                                this.locating = true; this.statusMsg = '';
                                navigator.geolocation.getCurrentPosition(
                                    (pos) => {
                                        this.locating = false;
                                        const { latitude, longitude } = pos.coords;
                                        this.map.setView([latitude, longitude], 17);
                                        if (this.shape === 'circle') this.setPin(latitude, longitude);
                                    },
                                    (err) => {
                                        this.locating = false;
                                        const msgs = { 1: 'Location access denied.', 2: 'Location could not be determined.', 3: 'Location request timed out.' };
                                        this.statusMsg = msgs[err.code] || 'Could not retrieve location.';
                                    },
                                    { timeout: 10000, enableHighAccuracy: true }
                                );
                            },
                            searchAddress() {
                                const q = this.searchQuery.trim();
                                if (!q) return;
                                this.statusMsg = '';
                                axios.get('https://nominatim.openstreetmap.org/search', { params: { q, format: 'json', limit: 1 }, headers: { 'Accept-Language': 'en' } }).then((res) => {
                                    if (!res.data.length) { this.statusMsg = 'Address not found.'; return; }
                                    const { lat, lon, display_name } = res.data[0];
                                    this.map.setView([lat, lon], 17);
                                    if (this.shape === 'circle') this.setPin(parseFloat(lat), parseFloat(lon));
                                    this.searchQuery = display_name;
                                }).catch(() => { this.statusMsg = 'Geocoding request failed.'; });
                            },
                            setPin(lat, lng) {
                                this.lat = parseFloat(lat).toFixed(6); this.lng = parseFloat(lng).toFixed(6);
                                if (this.marker) { this.marker.remove(); this.marker = null; }
                                this.marker = L.marker([lat, lng], { draggable: true }).addTo(this.map);
                                this.marker.on('dragend', (e) => {
                                    const pos = e.target.getLatLng();
                                    this.lat = pos.lat.toFixed(6); this.lng = pos.lng.toFixed(6);
                                    this.updateOverlay();
                                });
                                this.updateOverlay();
                            },
                            updateOverlay() {
                                if (this.shape !== 'circle' || !this.lat || !this.lng) return;
                                const center = [parseFloat(this.lat), parseFloat(this.lng)];
                                const style = { color: '#3b82f6', fillColor: '#3b82f6', fillOpacity: 0.15, weight: 2, dashArray: '6 4' };
                                if (this.overlay) { this.overlay.remove(); this.overlay = null; }
                                this.overlay = L.circle(center, { radius: parseInt(this.radius), ...style }).addTo(this.map);
                                if (this.marker) { this.marker.setLatLng(center); }
                            },
                            onManualCoordChange() {
                                const lat = parseFloat(this.lat); const lng = parseFloat(this.lng);
                                if (isNaN(lat) || isNaN(lng)) return;
                                this.map.setView([lat, lng], Math.max(this.map.getZoom(), 15));
                                this.setPin(lat, lng);
                            },
                            addPolygonVertex(latlng) {
                                if (this.polygonClosed) return;
                                this.polygonPoints.push([latlng.lat, latlng.lng]);
                                const vm = L.circleMarker(latlng, { radius: 5, color: '#3b82f6', fillColor: '#3b82f6', fillOpacity: 1, weight: 2 }).addTo(this.map);
                                this.polygonMarkers.push(vm);
                                this._redrawPolyline();
                            },
                            closePolygon() {
                                if (this.polygonPoints.length < 3 || this.polygonClosed) return;
                                const ring = [...this.polygonPoints, this.polygonPoints[0]];
                                if (this.polygonLine) { this.polygonLine.remove(); this.polygonLine = null; }
                                const style = { color: '#3b82f6', fillColor: '#3b82f6', fillOpacity: 0.15, weight: 2, dashArray: '6 4' };
                                if (this.overlay) { this.overlay.remove(); }
                                this.overlay = L.polygon(ring, style).addTo(this.map);
                                const avgLat = this.polygonPoints.reduce((s, p) => s + p[0], 0) / this.polygonPoints.length;
                                const avgLng = this.polygonPoints.reduce((s, p) => s + p[1], 0) / this.polygonPoints.length;
                                this.lat = avgLat.toFixed(6); this.lng = avgLng.toFixed(6);
                                this.polygonJson = JSON.stringify(ring);
                                this.polygonClosed = true;
                            },
                            undoLastVertex() {
                                if (!this.polygonPoints.length || this.polygonClosed) return;
                                this.polygonPoints.pop();
                                const lastMarker = this.polygonMarkers.pop();
                                if (lastMarker) lastMarker.remove();
                                if (!this.polygonPoints.length) {
                                    if (this.polygonLine) { this.polygonLine.remove(); this.polygonLine = null; }
                                    return;
                                }
                                this._redrawPolyline();
                            },
                            clearPolygon() {
                                this.polygonPoints = []; this.polygonClosed = false; this.polygonJson = ''; this.lat = ''; this.lng = '';
                                this.polygonMarkers.forEach(m => m.remove()); this.polygonMarkers = [];
                                if (this.polygonLine) { this.polygonLine.remove(); this.polygonLine = null; }
                                if (this.overlay) { this.overlay.remove(); this.overlay = null; }
                            },
                            _redrawPolyline() {
                                if (this.polygonLine) { this.polygonLine.remove(); this.polygonLine = null; }
                                if (this.polygonPoints.length < 2) return;
                                this.polygonLine = L.polyline(this.polygonPoints, { color: '#3b82f6', weight: 2, dashArray: '4 4' }).addTo(this.map);
                            },
                        };
                    }
                </script>
            @endonce

            <hr class="border-slate-100 dark:border-slate-700" />
            
            {{-- ============================================================ --}}
            {{-- ACTIVATION PERIOD SECTION                                     --}}
            {{-- ============================================================ --}}
            <div class="flex flex-col gap-6 pt-2" id="section-activation">
                <div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white">Activation Period</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Define when this adhoc room becomes active and for how long.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Start Date</label>
                        <input
                            class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-lg font-mono font-bold text-slate-800 hover:border-slate-300 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800/70 dark:text-white transition-all shadow-sm"
                            type="date"
                            name="activation_date"
                            
                            value="{{ old('activation_date', session('adhoc_room_draft.activation_date', '')) }}"
                        />
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Start Time</label>
                        <input
                            class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-lg font-mono font-bold text-slate-800 hover:border-slate-300 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800/70 dark:text-white transition-all shadow-sm"
                            type="time"
                            name="activation_time"
                            
                            value="{{ old('activation_time', session('adhoc_room_draft.activation_time', '')) }}"
                        />
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Duration (Minutes)</label>
                        <div class="relative">
                            <input
                                class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 pr-12 text-lg font-mono font-bold text-slate-800 hover:border-slate-300 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800/70 dark:text-white transition-all shadow-sm"
                                type="number"
                                min="1"
                                name="activation_duration"
                               
                                value="{{ old('activation_duration', session('adhoc_room_draft.activation_duration', '60')) }}"
                            />
                            <span class="absolute right-4 top-3 text-sm font-bold text-slate-400">MIN</span>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-slate-100 dark:border-slate-700" />
            
            {{-- ============================================================ --}}
            {{-- QUESTIONS & FEEDBACK SECTION                                 --}}
            {{-- ============================================================ --}}
            <div class="flex flex-col gap-6 pt-2" id="section-questions" x-data="questionsManager()" @validate-questions.window="if(validate()) $el.closest('form').submit()">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">Questions &amp; Feedback</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Ask attendees up to 5 questions when they mark their attendance.</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <template x-for="(q, index) in questions" :key="q.id">
                        <div class="rounded-xl border border-slate-200 bg-slate-50 p-5 dark:border-slate-700 dark:bg-slate-800/50 relative group">
                            <button type="button" @click="removeQuestion(index)" class="absolute top-4 right-4 text-slate-400 hover:text-red-500 transition-colors opacity-0 group-hover:opacity-100">
                                <span class="material-symbols-outlined text-[20px]">delete</span>
                            </button>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                <div class="md:col-span-2 space-y-1">
                                    <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Question Title</label>
                                    <input type="text" x-model="q.title" :name="`questions[${index}][title]`" 
                                           class="w-full rounded-lg border px-3 py-2 text-sm hover:border-slate-300 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:bg-slate-900 dark:text-white transition-all shadow-sm"
                                           :class="showErrors && !q.title.trim() ? 'border-red-500 dark:border-red-500' : 'border-slate-200 dark:border-slate-600'"
                                           placeholder="e.g. How was the event?" />
                                </div>
                                <div class="space-y-1">
                                    <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Type</label>
                                    <select x-model="q.type" :name="`questions[${index}][type]`" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm hover:border-slate-300 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:bg-slate-900 dark:border-slate-600 dark:text-white transition-all shadow-sm">
                                        <option value="text">Short Answer</option>
                                        <option value="radio">Single Choice (Radio)</option>
                                        <option value="checkbox">Multiple Choice (Checkboxes)</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Options for Radio/Checkbox -->
                            <div x-show="q.type === 'radio' || q.type === 'checkbox'" x-transition class="space-y-2 mt-4 ml-4 pl-4 border-l-2 border-slate-200 dark:border-slate-700">
                                <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Options</label>
                                <template x-for="(opt, optIndex) in q.options" :key="optIndex">
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="material-symbols-outlined text-slate-400 text-[16px]" x-text="q.type === 'radio' ? 'radio_button_unchecked' : 'check_box_outline_blank'"></span>
                                        <input type="text" x-model="q.options[optIndex]" :name="`questions[${index}][options][]`" 
                                               class="flex-1 rounded-md border bg-transparent px-3 py-1.5 text-sm hover:border-slate-300 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary focus:bg-white dark:text-white dark:focus:bg-slate-900 transition-all shadow-sm cursor-text" 
                                               :class="showErrors && !q.options[optIndex].trim() ? 'border-red-500 dark:border-red-500' : 'border-slate-200 dark:border-slate-600'"
                                               placeholder="Option text..." />
                                        <button type="button" @click="removeOption(index, optIndex)" class="text-slate-400 hover:text-red-500">
                                            <span class="material-symbols-outlined text-[16px]">close</span>
                                        </button>
                                    </div>
                                </template>
                                <button type="button" @click="addOption(index)" class="flex items-center gap-1 text-sm font-semibold text-primary hover:text-blue-600 mt-2">
                                    <span class="material-symbols-outlined text-[16px]">add</span> Add Option
                                </button>
                                <p x-show="showErrors && (q.type === 'radio' || q.type === 'checkbox') && q.options.length === 0" class="text-xs text-red-500 mt-1">At least one option is required.</p>
                            </div>
                        </div>
                    </template>
                    
                    <button type="button" @click="addQuestion()" x-show="questions.length < 5" class="flex items-center justify-center gap-2 w-full rounded-xl border-2 border-dashed border-slate-300 py-4 text-sm font-bold text-slate-500 hover:border-primary hover:bg-primary/5 hover:text-primary transition-colors dark:border-slate-600 dark:text-slate-400 dark:hover:border-primary dark:hover:text-primary">
                        <span class="material-symbols-outlined">add_circle</span>
                        Add Question
                    </button>
                    <p x-show="questions.length >= 5" class="text-xs text-center text-slate-500">You have reached the maximum of 5 questions.</p>
                    <div x-show="showErrors" x-transition class="p-3 rounded-lg bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 flex items-center gap-2 text-red-600 dark:text-red-400 text-sm">
                        <span class="material-symbols-outlined text-[18px]">error</span>
                        <p>Please fix the errors in your questions before continuing.</p>
                    </div>
                </div>
            </div>
            
            @once
                <script>
                    function questionsManager() {
                        return {
                            questions: @json(old('questions', session('adhoc_room_draft.questions', []))),
                            init() {
                                if (this.questions.length === 0) {
                                    // this.addQuestion(); // Optional: start with 1 empty question
                                }
                            },
                            addQuestion() {
                                if (this.questions.length >= 5) return;
                                this.questions.push({
                                    id: Date.now().toString(),
                                    title: '',
                                    type: 'text',
                                    options: ['']
                                });
                            },
                            removeQuestion(index) {
                                this.questions.splice(index, 1);
                            },
                            addOption(qIndex) {
                                this.questions[qIndex].options.push("");
                            },
                            removeOption(qIndex, optIndex) {
                                if (this.questions[qIndex].options.length > 1) {
                                    this.questions[qIndex].options.splice(optIndex, 1);
                                } else {
                                    this.questions[qIndex].options[optIndex] = "";
                                }
                            },
                            showErrors: false,
                            validate() {
                                this.showErrors = false;
                                let isValid = true;
                                
                                for (let q of this.questions) {
                                    if (!q.title.trim()) isValid = false;
                                    if (q.type === 'radio' || q.type === 'checkbox') {
                                        if (q.options.length === 0) isValid = false;
                                        if (q.options.some(opt => !opt.trim())) isValid = false;
                                    }
                                }
                                
                                if (!isValid) {
                                    this.showErrors = true;
                                    // Scroll to the questions section if there are errors
                                    document.getElementById('section-questions').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                }
                                
                                return isValid;
                            }
                        };
                    }
                </script>
            @endonce

        </div>

        <div class="mt-8 flex justify-end gap-4">
            <a href="{{ route('rooms.adhoc.index') }}"
                class="px-6 py-2.5 rounded-lg text-sm font-bold text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">
                Cancel
            </a>
            <button type="button" @click="$dispatch('validate-questions')"
                class="flex items-center gap-2 px-6 py-2.5 rounded-lg bg-primary text-white text-sm font-bold shadow-lg shadow-primary/30 hover:bg-blue-600 transition-all active:scale-95">
                Next: Review
                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </button>
        </div>
        </form>
    </div>

    <script>
        (function () {
            const DRAFT_KEY = 'adhoc_room_draft';

            const TEXT_FIELDS = [
                ['roomName',    'name'],
                ['description', 'description'],
                ['wifiBSSID',   'wifi_bssid'],
            ];

            TEXT_FIELDS.forEach(([id, field]) => {
                const el = document.getElementById(id);
                if (!el) return;
                el.addEventListener('input', () => {
                    const draft = JSON.parse(localStorage.getItem(DRAFT_KEY) || '{}');
                    draft[field] = el.value;
                    localStorage.setItem(DRAFT_KEY, JSON.stringify(draft));
                });
            });

            document.addEventListener('DOMContentLoaded', () => {
                const draft = JSON.parse(localStorage.getItem(DRAFT_KEY) || '{}');
                TEXT_FIELDS.forEach(([id, field]) => {
                    const el = document.getElementById(id);
                    if (!el || el.value.trim() !== '') return;
                    if (draft[field]) el.value = draft[field];
                });
            });

            const form = document.getElementById('create-adhoc-form');
            if (form) {
                form.addEventListener('submit', () => {
                    localStorage.removeItem(DRAFT_KEY);
                });
            }
        })();
    </script>
</x-app-layout>