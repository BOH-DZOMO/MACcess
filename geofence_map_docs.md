# Geofence Map — Developer Documentation

> **File:** [resources/views/room/create_official.blade.php](file:///c:/Users/HP%20PROBOOK%20650%20G4/Herd/MACcess/resources/views/room/create_official.blade.php)
> **Section:** Location & Geofence (approx. lines 164–527)
> **Stack:** Leaflet 1.9.4 · OpenStreetMap · Alpine.js · Axios

---

## Architecture Overview

```
create_official.blade.php
│
├── @once → <link> Leaflet CSS (CDN)
├── @once → <script> Leaflet JS (CDN)
│
├── <div x-data="geofenceMap()" x-init="init()">   ← Alpine component root
│   ├── Address search input (x-model="searchQuery")
│   ├── "Locate Me" button   (@click="locateMe()")
│   ├── Status/error banner  (x-show="statusMsg")
│   │
│   ├── <div id="geofence-map">   ← Leaflet mounts here
│   │
│   ├── Geofence sidebar
│   │   ├── Shape buttons        (@click="shape = …; updateOverlay()")
│   │   ├── Radius slider        (x-model.number="radius" @input="updateOverlay()")
│   │   └── LAT / LNG inputs     (x-model="lat/lng" @change="onManualCoordChange()")
│   │
│   └── Hidden form inputs       (:value="lat/lng/radius/shape")
│
└── @once → <script> geofenceMap() function definition
```

> **`@once`** means Leaflet's CDN tags and the `geofenceMap()` script are injected into the HTML **only once** even if this partial were ever included multiple times.

---

## Alpine.js Component: `geofenceMap()`

Defined at the bottom of the section inside `@once <script>`. Returns a plain JS object consumed by Alpine's `x-data`.

### State

| Property | Type | Default | Purpose |
|---|---|---|---|
| `map` | `L.Map\|null` | `null` | Leaflet map instance |
| `marker` | `L.Marker\|null` | `null` | Draggable pin |
| `overlay` | `L.Layer\|null` | `null` | Circle / Rectangle / Polygon |
| `lat` | `string` | `''` | Selected latitude (6 d.p.) |
| `lng` | `string` | `''` | Selected longitude (6 d.p.) |
| `radius` | `number` | `50` | Geofence radius in **metres** |
| `shape` | `string` | `'circle'` | `'circle'` · `'square'` · `'polygon'` |
| `locating` | `boolean` | `false` | GPS in-progress flag |
| `searchQuery` | `string` | `''` | Address search box value |
| `statusMsg` | `string` | `''` | Error / info banner text |

---

### Methods

#### `init()`
Called automatically by `x-init`. Mounts Leaflet on `#geofence-map` with an OpenStreetMap tile layer, adds zoom controls (bottom-right), and registers a `click` handler so clicking the map places a pin.

#### `locateMe()`
Triggered by the "Locate Me" button. Uses the **Browser Geolocation API**:
```
navigator.geolocation.getCurrentPosition(success, error, { enableHighAccuracy: true })
```
- Sets `locating = true` → button shows spinner icon and "Locating…" text.
- On **success**: pans map to GPS coords at zoom 17, calls `setPin()`.
- On **error**: sets `statusMsg` with a human-readable message based on `GeolocationPositionError.code` (1 = denied, 2 = unavailable, 3 = timeout).

> **Requires HTTPS** (or `localhost`) for `getCurrentPosition` to work in modern browsers.

#### `searchAddress()`
Triggered on Enter key in the search input. Calls the **Nominatim** geocoding API via Axios (no API key needed, free OSM service):
```
GET https://nominatim.openstreetmap.org/search?q=...&format=json&limit=1
```
On success: pans map, calls `setPin()`, updates `searchQuery` with the resolved `display_name`.

#### `setPin(lat, lng)`
The single source of truth for placing a location. Stores `lat`/`lng` (6 d.p.), removes the old marker, drops a **draggable** `L.marker`, attaches a `dragend` listener that syncs coordinates, then calls `updateOverlay()`.

#### `updateOverlay()`
Removes the previous geofence layer and draws a new one based on `this.shape`:

| Shape | Leaflet API | Notes |
|---|---|---|
| `circle` | `L.circle(center, { radius })` | Radius is in metres — Leaflet handles projection |
| `square` | `L.rectangle(bounds)` | Bounds computed by converting `radius` → degrees lat/lng |
| `polygon` | `L.polygon(points)` | Regular **hexagon**, 6 vertices, computed with trig |

The degree-conversion formula for non-circle shapes:
```js
const dLat = radius / 111320;                                    // 1° lat ≈ 111.32 km
const dLng = radius / (111320 * Math.cos(lat * Math.PI / 180)); // accounts for longitude compression at higher latitudes
```

All overlays share the same style (blue dashed border, 15% fill opacity).

#### `onManualCoordChange()`
Fires when the user edits the LAT or LNG text inputs directly. Validates that both values are valid floats, then pans the map and calls `setPin()`.

---

## Backend Data Contract

These four `<input type="hidden">` elements are bound with Alpine `:value` and will be submitted with whatever `<form>` wraps this view:

| `name` attribute | Value source | Example |
|---|---|---|
| `latitude` | `Alpine.lat` | `5.603700` |
| `longitude` | `Alpine.lng` | `-0.187000` |
| `geofence_radius` | `Alpine.radius` | `100` |
| `geofence_shape` | `Alpine.shape` | `circle` |

The backend should store `latitude` and `longitude` as `DECIMAL(10, 6)` columns. `geofence_radius` as an unsigned integer, and `geofence_shape` as an enum/string.

---

## Dependencies

| Library | Version | How loaded |
|---|---|---|
| **Leaflet.js** | 1.9.4 | CDN (unpkg), SRI-integrity checked |
| **OpenStreetMap** | — | Tile URL, free, no key needed |
| **Alpine.js** | project default | Bundled via Vite ([resources/js/app.js](file:///c:/Users/HP%20PROBOOK%20650%20G4/Herd/MACcess/resources/js/app.js)) |
| **Axios** | project default | Bundled via Vite ([resources/js/app.js](file:///c:/Users/HP%20PROBOOK%20650%20G4/Herd/MACcess/resources/js/app.js)) |

No npm packages were added; no `vite.config.js` was changed.

---

## Extension Guide

### Change the default map view
In `init()`, change the `center` and `zoom` values:
```js
this.map = L.map('geofence-map', { center: [LAT, LNG], zoom: 15 });
```

### Pre-populate coordinates (e.g. when editing an existing room)
Pass server-rendered values into the Alpine state via a `data-*` attribute or Blade `@json`, then read them in `init()`:
```html
<div x-data="geofenceMap({{ json_encode($room->toArray()) }})" x-init="init()">
```
Then accept an optional param in `geofenceMap(existing = null)` and call `setPin()` if `existing` is set.

### Swap the tile provider (e.g. for a custom style)
Replace the `tileLayer` URL in `init()`. Examples:
- **CartoDB Positron** (light): `https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png`
- **CartoDB Dark Matter**: `https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png`

### Add interactive polygon drawing (future)
Integrate [Leaflet.draw](https://github.com/Leaflet/Leaflet.draw) for freeform polygon capture. The hidden `geofence_shape` input would then need to carry a GeoJSON payload instead of a simple string.
