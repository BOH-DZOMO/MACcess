# MACcess - Project Status Documentation

## Overview

MACcess is a Laravel application designed for managing "Rooms", tracking attendance/memberships, and handling various verification methods like OTP, QR Code, Device Check, and Fingerprint.

## Technical Stack & Dependencies

- **Framework**: Laravel 12 (PHP ^8.2)
- **Authentication**: Laravel Sanctum, Pragmarx Google2FA (Two-Factor Authentication)
- **OTP/Mailing**: `ichtrojan/laravel-otp`, Symfony Brevo Mailer
- **Frontend Tooling**: Vite, npm (Tailwind/Blade stack implied)

## Database Schema Highlights

The core database structure is fully migrated to support the application's domain:

- **`users`**: Standard user authentication table.
- **`rooms`**: Represents a room/session. It features `room_uuid`, `wifi_bssid`, `verification_type` (enum: `qrcode`, `fingerprint`, `device_check`, `otp`), `room_type` (structured/unstructured), `location`, and a foreign key to the user who created it.
- **`room_memberships`**: Connects users to rooms, tracking when they joined (`joined_at`) and arbitrary `metadata`.
- **`qr_codes`**: Manages generated QR codes that belong to a specific user and room, including `expires_at` timestamps.
- **`time_windows`**: Establishes active time constraints for rooms (`start_time`, `end_time`, `day`).
- **`attendances`**: The central logging table linking a `user`, a `room`, a `device`, and a `time_window`. It logs the `status` (e.g., early, late) and timestamp (`joined_at`).

## Routes & Controllers

- **Controllers**:
    - `AdhocRoomController` and `OfficialRoomController` are present. Currently, they primarily serve structural purposes, with `index` and `create` methods mapped to return the respective frontend view files. The data persistence methods (`store`, `update`, etc.) are scaffolded but empty.
- **Web Routes**:
    - A `/rooms/` prefix group is defined, handling `official`, `official/create`, `adhoc`, and `adhoc/create`.
    - `/email`: A test route dispatching an `EmailActivationOtp` mail via queue.
    - Several prototyping routes (`/test1` through `/test6` and `/report`) map directly to individual test Blade files, showing that frontend UI prototyping is actively happening in parallel.

## Frontend UI & Views

The presentation layer uses Laravel Blade templates residing in `resources/views`:

- **Room Interfaces**: Production-intended views have been created under `resources/views/room/`, specifically `adhoc.blade.php`, `official.blade.php`, and `create_official.blade.php`.
- **UI Prototypes**: There is a substantial collection of large view files (`ad.blade.php`, `of.blade.php`, `or1.blade.php` to `or3.blade.php`, `report.blade.php`) which indicate active UI drafting and testing without being tied to the final Controller logic yet.

## Current State of Development Summary

1. **Infrastructure**: The robust back-end setup is ready, complete with complex relationship migrations, authentication scaffolding, and third-party API integrations (Brevo, Google2FA).
2. **Backend Logic**: Models and Database structure are mature. Controller logic is still in the framing stage, awaiting the implementation of data mutation (CRUD logic).
3. **Frontend Presentation**: Significant effort has gone into the frontend UI, with multiple extensive view files being developed and tested via placeholder routes. The next major step will likely involve wiring these UI prototypes to the appropriate controller methods to make the application fully dynamic.
