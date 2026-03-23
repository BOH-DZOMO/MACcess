<x-app-layout title="Review Official Room Details">

                <!-- Scrollable Content -->

                <div class="max-w-5xl mx-auto w-full p-6 md:p-10 flex flex-col gap-8">
                    <!-- Breadcrumbs -->
                    <div class="flex flex-wrap items-center gap-2 text-sm">
                        <a class="text-slate-500 hover:text-primary transition-colors dark:text-slate-400"
                            href="#">Home</a>
                        <span class="text-slate-400 material-symbols-outlined text-sm">chevron_right</span>
                        <a class="text-slate-500 hover:text-primary transition-colors dark:text-slate-400"
                            href="#">Rooms</a>
                        <span class="text-slate-400 material-symbols-outlined text-sm">chevron_right</span>
                        <a class="text-slate-500 hover:text-primary transition-colors dark:text-slate-400"
                            href="#">Create</a>
                        <span class="text-slate-400 material-symbols-outlined text-sm">chevron_right</span>
                        <span class="text-slate-900 font-medium dark:text-white">Review</span>
                    </div>
                    <!-- Page Heading -->
                    <div class="flex flex-col gap-2">
                        <h1 class="text-3xl md:text-4xl font-black tracking-tight text-slate-900 dark:text-white">Review
                            Room Details</h1>
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
                                <button
                                    class="flex items-center gap-1 text-sm font-medium text-primary hover:text-primary/80 transition-colors px-3 py-1.5 rounded-lg hover:bg-primary/10">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                    Edit
                                </button>
                            </div>
                            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="flex flex-col gap-1">
                                    <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Room
                                        Name</span>
                                    <span class="text-base font-semibold text-slate-900 dark:text-white">Conference Hall
                                        A</span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <span
                                        class="text-sm font-medium text-slate-500 dark:text-slate-400">Description</span>
                                    <span class="text-base font-normal text-slate-900 dark:text-white">Main hall for
                                        quarterly town halls and large team gatherings.</span>
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
                                <button
                                    class="flex items-center gap-1 text-sm font-medium text-primary hover:text-primary/80 transition-colors px-3 py-1.5 rounded-lg hover:bg-primary/10">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                    Edit
                                </button>
                            </div>
                            <div class="p-0 flex flex-col md:flex-row h-full">
                                <div
                                    class="w-full md:w-1/2 h-48 md:h-auto bg-slate-100 dark:bg-slate-800 relative group">
                                    <div class="absolute inset-0 bg-cover bg-center"
                                        data-alt="Map view showing geofence circle around HQ building"
                                        data-location="San Francisco"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCfUSUMzRwY8p9pCRVeSiazlFvD0J-oYHkEak1YXfStLTpuljA69oEh97RGOB2cKUymykJg_q6X1qMU2-8kPhXDZ3oXupIuPD55cGGNhdXy79N-EatIPcb8YhJ-tdO058bj7LgOhy99HRwGqv5XRz9j1wOrwocjpMUN-i43bdliD97bgfIBhCMbjmx67Bw9lW3Hmff560qKEk5SY-NSTW-DyEsGRNSAfi52qNGkea9JwXTmdMrKC_ccDX3-tr3v-1ZL3ayzI7aqRSA");'>
                                    </div>
                                    <div class="absolute inset-0 bg-primary/10 flex items-center justify-center">
                                        <div
                                            class="size-24 rounded-full border-2 border-primary bg-primary/20 flex items-center justify-center">
                                            <div
                                                class="size-3 bg-primary rounded-full shadow-lg border-2 border-white">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 p-6 flex flex-col gap-6">
                                    <div class="flex flex-col gap-1">
                                        <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Location
                                            Name</span>
                                        <span class="text-base font-semibold text-slate-900 dark:text-white">HQ
                                            Building - 1st Floor</span>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="flex flex-col gap-1">
                                            <span
                                                class="text-sm font-medium text-slate-500 dark:text-slate-400">Shape</span>
                                            <span
                                                class="text-base font-normal text-slate-900 dark:text-white flex items-center gap-1">
                                                <span
                                                    class="material-symbols-outlined text-lg text-slate-400">circle</span>
                                                Circular
                                            </span>
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <span
                                                class="text-sm font-medium text-slate-500 dark:text-slate-400">Radius</span>
                                            <span class="text-base font-normal text-slate-900 dark:text-white">50
                                                meters</span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <span
                                            class="text-sm font-medium text-slate-500 dark:text-slate-400">Coordinates</span>
                                        <span
                                            class="text-sm font-mono text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded w-fit">37.7749°
                                            N, 122.4194° W</span>
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
                                    <button
                                        class="text-primary hover:bg-primary/10 p-1.5 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-lg">edit</span>
                                    </button>
                                </div>
                                <div class="p-5">
                                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-3">Authorized
                                        Wi-Fi BSSIDs</p>
                                    <ul class="flex flex-col gap-2">
                                        <li
                                            class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-200 bg-slate-50 dark:bg-slate-800/50 p-2 rounded border border-slate-100 dark:border-slate-700">
                                            <span
                                                class="material-symbols-outlined text-slate-400 text-lg">router</span>
                                            <span class="font-mono">aa:bb:cc:dd:ee:ff</span>
                                        </li>
                                        <li
                                            class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-200 bg-slate-50 dark:bg-slate-800/50 p-2 rounded border border-slate-100 dark:border-slate-700">
                                            <span
                                                class="material-symbols-outlined text-slate-400 text-lg">router</span>
                                            <span class="font-mono">11:22:33:44:55:66</span>
                                        </li>
                                    </ul>
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
                                    <button
                                        class="text-primary hover:bg-primary/10 p-1.5 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-lg">edit</span>
                                    </button>
                                </div>
                                <div class="p-5">
                                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-3">Required
                                        Methods</p>
                                    <div class="flex flex-wrap gap-2">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium bg-green-50 text-green-700 border border-green-200 dark:bg-green-900/20 dark:text-green-300 dark:border-green-800">
                                            <span class="material-symbols-outlined text-lg">fingerprint</span>
                                            Biometric
                                        </span>
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium bg-blue-50 text-blue-700 border border-blue-200 dark:bg-blue-900/20 dark:text-blue-300 dark:border-blue-800">
                                            <span class="material-symbols-outlined text-lg">qr_code_2</span>
                                            QR Code
                                        </span>
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium bg-purple-50 text-purple-700 border border-purple-200 dark:bg-purple-900/20 dark:text-purple-300 dark:border-purple-800">
                                            <span class="material-symbols-outlined text-lg">password</span>
                                            OTP
                                        </span>
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
                    <button
                        class="px-6 py-2.5 rounded-lg text-slate-600 dark:text-slate-300 font-medium hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        Back
                    </button>
                    <button
                        class="px-8 py-2.5 rounded-lg bg-primary hover:bg-blue-700 text-white font-bold shadow-lg shadow-blue-500/30 transition-all active:scale-95 flex items-center gap-2">
                        <span>Create Room</span>
                        <span class="material-symbols-outlined text-lg">arrow_forward</span>
                    </button>
                </div>
            </div>
    
</x-app-layout>