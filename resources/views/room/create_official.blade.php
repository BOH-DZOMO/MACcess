<x-app-layout title="Create Official Room">
    {{-- <x-page.header title="Official Rooms Management" subtitle="Manage and view all official attendance locations and their current status.">
        <x-slot:actions>
            <button
                class="flex items-center justify-center gap-2
                   bg-primary hover:bg-blue-700
                   text-white px-5 py-2.5 rounded-lg
                   shadow-sm hover:shadow
                   transition-all font-medium text-sm group">
                <span
                    class="material-symbols-outlined text-[20px]
                       group-hover:rotate-90 transition-transform">
                    add
                </span>
                <span>Create New Room</span>
            </button>
        </x-slot:actions>
    </x-page.header> --}}

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
                                <label class="text-sm font-medium text-slate-700 dark:text-slate-300"
                                    for="roomName">Room Name <span class="text-red-500">*</span></label>
                                <input
                                    class="w-full rounded-lg border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 transition-shadow"
                                    id="roomName" placeholder="e.g. Main Conference Hall A" type="text" />
                            </div>
                            <div class="col-span-1 md:col-span-2 space-y-2">
                                <label class="text-sm font-medium text-slate-700 dark:text-slate-300"
                                    for="description">Description</label>
                                <textarea
                                    class="w-full rounded-lg border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 resize-none transition-shadow"
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
                                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300"
                                        for="wifiBSSID">Wi-Fi BSSID Binding</label>
                                    <span class="material-symbols-outlined text-slate-400 text-[16px] cursor-help"
                                        title="Bind attendance to a specific Wi-Fi Access Point MAC Address">help</span>
                                </div>
                                <div class="relative">
                                    <input
                                        class="w-full rounded-lg border-slate-300 bg-white px-3 py-2.5 pl-10 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 transition-shadow"
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
                                            Additional Verification (Select One)</p>
                                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4">
                                            <label class="relative cursor-pointer group">
                                                <input checked="" class="peer sr-only" name="verification_method"
                                                    type="radio" value="none" />
                                                <div
                                                    class="flex h-full flex-col items-center justify-center gap-2 rounded-xl border-2 border-slate-200 bg-white p-4 transition-all hover:bg-slate-50 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700 dark:peer-checked:bg-primary/10">
                                                    <span
                                                        class="material-symbols-outlined text-3xl text-slate-400 transition-colors peer-checked:text-primary group-hover:text-slate-600 dark:group-hover:text-slate-300">block</span>
                                                    <span class="text-xs font-bold">None</span>
                                                </div>
                                            </label>
                                            <label class="relative cursor-pointer group">
                                                <input class="peer sr-only" name="verification_method" type="radio"
                                                    value="biometric" />
                                                <div
                                                    class="flex h-full flex-col items-center justify-center gap-2 rounded-xl border-2 border-slate-200 bg-white p-4 transition-all hover:bg-slate-50 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700 dark:peer-checked:bg-primary/10">
                                                    <span
                                                        class="material-symbols-outlined text-3xl text-slate-400 transition-colors peer-checked:text-primary group-hover:text-slate-600 dark:group-hover:text-slate-300">fingerprint</span>
                                                    <span class="text-xs font-bold">Biometric</span>
                                                </div>
                                            </label>
                                            <label class="relative cursor-pointer group">
                                                <input class="peer sr-only" name="verification_method" type="radio"
                                                    value="qr" />
                                                <div
                                                    class="flex h-full flex-col items-center justify-center gap-2 rounded-xl border-2 border-slate-200 bg-white p-4 transition-all hover:bg-slate-50 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700 dark:peer-checked:bg-primary/10">
                                                    <span
                                                        class="material-symbols-outlined text-3xl text-slate-400 transition-colors peer-checked:text-primary group-hover:text-slate-600 dark:group-hover:text-slate-300">qr_code_scanner</span>
                                                    <span class="text-xs font-bold">QR Code</span>
                                                </div>
                                            </label>
                                            <label class="relative cursor-pointer group">
                                                <input class="peer sr-only" name="verification_method" type="radio"
                                                    value="otp" />
                                                <div
                                                    class="flex h-full flex-col items-center justify-center gap-2 rounded-xl border-2 border-slate-200 bg-white p-4 transition-all hover:bg-slate-50 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700 dark:peer-checked:bg-primary/10">
                                                    <span
                                                        class="material-symbols-outlined text-3xl text-slate-400 transition-colors peer-checked:text-primary group-hover:text-slate-600 dark:group-hover:text-slate-300">pin</span>
                                                    <span class="text-xs font-bold">OTP</span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="border-slate-100 dark:border-slate-700" />
                        <div class="flex flex-col gap-6">
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white">Location &amp; Geofence
                                </h3>
                                <p class="text-sm text-slate-500 dark:text-slate-400">Set the physical center point and
                                    attendance boundary.</p>
                            </div>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <span class="material-symbols-outlined text-slate-400">search</span>
                                </div>
                                <input
                                    class="block w-full rounded-lg border-slate-300 bg-slate-50 py-3 pl-10 pr-3 text-sm placeholder-slate-500 focus:border-primary focus:bg-white focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:placeholder-slate-400 dark:text-white transition-all shadow-sm"
                                    placeholder="Search address, city or coordinates..." type="text"
                                    value="41 Madison Ave, New York, NY 10010" />
                                <button
                                    class="absolute inset-y-1 right-1 rounded-md bg-white px-3 text-xs font-semibold text-slate-600 hover:bg-slate-100 border border-slate-200 shadow-sm dark:bg-slate-700 dark:border-slate-600 dark:text-slate-200 dark:hover:bg-slate-600 transition-colors">
                                    Locate Me
                                </button>
                            </div>
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                                <div
                                    class="lg:col-span-2 relative h-[420px] w-full overflow-hidden rounded-xl border border-slate-200 dark:border-slate-700 shadow-inner group">
                                    <div class="absolute inset-0 bg-cover bg-center"
                                        data-alt="Interactive map showing city streets of New York"
                                        data-location="New York"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBEXGIp3G3c7WvznuhnjHlaefOdtZOTbjcnQTrntdES8-FCiSVxJfFeI-kFtfVm6TisdnnfqVveYDaEqR5-RsezkkITByQd3W9VDZjPqV2mGKOctwqLt6Q8TL7zb4ZTf59V-1gm2xjg6zhDq5eoKb-Dwkn4bIW3eyICVj3qH5J-3G45l0HLyxjf87_jWiD8pnUxtEX7xIPshMj6bJOq6CpoC_anuttysqL8IuNh2uQK8j_FDMomQKOOmvpYPSSTeO3a0IpLT_Ty8vY');">
                                    </div>
                                    <div
                                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex items-center justify-center">
                                        <div
                                            class="size-64 rounded-full bg-primary/20 border-2 border-primary border-dashed animate-pulse">
                                        </div>
                                        <div class="absolute text-primary drop-shadow-md">
                                            <span
                                                class="material-symbols-outlined text-[48px] font-variation-settings-'FILL'_1">location_on</span>
                                        </div>
                                    </div>
                                    <div class="absolute bottom-4 right-4 flex flex-col gap-2">
                                        <button
                                            class="flex size-10 items-center justify-center rounded-lg bg-white text-slate-700 shadow-lg hover:bg-slate-50 dark:bg-slate-800 dark:text-white transition-transform active:scale-95">
                                            <span class="material-symbols-outlined">add</span>
                                        </button>
                                        <button
                                            class="flex size-10 items-center justify-center rounded-lg bg-white text-slate-700 shadow-lg hover:bg-slate-50 dark:bg-slate-800 dark:text-white transition-transform active:scale-95">
                                            <span class="material-symbols-outlined">remove</span>
                                        </button>
                                    </div>
                                </div>
                                <div
                                    class="lg:col-span-1 flex flex-col gap-5 rounded-xl bg-slate-50 p-5 border border-slate-100 dark:bg-slate-800/50 dark:border-slate-700">
                                    <div class="flex items-center gap-2 text-slate-900 dark:text-white">
                                        <span class="material-symbols-outlined text-primary">radar</span>
                                        <h4 class="font-bold text-sm">Geofence Settings</h4>
                                    </div>
                                    <div class="space-y-3">
                                        <label
                                            class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Shape</label>
                                        <div class="grid grid-cols-3 gap-2">
                                            <button
                                                class="flex flex-col items-center justify-center gap-1 rounded-lg border-2 border-primary bg-primary/5 p-2 text-primary dark:bg-primary/20 transition-colors">
                                                <span class="material-symbols-outlined text-[20px]">circle</span>
                                                <span class="text-[10px] font-bold">Circle</span>
                                            </button>
                                            <button
                                                class="flex flex-col items-center justify-center gap-1 rounded-lg border border-slate-200 bg-white p-2 text-slate-600 hover:border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 transition-colors">
                                                <span class="material-symbols-outlined text-[20px]">square</span>
                                                <span class="text-[10px] font-medium">Square</span>
                                            </button>
                                            <button
                                                class="flex flex-col items-center justify-center gap-1 rounded-lg border border-slate-200 bg-white p-2 text-slate-600 hover:border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 transition-colors">
                                                <span class="material-symbols-outlined text-[20px]">pentagon</span>
                                                <span class="text-[10px] font-medium">Polygon</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="space-y-4">
                                        <div class="flex justify-between items-center">
                                            <label
                                                class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Area
                                                Control</label>
                                            <span
                                                class="text-xs font-bold text-primary bg-primary/10 px-2 py-1 rounded">50
                                                meters</span>
                                        </div>
                                        <input
                                            class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-primary dark:bg-slate-700"
                                            max="500" min="10" type="range" value="50" />
                                        <div class="flex justify-between text-[10px] text-slate-400">
                                            <span>10m</span>
                                            <span>500m</span>
                                        </div>
                                    </div>
                                    <div class="space-y-2 pt-2">
                                        <label
                                            class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">GPS
                                            Coordinates</label>
                                        <div class="flex gap-2">
                                            <div class="relative w-full">
                                                <span
                                                    class="absolute left-2 top-1.5 text-[10px] text-slate-400 font-bold">LAT</span>
                                                <input
                                                    class="w-full pl-8 pr-2 py-1.5 text-xs font-mono rounded border-slate-200 bg-white text-slate-700 focus:border-primary focus:ring-1 focus:ring-primary dark:bg-slate-900 dark:border-slate-600 dark:text-slate-300 transition-shadow"
                                                    type="text" value="40.741895" />
                                            </div>
                                            <div class="relative w-full">
                                                <span
                                                    class="absolute left-2 top-1.5 text-[10px] text-slate-400 font-bold">LNG</span>
                                                <input
                                                    class="w-full pl-8 pr-2 py-1.5 text-xs font-mono rounded border-slate-200 bg-white text-slate-700 focus:border-primary focus:ring-1 focus:ring-primary dark:bg-slate-900 dark:border-slate-600 dark:text-slate-300 transition-shadow"
                                                    type="text" value="-73.989308" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-auto pt-4 border-t border-slate-200 dark:border-slate-700">
                                        <div class="flex gap-3 text-xs text-slate-500 dark:text-slate-400">
                                            <span class="material-symbols-outlined text-[16px]">info</span>
                                            <p>Drag the map or enter coordinates to refine the location.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 flex justify-end gap-4">
                        <button
                            class="px-6 py-2.5 rounded-lg text-sm font-bold text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">
                            Cancel
                        </button>
                        <button
                            class="flex items-center gap-2 px-6 py-2.5 rounded-lg bg-primary text-white text-sm font-bold shadow-lg shadow-primary/30 hover:bg-blue-600 transition-all active:scale-95">
                            Next: Configuration
                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </button>
                    </div>
                </div>
       
</x-app-layout>