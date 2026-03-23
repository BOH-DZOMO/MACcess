# Timeframe Window Section — Developer Documentation

**File:** `resources/views/room/create_official.blade.php`
**Location in file:** After the Location & Geofence block (`/geofenceMap Alpine component`), before the bottom action buttons.
**Technology:** Alpine.js (already loaded by the app layout), plain Tailwind/CSS classes consistent with the rest of the form.

---

## Overview

The Timeframe Window section lets an admin define **when** an attendance room is valid — giving it a human-readable name, a start/end time window, and a weekly repeat schedule.

---

## Structure

```
<div x-data="timeframe()" x-init="init()">     ← Alpine component root
  ├── Section header (h3 + subtitle p)
  ├── Row: Timeframe Name | Time Range          ← single flex row on desktop
  │     ├── label + text input (shiftLabel)
  │     ├── vertical divider
  │     └── label + [start time] — [end time]
  ├── Validation error (shown when start ≥ end)
  └── Repeat section
        ├── Segmented control (Mon–Fri / Sat–Sun / Custom)
        └── Day-of-week pill buttons (Mon … Sun)
</div>

@once
  <script> function timeframe() { … } </script>
@endonce
```

---

## Alpine.js Component — `timeframe()`

### State

| Property | Type | Default | Description |
|---|---|---|---|
| `shiftLabel` | `string` | `''` | Human-readable name for the timeframe |
| `startTime` | `string` | `''` | `HH:MM` value bound to the start `<input type="time">` |
| `endTime` | `string` | `''` | `HH:MM` value bound to the end `<input type="time">` |
| `preset` | `string` | `'weekday'` | Active preset: `'weekday'`, `'weekend'`, or `'custom'` |
| `selectedDays` | `number[]` | `[0,1,2,3,4]` | Indices of selected days (Mon=0 … Sun=6) |
| `timeError` | `string` | `''` | Shown as red error text when start ≥ end |
| `presetOptions` | `object[]` | — | Label/value pairs for the segmented control |
| `days` | `string[]` | `['Mon'…'Sun']` | Labels for the day pill buttons |

### Methods

#### `init()`
Called on component mount. Calls `setPreset('weekday')` to pre-select Mon–Fri.

#### `setPreset(value)`
Sets the active `preset` and updates `selectedDays`:
- `'weekday'` → `[0, 1, 2, 3, 4]`
- `'weekend'` → `[5, 6]`
- `'custom'`  → `[]` (cleared — user picks manually)

#### `toggleDay(index)`
Only active when `preset === 'custom'`. Adds or removes `index` from `selectedDays`.

#### `validateTime()`
Fires on every time input `@change`. Sets `timeError` to `"End time must be after start time."` if `startTime >= endTime`, otherwise clears it.

---

## Hidden Inputs (Backend)

These hidden fields are submitted with the form:

| Name | Value |
|---|---|
| `timeframe_label` | Bound to `shiftLabel` |
| `timeframe_start` | Bound to `startTime` |
| `timeframe_end` | Bound to `endTime` |
| `timeframe_days` | `JSON.stringify(selectedDays)` — e.g. `[0,1,2,3,4]` |

---

## UI Behaviour Summary

| Action | Result |
|---|---|
| Click **Mon – Fri** | Highlights Mon–Tue–Wed–Thu–Fri; day pills become read-only |
| Click **Sat – Sun** | Highlights Sat–Sun only; day pills become read-only |
| Click **Custom** | Clears all selections; all 7 day pills become individually togglable |
| Set End ≤ Start | Red inline error appears below the time row |
| Focus a time input | Border turns primary blue, `bg-white` lifts the input |

---

## Design Decisions

- **`@once` guard** on the `<script>` block — prevents the function from being re-declared if the component is ever included more than once on a page.
- **No external libraries** — purely Alpine.js state + Tailwind utility classes, matching every other interactive section on the page (`geofenceMap()` pattern).
- **`flex-1 min-w-0`** on time inputs — prevents them from overflowing their flex container on narrow screens.
- **`whitespace-nowrap shrink-0`** on labels — keeps "Timeframe Name" and "Time Range" from wrapping when the row is tight.
- **Responsive stacking** — the combined Name + Time Range row uses `flex-col md:flex-row` so it collapses gracefully on mobile.
- The vertical divider (`w-px self-stretch`) is `hidden md:block` — invisible on mobile where the row stacks.
