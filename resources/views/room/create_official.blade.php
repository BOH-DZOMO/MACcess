<x-app-layout title="Create Official Room">


    <div class="mx-auto max-w-5xl">
        <nav class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 mb-6">
            <a class="hover:text-primary transition-colors" href="#">Rooms</a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <span class="font-semibold text-slate-900 dark:text-white">Create New</span>
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
                    <div class="flex items-center gap-2 border-b-[3px] border-transparent pb-3 px-1">
                        <div
                            class="flex size-6 items-center justify-center rounded-full bg-slate-200 text-[12px] font-bold text-slate-500 dark:bg-slate-700 dark:text-slate-400">
                            2</div>
                        <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Review</span>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="flex flex-col gap-8 rounded-xl bg-white p-6 shadow-sm border border-slate-200 dark:bg-[#1e2736] dark:border-slate-700 dark:shadow-none">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4">Room Details</h3>
                </div>
                <div class="col-span-1 md:col-span-2 space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300" for="roomName">Room Name <span
                            class="text-red-500">*</span></label>
                    <input
                        class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 transition-shadow"
                        id="roomName" placeholder="e.g. Main Conference Hall A" type="text" />
                </div>
                <div class="col-span-1 md:col-span-2 space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300"
                        for="description">Description</label>
                    <textarea
                        class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 resize-none transition-shadow"
                        id="description" placeholder="Briefly describe the purpose of this attendance room..." rows="3"></textarea>
                </div>
            </div>
            <hr class="border-slate-100 dark:border-slate-700" />
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="col-span-1 md:col-span-2">
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
                            class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 pl-10 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 transition-shadow"
                            id="wifiBSSID" placeholder="xx:xx:xx:xx:xx:xx" type="text" />
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
                        <div
                            class="flex items-center gap-4 rounded-xl border border-primary/20 bg-primary/5 px-4 py-3 dark:bg-primary/10 dark:border-primary/30">
                            <div
                                class="flex size-10 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary">
                                <span class="material-symbols-outlined">location_on</span>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-bold text-slate-900 dark:text-white">Geofencing
                                    Active</p>
                                <p class="text-xs text-slate-600 dark:text-slate-400">Users must be within
                                    the location boundary. This is a default, non-removable requirement.</p>
                            </div>
                            <span class="material-symbols-outlined text-slate-400"
                                title="This setting is locked">lock</span>
                        </div>
                        <div class="space-y-2">
                            <p
                                class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                                Additional Verification(select one or more)</p>
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-2">
                                <label class="relative cursor-pointer group">
                                    <input class="peer sr-only" name="verification_type[]" type="checkbox" value="fingerprint" />
                                    <div class="flex flex-col h-full rounded-xl border-2 border-slate-200 bg-white p-5 transition-all hover:bg-slate-50 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700 dark:peer-checked:bg-primary/10">
                                        <div class="flex justify-between items-start mb-4">
                                            <span class="material-symbols-outlined text-[32px] text-slate-400 dark:text-slate-500 peer-checked:text-primary transition-colors">fingerprint</span>
                                            <span class="material-symbols-outlined text-primary text-[20px] opacity-0 peer-checked:opacity-100 transition-opacity">check</span>
                                        </div>
                                        <span class="font-bold text-sm block mb-1">Fingerprint</span>
                                        <span class="text-xs text-slate-500 dark:text-slate-400">Dedicated Scanner Hardware</span>
                                    </div>
                                </label>

                                <label class="relative cursor-pointer group">
                                    <input class="peer sr-only" name="verification_type[]" type="checkbox" value="qr" />
                                    <div class="flex flex-col h-full rounded-xl border-2 border-slate-200 bg-white p-5 transition-all hover:bg-slate-50 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700 dark:peer-checked:bg-primary/10">
                                        <div class="flex justify-between items-start mb-4">
                                            <span class="material-symbols-outlined text-[32px] text-slate-400 dark:text-slate-500 peer-checked:text-primary transition-colors">qr_code_scanner</span>
                                            <span class="material-symbols-outlined text-primary text-[20px] opacity-0 peer-checked:opacity-100 transition-opacity">check</span>
                                        </div>
                                        <span class="font-bold text-sm block mb-1">QR Code</span>
                                        <span class="text-xs text-slate-500 dark:text-slate-400">Scan dynamic code on entry</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="border-slate-100 dark:border-slate-700" />
            {{-- ============================================================ --}}
            {{-- LOCATION & GEOFENCE SECTION                                --}}
            {{-- Powered by: Leaflet.js + OpenStreetMap + Alpine.js + Axios --}}
            {{-- ============================================================ --}}

            {{-- Leaflet CSS & JS — loaded once per page via CDN --}}
            @once
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
            @endonce

            <div class="flex flex-col gap-6" x-data="geofenceMap()" x-init="init()">

                {{-- Section Header --}}
                <div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white">Location &amp; Geofence</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Set the physical center point and
                        attendance boundary.</p>
                </div>

                {{-- Address Search + Locate Me --}}
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <span class="material-symbols-outlined text-slate-400">search</span>
                    </div>
                    <input x-model="searchQuery" @keydown.enter.prevent="searchAddress()"
                        class="block w-full rounded-lg border-slate-200 bg-slate-50 py-3 pl-10 pr-28 text-sm placeholder-slate-500 focus:border-primary focus:bg-white focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:placeholder-slate-400 dark:text-white transition-all shadow-sm"
                        placeholder="Search address, city or coordinates..." type="text" />
                    {{-- Locate Me (GPS) --}}
                    <button type="button" @click="locateMe()" :disabled="locating"
                        class="absolute inset-y-1 right-1 flex items-center gap-1 rounded-md bg-white px-3 text-xs font-semibold text-slate-600 hover:bg-slate-100 border border-slate-200 shadow-sm dark:bg-slate-700 dark:border-slate-600 dark:text-slate-200 dark:hover:bg-slate-600 transition-colors disabled:opacity-60">
                        <span class="material-symbols-outlined text-[14px]" :class="locating ? 'animate-spin' : ''"
                            x-text="locating ? 'progress_activity' : 'my_location'"></span>
                        <span x-text="locating ? 'Locating…' : 'Locate Me'"></span>
                    </button>
                </div>

                {{-- Status / error message --}}
                <p x-show="statusMsg" x-text="statusMsg" x-transition class="text-xs text-red-500 -mt-4 px-1"></p>

                {{-- Map + Sidebar Grid --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    {{-- ── Leaflet Map Container ── --}}
                    <div
                        class="lg:col-span-2 h-[420px] w-full overflow-hidden rounded-xl border border-slate-200 dark:border-slate-700 shadow-inner">
                        <div id="geofence-map" class="h-full w-full" style="z-index: 0;"></div>
                    </div>

                    {{-- ── Geofence Settings Sidebar ── --}}
                    <div
                        class="lg:col-span-1 flex flex-col gap-5 rounded-xl bg-slate-50 p-5 border border-slate-100 dark:bg-slate-800/50 dark:border-slate-700">

                        <div class="flex items-center gap-2 text-slate-900 dark:text-white">
                            <span class="material-symbols-outlined text-primary">radar</span>
                            <h4 class="font-bold text-sm">Geofence Settings</h4>
                        </div>

                        {{-- Shape Selector --}}
                        <div class="space-y-3">
                            <label
                                class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Shape</label>
                            <div class="grid grid-cols-3 gap-2">
                                <template
                                    x-for="s in [
                                                { key: 'circle',  icon: 'circle',  label: 'Circle'  },
                                                { key: 'square',  icon: 'square',  label: 'Square'  },
                                                { key: 'polygon', icon: 'pentagon', label: 'Polygon' },
                                            ]"
                                    :key="s.key">
                                    <button type="button" @click="shape = s.key; updateOverlay()"
                                        :class="shape === s.key ?
                                            'border-2 border-primary bg-primary/5 text-primary dark:bg-primary/20' :
                                            'border border-slate-200 bg-white text-slate-600 hover:border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300'"
                                        class="flex flex-col items-center justify-center gap-1 rounded-lg p-2 transition-colors">
                                        <span class="material-symbols-outlined text-[20px]" x-text="s.icon"></span>
                                        <span class="text-[10px] font-bold" x-text="s.label"></span>
                                    </button>
                                </template>
                            </div>
                        </div>

                        {{-- Radius Slider --}}
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <label
                                    class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Area
                                    Control</label>
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

                        {{-- GPS Coordinate Inputs (visible, editable) --}}
                        <div class="space-y-2 pt-2">
                            <label
                                class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">GPS
                                Coordinates</label>
                            <div class="flex gap-2">
                                <div class="relative w-full">
                                    <span
                                        class="absolute left-2 top-1.5 text-[10px] text-slate-400 font-bold">LAT</span>
                                    <input x-model="lat" @change="onManualCoordChange()"
                                        class="w-full pl-8 pr-2 py-1.5 text-xs font-mono rounded border-slate-200 bg-white text-slate-700 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:bg-slate-900 dark:border-slate-600 dark:text-slate-300 transition-shadow"
                                        type="text" placeholder="—" />
                                </div>
                                <div class="relative w-full">
                                    <span
                                        class="absolute left-2 top-1.5 text-[10px] text-slate-400 font-bold">LNG</span>
                                    <input x-model="lng" @change="onManualCoordChange()"
                                        class="w-full pl-8 pr-2 py-1.5 text-xs font-mono rounded border-slate-200 bg-white text-slate-700 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:bg-slate-900 dark:border-slate-600 dark:text-slate-300 transition-shadow"
                                        type="text" placeholder="—" />
                                </div>
                            </div>
                        </div>

                        {{-- Info Footer --}}
                        <div class="mt-auto pt-4 border-t border-slate-200 dark:border-slate-700">
                            <div class="flex gap-3 text-xs text-slate-500 dark:text-slate-400">
                                <span class="material-symbols-outlined text-[16px]">info</span>
                                <p>Drag the marker or click the map to set a location. Type coordinates to reposition
                                    manually.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ════════════════════════════════════════════════════════════ --}}
                {{-- Hidden inputs — these are what the backend form receives     --}}
                {{-- ════════════════════════════════════════════════════════════ --}}
                <input type="hidden" name="latitude" :value="lat">
                <input type="hidden" name="longitude" :value="lng">
                <input type="hidden" name="geofence_radius" :value="radius">
                <input type="hidden" name="geofence_shape" :value="shape">

            </div>{{-- /geofenceMap Alpine component --}}

            {{-- ============================================================ --}}
            {{-- geofenceMap() — Alpine.js component definition               --}}
            {{-- ============================================================ --}}
            @once
                <script>
                    function geofenceMap() {
                        return {
                            // ── State ──────────────────────────────────────────────
                            map: null, // Leaflet map instance
                            marker: null, // Draggable marker
                            overlay: null, // Active geofence shape layer
                            lat: '', // Current latitude (string for input binding)
                            lng: '', // Current longitude
                            radius: 50, // Geofence radius in metres
                            shape: 'circle', // 'circle' | 'square' | 'polygon'
                            locating: false, // GPS loading state
                            searchQuery: '', // Address search input
                            statusMsg: '', // Error / info message shown to user

                            // ── Lifecycle ──────────────────────────────────────────
                            init() {
                                // Mount Leaflet — default view is a neutral world zoom
                                // (no specific city pre-selected; GPS or search sets the real location)
                                this.map = L.map('geofence-map', {
                                    center: [20, 0],
                                    zoom: 2,
                                    zoomControl: false,
                                });

                                // OpenStreetMap tiles (free, no API key required)
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap</a> contributors',
                                    maxZoom: 19,
                                }).addTo(this.map);

                                // Zoom control — bottom-right to avoid sidebar overlap
                                L.control.zoom({
                                    position: 'bottomright'
                                }).addTo(this.map);

                                // Click anywhere on the map to place / move the pin
                                this.map.on('click', (e) => {
                                    this.map.setView(e.latlng, Math.max(this.map.getZoom(), 15));
                                    this.setPin(e.latlng.lat, e.latlng.lng);
                                });

                                // Auto-locate on load — silently pan to the user's area
                                // If GPS is denied or unavailable the world view is kept as fallback
                                this.locateMe();
                            },

                            // ── GPS: "Locate Me" button ────────────────────────────
                            locateMe() {
                                if (!navigator.geolocation) {
                                    this.statusMsg = 'Geolocation is not supported by your browser.';
                                    return;
                                }
                                this.locating = true;
                                this.statusMsg = '';

                                navigator.geolocation.getCurrentPosition(
                                    // Success callback
                                    (pos) => {
                                        this.locating = false;
                                        const {
                                            latitude,
                                            longitude
                                        } = pos.coords;
                                        this.map.setView([latitude, longitude], 17);
                                        this.setPin(latitude, longitude);
                                    },
                                    // Error callback
                                    (err) => {
                                        this.locating = false;
                                        const msgs = {
                                            1: 'Location access denied. Please allow location access in your browser settings.',
                                            2: 'Your location could not be determined. Try again.',
                                            3: 'Location request timed out. Try again.',
                                        };
                                        this.statusMsg = msgs[err.code] || 'Could not retrieve location.';
                                    }, {
                                        timeout: 10000,
                                        enableHighAccuracy: true
                                    }
                                );
                            },

                            // ── Geocoding: address search via Nominatim + Axios ────
                            searchAddress() {
                                const q = this.searchQuery.trim();
                                if (!q) return;
                                this.statusMsg = '';

                                axios.get('https://nominatim.openstreetmap.org/search', {
                                    params: {
                                        q,
                                        format: 'json',
                                        limit: 1
                                    },
                                    headers: {
                                        'Accept-Language': 'en'
                                    },
                                }).then((res) => {
                                    if (!res.data.length) {
                                        this.statusMsg = 'Address not found. Try a more specific search term.';
                                        return;
                                    }
                                    const {
                                        lat,
                                        lon,
                                        display_name
                                    } = res.data[0];
                                    this.map.setView([lat, lon], 17);
                                    this.setPin(parseFloat(lat), parseFloat(lon));
                                    // Reflect the resolved display name back into the search bar
                                    this.searchQuery = display_name;
                                }).catch(() => {
                                    this.statusMsg = 'Geocoding request failed. Please check your connection.';
                                });
                            },

                            // ── Place / move pin + redraw overlay ─────────────────
                            setPin(lat, lng) {
                                this.lat = parseFloat(lat).toFixed(6);
                                this.lng = parseFloat(lng).toFixed(6);

                                // Remove the old marker gracefully
                                if (this.marker) {
                                    this.marker.remove();
                                    this.marker = null;
                                }

                                // Drop a new draggable marker
                                this.marker = L.marker([lat, lng], {
                                    draggable: true
                                }).addTo(this.map);

                                // Sync LAT/LNG inputs + redraw overlay when marker is dragged
                                this.marker.on('dragend', (e) => {
                                    const pos = e.target.getLatLng();
                                    this.lat = pos.lat.toFixed(6);
                                    this.lng = pos.lng.toFixed(6);
                                    this.updateOverlay();
                                });

                                this.updateOverlay();
                            },

                            // ── Redraw the geofence overlay layer ─────────────────
                            updateOverlay() {
                                if (!this.lat || !this.lng) return;

                                const center = [parseFloat(this.lat), parseFloat(this.lng)];
                                const r = parseInt(this.radius);

                                // Shared style options
                                const style = {
                                    color: '#3b82f6',
                                    fillColor: '#3b82f6',
                                    fillOpacity: 0.15,
                                    weight: 2,
                                    dashArray: '6 4',
                                };

                                // Remove the previous overlay
                                if (this.overlay) {
                                    this.overlay.remove();
                                    this.overlay = null;
                                }

                                if (this.shape === 'circle') {
                                    // ── Circle ───────────────────────────────────
                                    this.overlay = L.circle(center, {
                                        radius: r,
                                        ...style
                                    }).addTo(this.map);

                                } else if (this.shape === 'square') {
                                    // ── Square (axis-aligned rectangle) ──────────
                                    // Convert radius in metres → degrees (approx)
                                    const dLat = r / 111320;
                                    const dLng = r / (111320 * Math.cos(center[0] * Math.PI / 180));
                                    const bounds = [
                                        [center[0] - dLat, center[1] - dLng],
                                        [center[0] + dLat, center[1] + dLng],
                                    ];
                                    this.overlay = L.rectangle(bounds, style).addTo(this.map);

                                } else if (this.shape === 'polygon') {
                                    // ── Polygon (regular hexagon approximation) ───
                                    const sides = 6;
                                    const dLat = r / 111320;
                                    const dLng = r / (111320 * Math.cos(center[0] * Math.PI / 180));
                                    const points = [];
                                    for (let i = 0; i < sides; i++) {
                                        const angle = (Math.PI * 2 * i) / sides - Math.PI / 2;
                                        points.push([
                                            center[0] + dLat * Math.sin(angle),
                                            center[1] + dLng * Math.cos(angle),
                                        ]);
                                    }
                                    this.overlay = L.polygon(points, style).addTo(this.map);
                                }

                                // Keep the draggable marker in sync with the overlay centre
                                if (this.marker) {
                                    this.marker.setLatLng(center);
                                }
                            },

                            // ── Manual coordinate input change ────────────────────
                            onManualCoordChange() {
                                const lat = parseFloat(this.lat);
                                const lng = parseFloat(this.lng);
                                if (isNaN(lat) || isNaN(lng)) return;
                                this.map.setView([lat, lng], Math.max(this.map.getZoom(), 15));
                                this.setPin(lat, lng);
                            },
                        };
                    }
                </script>
            @endonce
        </div>

            <hr class="border-slate-100 dark:border-slate-700" />

            {{-- ============================================================ --}}
            {{-- TIMEFRAME WINDOW SECTION                                      --}}
            {{-- Powered by: Alpine.js                                         --}}
            {{-- ============================================================ --}}
            <div class="flex flex-col gap-6 pt-2" x-data="timeframe()" x-init="init()">

                {{-- Section Header --}}
                <div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white">Time Frame Window</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Define when attendance is valid for this room.</p>
                </div>

                {{-- 1 + 2. Timeframe Name & Time Range — single row --}}
                <div class="flex flex-col gap-2">
                    <div class="flex flex-col md:flex-row md:items-center gap-3">

                        {{-- Timeframe Name --}}
                        <div class="flex items-center gap-3 md:flex-1">
                            <label class="text-sm font-medium text-slate-700 dark:text-slate-300 whitespace-nowrap shrink-0" for="shiftLabel">
                                Timeframe Name
                            </label>
                            <input
                                x-model="shiftLabel"
                                class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 transition-shadow"
                                id="shiftLabel"
                                placeholder="e.g., Weekday Morning Shift"
                                type="text"
                                name="timeframe_label"
                            />
                        </div>

                        {{-- Visual divider --}}
                        <div class="hidden md:block w-px self-stretch bg-slate-200 dark:bg-slate-700 shrink-0"></div>

                        {{-- Time Range --}}
                        <div class="flex items-center gap-3 md:flex-1">
                            <label class="text-sm font-medium text-slate-700 dark:text-slate-300 whitespace-nowrap shrink-0">
                                Time Range
                            </label>
                            <div class="flex items-center gap-2 flex-1">

                                {{-- Start Time --}}
                                <input
                                    x-model="startTime"
                                    @change="validateTime()"
                                    class="flex-1 min-w-0 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-lg font-mono font-bold text-slate-800 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary focus:bg-white dark:border-slate-600 dark:bg-slate-800/70 dark:text-white transition-all shadow-sm"
                                    type="time"
                                    name="timeframe_start"
                                />

                                {{-- Separator --}}
                                <span class="text-slate-400 font-bold text-base select-none shrink-0">—</span>

                                {{-- End Time --}}
                                <input
                                    x-model="endTime"
                                    @change="validateTime()"
                                    class="flex-1 min-w-0 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-lg font-mono font-bold text-slate-800 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary focus:bg-white dark:border-slate-600 dark:bg-slate-800/70 dark:text-white transition-all shadow-sm"
                                    type="time"
                                    name="timeframe_end"
                                />
                            </div>
                        </div>
                    </div>

                    {{-- Time Validation Error --}}
                    <p x-show="timeError" x-text="timeError" x-transition class="text-xs text-red-500 flex items-center gap-1 md:justify-end">
                        <span class="material-symbols-outlined text-[14px]">error</span>
                    </p>
                </div>

                {{-- 3. Frequency --}}
                <div class="space-y-4">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Repeat</label>

                    {{-- A. Segmented Control --}}
                    <div class="inline-flex rounded-lg border border-slate-200 dark:border-slate-600 bg-slate-100 dark:bg-slate-800 p-1 gap-1">
                        <template x-for="opt in presetOptions" :key="opt.value">
                            <button
                                type="button"
                                @click="setPreset(opt.value)"
                                :class="preset === opt.value
                                    ? 'bg-primary text-white shadow-sm shadow-primary/30'
                                    : 'text-slate-600 dark:text-slate-300 hover:bg-white dark:hover:bg-slate-700'"
                                class="px-4 py-1.5 rounded-md text-sm font-semibold transition-all"
                                x-text="opt.label">
                            </button>
                        </template>
                    </div>

                    {{-- B. Day Picker --}}
                    <div class="flex gap-2 flex-wrap">
                        <template x-for="(day, index) in days" :key="index">
                            <button
                                type="button"
                                @click="toggleDay(index)"
                                :disabled="preset !== 'custom'"
                                :class="selectedDays.includes(index)
                                    ? 'bg-primary text-white border-primary shadow-sm shadow-primary/20'
                                    : preset !== 'custom'
                                        ? 'bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-600 text-slate-400 dark:text-slate-500 cursor-not-allowed'
                                        : 'bg-white dark:bg-slate-800 border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-300 hover:bg-primary/10 hover:border-primary/40 cursor-pointer'"
                                class="px-3 h-9 rounded-full border-2 flex items-center justify-center text-xs font-bold transition-all select-none"
                                x-text="day">
                            </button>
                        </template>
                    </div>
                    <p class="text-xs text-slate-400 dark:text-slate-500" x-show="preset !== 'custom'">Switch to <span class="font-semibold text-slate-500 dark:text-slate-400">Custom</span> to manually select days.</p>
                </div>

                {{-- Hidden inputs for backend --}}
                <input type="hidden" name="timeframe_days" :value="JSON.stringify(selectedDays)">

            </div>{{-- /timeframe Alpine component --}}

            {{-- ============================================================ --}}
            {{-- timeframe() — Alpine.js component definition                   --}}
            {{-- ============================================================ --}}
            @once
                <script>
                    function timeframe() {
                        return {
                            // ── State ──────────────────────────────────────────────
                            shiftLabel:   '',
                            startTime:    '',
                            endTime:      '',
                            preset:       'weekday',      // 'weekday' | 'weekend' | 'custom'
                            selectedDays: [0,1,2,3,4],   // Mon=0 … Sun=6
                            timeError:    '',

                            presetOptions: [
                                { value: 'weekday', label: 'Mon – Fri' },
                                { value: 'weekend', label: 'Sat – Sun' },
                                { value: 'custom',  label: 'Custom'    },
                            ],
                            days: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],

                            // ── Lifecycle ──────────────────────────────────────────
                            init() {
                                // Pre-select Mon–Fri on load
                                this.setPreset('weekday');
                            },

                            // ── Set Preset ─────────────────────────────────────────
                            setPreset(value) {
                                this.preset = value;
                                if (value === 'weekday') {
                                    this.selectedDays = [0, 1, 2, 3, 4];
                                } else if (value === 'weekend') {
                                    this.selectedDays = [5, 6];
                                } else if (value === 'custom') {
                                    this.selectedDays = [];  // clear — user picks manually
                                }
                            },

                            // ── Toggle individual day (custom mode only) ───────────
                            toggleDay(index) {
                                if (this.preset !== 'custom') return;
                                const pos = this.selectedDays.indexOf(index);
                                if (pos > -1) {
                                    this.selectedDays.splice(pos, 1);
                                } else {
                                    this.selectedDays.push(index);
                                }
                            },

                            // ── Validate time range ────────────────────────────────
                            validateTime() {
                                if (!this.startTime || !this.endTime) {
                                    this.timeError = '';
                                    return;
                                }
                                this.timeError = this.startTime >= this.endTime
                                    ? 'End time must be after start time.'
                                    : '';
                            },
                        };
                    }
                </script>
            @endonce

        </div>
        <div class="mt-8 flex justify-end gap-4">
            <button
                class="px-6 py-2.5 rounded-lg text-sm font-bold text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">
                Cancel
            </button>
            {{-- <a href="{{ route('room.review_official') }}" --}}
            <a href=""
                class="flex items-center gap-2 px-6 py-2.5 rounded-lg bg-primary text-white text-sm font-bold shadow-lg shadow-primary/30 hover:bg-blue-600 transition-all active:scale-95">
                Next: Review
                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </a>
        </div>
    </div>

</x-app-layout>
