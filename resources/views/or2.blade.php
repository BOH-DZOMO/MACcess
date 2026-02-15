<!DOCTYPE html>
<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Create Official Room - Configuration</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2b6cee",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101622",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "2xl": "1rem", "full": "9999px"},
                },
            },
        }
    </script>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-white overflow-hidden">
<div class="flex h-screen w-full">
<aside class="hidden w-64 flex-col border-r border-[#e7ebf3] bg-white dark:bg-[#1e2736] dark:border-[#2d3748] lg:flex">
<div class="flex h-full flex-col justify-between p-4">
<div class="flex flex-col gap-4">
<div class="flex items-center gap-3 px-2 py-3">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8 bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">check_circle</span>
</div>
<div class="flex flex-col">
<h1 class="text-slate-900 dark:text-white text-base font-bold leading-none">Attendify</h1>
<p class="text-slate-500 dark:text-slate-400 text-xs font-medium mt-1">Admin Console</p>
</div>
</div>
<nav class="flex flex-col gap-1">
<a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 dark:text-slate-300 dark:hover:bg-slate-800 transition-colors" href="#">
<span class="material-symbols-outlined text-[24px]">dashboard</span>
<p class="text-sm font-medium">Dashboard</p>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-primary/10 text-primary dark:bg-primary/20" href="#">
<span class="material-symbols-outlined text-[24px] font-variation-settings-'FILL'_1">meeting_room</span>
<p class="text-sm font-bold">My Rooms</p>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 dark:text-slate-300 dark:hover:bg-slate-800 transition-colors" href="#">
<span class="material-symbols-outlined text-[24px]">analytics</span>
<p class="text-sm font-medium">Reports</p>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 dark:text-slate-300 dark:hover:bg-slate-800 transition-colors" href="#">
<span class="material-symbols-outlined text-[24px]">settings</span>
<p class="text-sm font-medium">Settings</p>
</a>
</nav>
</div>
<div class="flex flex-col gap-2 border-t border-[#e7ebf3] dark:border-[#2d3748] pt-4">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-600 hover:bg-slate-50 dark:text-slate-300 dark:hover:bg-slate-800" href="#">
<span class="material-symbols-outlined text-[24px]">help</span>
<p class="text-sm font-medium">Help Center</p>
</a>
</div>
</div>
</aside>
<div class="flex flex-1 flex-col h-full overflow-hidden relative">
<header class="flex h-16 items-center justify-between border-b border-[#e7ebf3] bg-white px-6 dark:bg-[#1e2736] dark:border-[#2d3748] shrink-0 z-20">
<div class="flex items-center gap-4">
<button class="lg:hidden text-slate-500 hover:text-slate-700">
<span class="material-symbols-outlined">menu</span>
</button>
<h2 class="text-lg font-bold tracking-tight text-slate-900 dark:text-white">Attendance System</h2>
</div>
<div class="flex items-center gap-6">
<button class="relative text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-white">
<span class="material-symbols-outlined text-[24px]">notifications</span>
<span class="absolute top-0 right-0 size-2 bg-red-500 rounded-full border-2 border-white dark:border-[#1e2736]"></span>
</button>
<div class="h-8 w-px bg-slate-200 dark:bg-slate-700"></div>
<div class="flex items-center gap-3">
<div class="text-right hidden sm:block">
<p class="text-sm font-bold text-slate-900 dark:text-white">Alex Morgan</p>
<p class="text-xs text-slate-500 dark:text-slate-400">Administrator</p>
</div>
<div class="size-9 rounded-full bg-slate-200 bg-center bg-cover border border-slate-200 dark:border-slate-700" data-alt="User avatar profile picture" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAQrENUnleNzDFthURI8YvkgIXqkrZfOkqJjjYyvCWOZnMGtDVbNI4DqvORXaGBr2CCr7ede04VcuQjduAflKH5MTJ1V3HS6totcyaHDARAPau8NJ_nTnqr0EYNZeObf1_Ryrl2-m3uO0ClpTpuDkpAstBK7-HjlsMj6j4icXTUgF1irJJnUgC1HqJGyGCBqS3Uhvi9iz8fzbmBE71BFtr2paoqTmahcDvS8_XZBD5onvb1g72v3IjcNgdfFoEWkBwhQzP3JptEx10');"></div>
</div>
</div>
</header>
<main class="flex-1 overflow-y-auto bg-background-light dark:bg-background-dark p-6 lg:px-10 pb-20">
<div class="mx-auto max-w-5xl">
<nav class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 mb-6">
<a class="hover:text-primary transition-colors" href="#">Rooms</a>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
<span class="font-semibold text-slate-900 dark:text-white">Create New</span>
</nav>
<div class="mb-8">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-6">
<div>
<h1 class="text-3xl font-black tracking-tight text-slate-900 dark:text-white">Room Configuration</h1>
<p class="mt-2 text-slate-500 dark:text-slate-400">Step 2 of 3: Set up location boundaries and verification protocols.</p>
</div>
</div>
<div class="w-full border-b border-slate-200 dark:border-slate-700">
<div class="flex gap-8">
<div class="flex items-center gap-2 border-b-[3px] border-primary/40 pb-3 px-1">
<div class="flex size-6 items-center justify-center rounded-full bg-primary text-white">
<span class="material-symbols-outlined text-[16px] font-bold">check</span>
</div>
<span class="text-sm font-medium text-slate-900 dark:text-white">Basic Info</span>
</div>
<div class="flex items-center gap-2 border-b-[3px] border-primary pb-3 px-1">
<div class="flex size-6 items-center justify-center rounded-full bg-primary text-[12px] font-bold text-white shadow-sm shadow-primary/30">2</div>
<span class="text-sm font-bold text-primary">Configuration</span>
</div>
<div class="flex items-center gap-2 border-b-[3px] border-transparent pb-3 px-1">
<div class="flex size-6 items-center justify-center rounded-full bg-slate-200 text-[12px] font-bold text-slate-500 dark:bg-slate-700 dark:text-slate-400">3</div>
<span class="text-sm font-medium text-slate-500 dark:text-slate-400">Review</span>
</div>
</div>
</div>
</div>
<div class="flex flex-col gap-8 rounded-xl bg-white p-6 shadow-sm border border-slate-200 dark:bg-[#1e2736] dark:border-slate-700 dark:shadow-none">
<div class="flex flex-col gap-6">
<div>
<h3 class="text-lg font-bold text-slate-900 dark:text-white">Location Setup</h3>
<p class="text-sm text-slate-500 dark:text-slate-400">Define the physical attendance area and geofencing rules.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div class="space-y-2">
<label class="text-sm font-medium text-slate-700 dark:text-slate-300" for="locationName">Location Name</label>
<input class="w-full rounded-lg border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 transition-shadow" id="locationName" placeholder="e.g. Headquarters Main Lobby" type="text"/>
</div>
<div class="space-y-2">
<label class="text-sm font-medium text-slate-700 dark:text-slate-300" for="addressSearch">Address Search</label>
<div class="relative">
<div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
<span class="material-symbols-outlined text-slate-400">search</span>
</div>
<input class="block w-full rounded-lg border-slate-300 bg-slate-50 py-2.5 pl-10 pr-24 text-sm placeholder-slate-500 focus:border-primary focus:bg-white focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:placeholder-slate-400 dark:text-white transition-all shadow-sm" id="addressSearch" placeholder="Search address..." type="text" value="41 Madison Ave, New York"/>
<button class="absolute inset-y-1 right-1 flex items-center gap-1 rounded-md bg-white px-3 text-xs font-semibold text-primary hover:bg-slate-50 border border-slate-200 shadow-sm dark:bg-slate-700 dark:border-slate-600 dark:text-primary-400 dark:hover:bg-slate-600 transition-colors">
<span class="material-symbols-outlined text-[16px]">my_location</span>
                                            Locate Me
                                        </button>
</div>
</div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
<div class="lg:col-span-2 relative h-[420px] w-full overflow-hidden rounded-xl border border-slate-200 dark:border-slate-700 shadow-inner group">
<div class="absolute inset-0 bg-cover bg-center" data-alt="Interactive map showing city streets" data-location="New York" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBEXGIp3G3c7WvznuhnjHlaefOdtZOTbjcnQTrntdES8-FCiSVxJfFeI-kFtfVm6TisdnnfqVveYDaEqR5-RsezkkITByQd3W9VDZjPqV2mGKOctwqLt6Q8TL7zb4ZTf59V-1gm2xjg6zhDq5eoKb-Dwkn4bIW3eyICVj3qH5J-3G45l0HLyxjf87_jWiD8pnUxtEX7xIPshMj6bJOq6CpoC_anuttysqL8IuNh2uQK8j_FDMomQKOOmvpYPSSTeO3a0IpLT_Ty8vY');"></div>
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex items-center justify-center">
<div class="size-64 rounded-full bg-primary/20 border-2 border-primary border-dashed animate-pulse"></div>
<div class="absolute text-primary drop-shadow-md">
<span class="material-symbols-outlined text-[48px] font-variation-settings-'FILL'_1">location_on</span>
</div>
</div>
<div class="absolute bottom-4 right-4 flex flex-col gap-2">
<button class="flex size-10 items-center justify-center rounded-lg bg-white text-slate-700 shadow-lg hover:bg-slate-50 dark:bg-slate-800 dark:text-white transition-transform active:scale-95">
<span class="material-symbols-outlined">add</span>
</button>
<button class="flex size-10 items-center justify-center rounded-lg bg-white text-slate-700 shadow-lg hover:bg-slate-50 dark:bg-slate-800 dark:text-white transition-transform active:scale-95">
<span class="material-symbols-outlined">remove</span>
</button>
</div>
</div>
<div class="lg:col-span-1 flex flex-col gap-5 rounded-xl bg-slate-50 p-5 border border-slate-100 dark:bg-slate-800/50 dark:border-slate-700 h-full">
<div class="flex items-center gap-2 text-slate-900 dark:text-white pb-2 border-b border-slate-200 dark:border-slate-700">
<span class="material-symbols-outlined text-primary">radar</span>
<h4 class="font-bold text-sm">Geofencing Settings</h4>
</div>
<div class="space-y-3 pt-2">
<label class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Boundary Shape</label>
<div class="grid grid-cols-3 gap-2">
<button class="flex flex-col items-center justify-center gap-1 rounded-lg border-2 border-primary bg-primary/5 p-2 text-primary dark:bg-primary/20 transition-colors">
<span class="material-symbols-outlined text-[20px]">circle</span>
<span class="text-[10px] font-bold">Circle</span>
</button>
<button class="flex flex-col items-center justify-center gap-1 rounded-lg border border-slate-200 bg-white p-2 text-slate-600 hover:border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 transition-colors">
<span class="material-symbols-outlined text-[20px]">square</span>
<span class="text-[10px] font-medium">Square</span>
</button>
<button class="flex flex-col items-center justify-center gap-1 rounded-lg border border-slate-200 bg-white p-2 text-slate-600 hover:border-slate-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 transition-colors">
<span class="material-symbols-outlined text-[20px]">pentagon</span>
<span class="text-[10px] font-medium">Custom</span>
</button>
</div>
</div>
<div class="space-y-4">
<div class="flex justify-between items-center">
<label class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Radius</label>
<span class="text-xs font-bold text-primary bg-primary/10 px-2 py-1 rounded">50 meters</span>
</div>
<input class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-primary dark:bg-slate-700" max="500" min="10" type="range" value="50"/>
<div class="flex justify-between text-[10px] text-slate-400">
<span>10m</span>
<span>500m</span>
</div>
</div>
<div class="space-y-2 pt-2">
<label class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Coordinates</label>
<div class="flex gap-2">
<div class="relative w-full">
<span class="absolute left-2 top-1.5 text-[10px] text-slate-400 font-bold">LAT</span>
<input class="w-full pl-8 pr-2 py-1.5 text-xs font-mono rounded border-slate-200 bg-white text-slate-700 focus:border-primary focus:ring-1 focus:ring-primary dark:bg-slate-900 dark:border-slate-600 dark:text-slate-300 transition-shadow" type="text" value="40.7418"/>
</div>
<div class="relative w-full">
<span class="absolute left-2 top-1.5 text-[10px] text-slate-400 font-bold">LNG</span>
<input class="w-full pl-8 pr-2 py-1.5 text-xs font-mono rounded border-slate-200 bg-white text-slate-700 focus:border-primary focus:ring-1 focus:ring-primary dark:bg-slate-900 dark:border-slate-600 dark:text-slate-300 transition-shadow" type="text" value="-73.9893"/>
</div>
</div>
</div>
</div>
</div>
</div>
<hr class="border-slate-100 dark:border-slate-700"/>
<div class="flex flex-col gap-6">
<div>
<h3 class="text-lg font-bold text-slate-900 dark:text-white">Additional Verification</h3>
<p class="text-sm text-slate-500 dark:text-slate-400">Select a secondary verification method required for attendance.</p>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
<label class="relative cursor-pointer group">
<input class="peer sr-only" name="additional_verification" type="radio" value="biometric"/>
<div class="flex flex-col h-full rounded-xl border-2 border-slate-200 bg-white p-5 transition-all hover:bg-slate-50 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700 dark:peer-checked:bg-primary/10">
<div class="flex justify-between items-start mb-3">
<div class="p-2 rounded-lg bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 peer-checked:bg-primary/10 peer-checked:text-primary">
<span class="material-symbols-outlined text-[24px]">face</span>
</div>
<div class="size-5 rounded-full border border-slate-300 dark:border-slate-500 flex items-center justify-center peer-checked:bg-primary peer-checked:border-primary">
<span class="material-symbols-outlined text-[14px] text-white opacity-0 peer-checked:opacity-100">check</span>
</div>
</div>
<span class="font-bold text-sm block mb-1">Biometric</span>
<span class="text-xs text-slate-500 dark:text-slate-400">Face ID or System Biometrics</span>
</div>
</label>
<label class="relative cursor-pointer group">
<input class="peer sr-only" name="additional_verification" type="radio" value="fingerprint"/>
<div class="flex flex-col h-full rounded-xl border-2 border-slate-200 bg-white p-5 transition-all hover:bg-slate-50 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700 dark:peer-checked:bg-primary/10">
<div class="flex justify-between items-start mb-3">
<div class="p-2 rounded-lg bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 peer-checked:bg-primary/10 peer-checked:text-primary">
<span class="material-symbols-outlined text-[24px]">fingerprint</span>
</div>
<div class="size-5 rounded-full border border-slate-300 dark:border-slate-500 flex items-center justify-center peer-checked:bg-primary peer-checked:border-primary">
<span class="material-symbols-outlined text-[14px] text-white opacity-0 peer-checked:opacity-100">check</span>
</div>
</div>
<span class="font-bold text-sm block mb-1">Fingerprint</span>
<span class="text-xs text-slate-500 dark:text-slate-400">Dedicated Scanner Hardware</span>
</div>
</label>
<label class="relative cursor-pointer group">
<input checked="" class="peer sr-only" name="additional_verification" type="radio" value="qr"/>
<div class="flex flex-col h-full rounded-xl border-2 border-slate-200 bg-white p-5 transition-all hover:bg-slate-50 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700 dark:peer-checked:bg-primary/10">
<div class="flex justify-between items-start mb-3">
<div class="p-2 rounded-lg bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 peer-checked:bg-primary/10 peer-checked:text-primary">
<span class="material-symbols-outlined text-[24px]">qr_code_scanner</span>
</div>
<div class="size-5 rounded-full border border-slate-300 dark:border-slate-500 flex items-center justify-center peer-checked:bg-primary peer-checked:border-primary">
<span class="material-symbols-outlined text-[14px] text-white opacity-0 peer-checked:opacity-100">check</span>
</div>
</div>
<span class="font-bold text-sm block mb-1">QR Code</span>
<span class="text-xs text-slate-500 dark:text-slate-400">Scan dynamic code on entry</span>
</div>
</label>
<label class="relative cursor-pointer group">
<input class="peer sr-only" name="additional_verification" type="radio" value="otp"/>
<div class="flex flex-col h-full rounded-xl border-2 border-slate-200 bg-white p-5 transition-all hover:bg-slate-50 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700 dark:peer-checked:bg-primary/10">
<div class="flex justify-between items-start mb-3">
<div class="p-2 rounded-lg bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 peer-checked:bg-primary/10 peer-checked:text-primary">
<span class="material-symbols-outlined text-[24px]">pin</span>
</div>
<div class="size-5 rounded-full border border-slate-300 dark:border-slate-500 flex items-center justify-center peer-checked:bg-primary peer-checked:border-primary">
<span class="material-symbols-outlined text-[14px] text-white opacity-0 peer-checked:opacity-100">check</span>
</div>
</div>
<span class="font-bold text-sm block mb-1">OTP</span>
<span class="text-xs text-slate-500 dark:text-slate-400">Time-based One Time Password</span>
</div>
</label>
</div>
</div>
</div>
<div class="mt-8 flex justify-end gap-4">
<button class="px-6 py-2.5 rounded-lg text-sm font-bold text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">
                        Back
                    </button>
<button class="flex items-center gap-2 px-6 py-2.5 rounded-lg bg-primary text-white text-sm font-bold shadow-lg shadow-primary/30 hover:bg-blue-600 transition-all active:scale-95">
                        Next: Review
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</button>
</div>
</div>
</main>
</div>
</div>
</body></html>