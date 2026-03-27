<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
                        "display": ["Inter"]
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                },
            },
        }
    </script>
<title>Official Room Details - Attendance System</title>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100">
<div class="flex h-screen overflow-hidden">
<!-- Side Navigation -->
<aside class="w-64 flex flex-col border-r border-slate-200 dark:border-slate-800 bg-white dark:bg-background-dark overflow-y-auto">
<div class="p-6 flex items-center gap-3">
<div class="bg-primary rounded-lg p-2 text-white">
<span class="material-symbols-outlined">analytics</span>
</div>
<div>
<h1 class="text-base font-bold leading-tight">Attendance</h1>
<p class="text-xs text-slate-500 dark:text-slate-400">Admin Portal</p>
</div>
</div>
<nav class="flex-1 px-4 space-y-1">
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span class="text-sm font-medium">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 bg-primary/10 text-primary rounded-lg" href="#">
<span class="material-symbols-outlined text-fill">meeting_room</span>
<span class="text-sm font-medium">Rooms</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg" href="#">
<span class="material-symbols-outlined">description</span>
<span class="text-sm font-medium">Reports</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="text-sm font-medium">Settings</span>
</a>
</nav>
<div class="p-4 border-t border-slate-200 dark:border-slate-800">
<div class="flex items-center gap-3 p-2">
<img alt="User" class="rounded-full size-10" data-alt="User profile avatar image" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAlrovwvVLWKMVH7lHTXcF5gVTsu7IiP4PAc6QOL-6ltmHccnTet7T11ApGykTTEvUcW-v0M0M5F-T39BI1A9DqSnr0KS2ZpPqvN8PKmBHndyRA_9ERpcaWVxffKqPFRU_4zL2Q0Y-86cBoudN_zWpRymQiUROnEdGAYAvKESTOOllLpPXlEOMqiodl0te9WSpKEWwMhiJtNGnulPxQkV1jisSjfip60RzbiZlhXmcBmERxPjd9HgRO7y2sEuPW3AHpllQ5V_6U-3s"/>
<div class="flex flex-col">
<span class="text-sm font-semibold">Alex Rivera</span>
<span class="text-xs text-slate-500">System Admin</span>
</div>
</div>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 flex flex-col overflow-y-auto bg-background-light dark:bg-background-dark">
<!-- Header -->
<header class="sticky top-0 z-10 flex items-center justify-between border-b border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-background-dark/80 backdrop-blur-md px-8 py-4">
<div class="flex items-center gap-4">
<h2 class="text-xl font-bold">Room Details</h2>
</div>
<div class="flex items-center gap-4">
<div class="relative w-64">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-slate-100 dark:bg-slate-800 border-none rounded-lg text-sm focus:ring-2 focus:ring-primary" placeholder="Search resources..." type="text"/>
</div>
<button class="p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-full relative">
<span class="material-symbols-outlined">notifications</span>
<span class="absolute top-2 right-2 size-2 bg-red-500 rounded-full border-2 border-white dark:border-background-dark"></span>
</button>
</div>
</header>
<div class="p-8 max-w-7xl mx-auto w-full">
<!-- Room Overview -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
<div class="flex items-center gap-5">
<div class="size-20 bg-primary/10 rounded-xl flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-4xl">domain</span>
</div>
<div>
<div class="flex items-center gap-3">
<h1 class="text-2xl font-bold">Conference Hall A</h1>
<span class="px-2.5 py-0.5 text-xs font-semibold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 rounded-full">Active</span>
</div>
<p class="text-slate-500 dark:text-slate-400 text-sm mt-1">ID: ROOM-CH-001 • Main Office, Floor 3</p>
</div>
</div>
<div class="flex gap-3">
<button class="px-4 py-2 border border-slate-200 dark:border-slate-700 text-sm font-bold rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">Edit Room</button>
<button class="px-4 py-2 bg-primary text-white text-sm font-bold rounded-lg hover:bg-primary/90 transition-colors">Generate Report</button>
</div>
</div>
<!-- Stats Summary -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
<div class="bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
<div class="flex items-center justify-between mb-2">
<span class="text-sm font-medium text-slate-500">Currently Present</span>
<span class="material-symbols-outlined text-primary">groups</span>
</div>
<div class="flex items-end gap-2">
<span class="text-3xl font-bold">42</span>
<span class="text-sm text-green-600 mb-1">+12% vs yesterday</span>
</div>
</div>
<div class="bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
<div class="flex items-center justify-between mb-2">
<span class="text-sm font-medium text-slate-500">Expected Today</span>
<span class="material-symbols-outlined text-primary">event_available</span>
</div>
<div class="flex items-end gap-2">
<span class="text-3xl font-bold">56</span>
<span class="text-sm text-slate-400 mb-1">capacity 60</span>
</div>
</div>
<div class="bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
<div class="flex items-center justify-between mb-2">
<span class="text-sm font-medium text-slate-500">Late Arrivals</span>
<span class="material-symbols-outlined text-red-500">schedule</span>
</div>
<div class="flex items-end gap-2">
<span class="text-3xl font-bold">4</span>
<span class="text-sm text-red-500 mb-1">Requires attention</span>
</div>
</div>
</div>
<!-- Configuration & Map -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
<div class="lg:col-span-2 bg-white dark:bg-background-dark rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
<div class="p-6 border-b border-slate-100 dark:border-slate-800">
<h3 class="font-bold">Room Configuration</h3>
</div>
<div class="flex flex-col md:flex-row">
<div class="w-full md:w-1/2 p-6 space-y-4">
<div>
<label class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Geofencing Radius</label>
<div class="flex items-center gap-2 mt-1">
<span class="material-symbols-outlined text-slate-500">distance</span>
<span class="font-medium">50 meters</span>
</div>
</div>
<div>
<label class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Required Wi-Fi</label>
<div class="mt-1 space-y-1">
<div class="flex items-center gap-2 text-sm">
<span class="material-symbols-outlined text-xs text-primary">wifi</span>
<code>CORP_OFFICE_A1</code>
</div>
<div class="flex items-center gap-2 text-sm">
<span class="material-symbols-outlined text-xs text-primary">wifi</span>
<code>CORP_OFFICE_A2</code>
</div>
</div>
</div>
<div>
<label class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Active Verification</label>
<div class="flex flex-wrap gap-2 mt-2">
<span class="px-2 py-1 bg-primary/10 text-primary text-xs font-medium rounded">Biometric</span>
<span class="px-2 py-1 bg-primary/10 text-primary text-xs font-medium rounded">Geofencing</span>
<span class="px-2 py-1 bg-primary/10 text-primary text-xs font-medium rounded">BSSID Match</span>
</div>
</div>
</div>
<div class="w-full md:w-1/2 min-h-48 bg-slate-200 dark:bg-slate-800 relative">
<div class="absolute inset-0 bg-center bg-no-repeat bg-cover" data-alt="Map showing office geofencing perimeter" data-location="San Francisco" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBpO5f5MhRjD3BWCd17kud9ATp72Jn6bvFqJvHlmgwW1ra9e9ySiyJFGPMjd4_t4k7-YFjCZrjnMsf9UfISl2tM6EST2Qlkf07eKup1H_pOclYYjVFAeVquyzTPlj8R-e4CDkudczQJNL_oLDO57AVxOFdO0PObMrGVzZ39Bl5yVSM35oWTdfuAPY9rPuBaAV0r6xXF84epTkwVk8SXBJvKPNeBH5uuO6vwdtbfIma2o2zj3msivJ06SNzlBQiMobFNYdJ-haPIe_M');"></div>
<div class="absolute inset-0 bg-primary/10 flex items-center justify-center">
<div class="size-20 bg-primary/20 border-2 border-primary rounded-full animate-pulse"></div>
</div>
</div>
</div>
</div>
<!-- Join Requests Preview -->
<div class="bg-white dark:bg-background-dark rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
<div class="p-6 border-b border-slate-100 dark:border-slate-800 flex justify-between items-center">
<h3 class="font-bold">Join Requests</h3>
<span class="bg-primary text-white text-[10px] px-2 py-0.5 rounded-full font-bold">3 NEW</span>
</div>
<div class="divide-y divide-slate-100 dark:divide-slate-800">
<!-- Request Item -->
<div class="p-4 flex items-center gap-3">
<img class="rounded-full size-10" data-alt="Profile image of employee requesting access" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA1yD9TjMcFxB69sF4uhoSYzYuX_tV3mcAQHVRMpcWxndsbtryvgqVV-8qjkXBKxjvnkGTK3qi6LH1kn7g2mrEVMpMiVmMfuCGUlx7EqNuRFGHNvFACECATyYwsWF7QUD3hzry9saXBXufqtTHqv6UQdVF9UIwf0lhS2pc6EgYpdmU3s7OsW4OuPoyXPf7bVcrBoc2DBSNd4lRaqezrmeUqVumyZ7lt2902SlwmaOyL_EioVxhfZCilHpxtcPF9iqDcWbYr77HQXNM"/>
<div class="flex-1 min-w-0">
<p class="text-sm font-bold truncate">Sarah Johnson</p>
<p class="text-xs text-slate-500 truncate">Product Designer</p>
</div>
<div class="flex gap-2">
<button class="size-8 rounded-lg bg-green-100 text-green-600 hover:bg-green-200 flex items-center justify-center transition-colors">
<span class="material-symbols-outlined text-sm">check</span>
</button>
<button class="size-8 rounded-lg bg-red-100 text-red-600 hover:bg-red-200 flex items-center justify-center transition-colors">
<span class="material-symbols-outlined text-sm">close</span>
</button>
</div>
</div>
<!-- Request Item -->
<div class="p-4 flex items-center gap-3">
<img class="rounded-full size-10" data-alt="Profile image of employee requesting access" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB2RhWCoqAWWgAWmGi_RY6qvKDRtLKsteorjs1RvWLVhCjh4-rLWwLKlHR5iu8EOoM1jZAET1JDZ6Y8yvF84zCAKIT-DSSChUnZ3QMGme4ht7omYB9yoMXLONa3l_ZzvM-bWOqBF4-PG8HdN-uqvBytZVhMcscd_lSjfrEfH1DDKzDT3fNeIUHqSylCSbIuO_XhB26WvbxUNhqdMSGoHucPC57iFwnT2Fe-BWq8NZAgqBjiP6AHk68DXGVOWbARHh7KKxD6WkI7POw"/>
<div class="flex-1 min-w-0">
<p class="text-sm font-bold truncate">Michael Chen</p>
<p class="text-xs text-slate-500 truncate">QA Engineer</p>
</div>
<div class="flex gap-2">
<button class="size-8 rounded-lg bg-green-100 text-green-600 hover:bg-green-200 flex items-center justify-center transition-colors">
<span class="material-symbols-outlined text-sm">check</span>
</button>
<button class="size-8 rounded-lg bg-red-100 text-red-600 hover:bg-red-200 flex items-center justify-center transition-colors">
<span class="material-symbols-outlined text-sm">close</span>
</button>
</div>
</div>
</div>
<button class="w-full py-3 text-sm font-bold text-primary hover:bg-primary/5 border-t border-slate-100 dark:border-slate-800 transition-colors">
                            View All Requests
                        </button>
</div>
</div>
<!-- Tabs Section -->
<div class="bg-white dark:bg-background-dark rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
<div class="border-b border-slate-100 dark:border-slate-800">
<div class="flex gap-8 px-6">
<button class="py-4 border-b-2 border-primary text-sm font-bold text-primary">Registered Employees (42)</button>
<button class="py-4 border-b-2 border-transparent text-sm font-medium text-slate-500 hover:text-slate-700">Access Logs</button>
<button class="py-4 border-b-2 border-transparent text-sm font-medium text-slate-500 hover:text-slate-700">Admin History</button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-slate-50 dark:bg-slate-900/50 text-slate-500 text-xs uppercase tracking-wider">
<tr>
<th class="px-6 py-4 font-semibold">Employee</th>
<th class="px-6 py-4 font-semibold">Department</th>
<th class="px-6 py-4 font-semibold">Joined Date</th>
<th class="px-6 py-4 font-semibold">Compliance</th>
<th class="px-6 py-4 font-semibold text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 dark:divide-slate-800">
<tr>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-3">
<img class="rounded-full size-8" data-alt="Employee avatar" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAXWTJK0uLxLQ1Y81gZ7TK2wrRiyeC-37XAbMea8SSI6BUduHH6FhPnc7lDndMkB4YNyP7e9WsY2Ztkaj2vE-jMxtCP4BIlTSbEm-ec4vHsGusHTKcJ0-UqcfpVow2V5HMPOmnDrkZ9xxvjpR9SGrRPbeNWuaf3wMd130RD48IYfVoDYqt4Szct4tgke2jy1ZLHdVBzL2Kr2CwFNF5BoQfngB-mQXpPFhq-yp4DfGW2GorGddCdO_xk4rYsepV1mrcQuYN-nFTViJ4"/>
<div class="text-sm font-bold">David Wilson</div>
</div>
</td>
<td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Engineering</td>
<td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Oct 12, 2023</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<div class="w-16 bg-slate-200 dark:bg-slate-700 h-1.5 rounded-full overflow-hidden">
<div class="bg-green-500 h-full w-full"></div>
</div>
<span class="text-xs font-medium text-green-600">100%</span>
</div>
</td>
<td class="px-6 py-4 text-right">
<button class="text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined">more_vert</span>
</button>
</td>
</tr>
<tr>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-3">
<img class="rounded-full size-8" data-alt="Employee avatar" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcGI2xJWvIYWoYG79LdaAKiK9CoWcHyKIEJInWnmnhNzW7pPKno2O8mRPKhD5L5hk5EvcsdHfbz2QxTlO8bN909z_mHF8wOWqqdL9PRc8bYn61nBdAwpU_mMPhlxY4Sis-N6ScyUSEO_iDymiRmGVYLh1Ki50aKI-TweVdH1LgOzazo6KQ2HzdWEePNtx0Xf0L9Vvgvi8GE4WEFra6LRBESJw0PKwriIC--NtsY9osP1PTPifGRc89IgugUZbyHSwMkw4R_Y4F5K0"/>
<div class="text-sm font-bold">Emma Thompson</div>
</div>
</td>
<td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Marketing</td>
<td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Jan 05, 2024</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<div class="w-16 bg-slate-200 dark:bg-slate-700 h-1.5 rounded-full overflow-hidden">
<div class="bg-yellow-500 h-full w-3/4"></div>
</div>
<span class="text-xs font-medium text-yellow-600">75%</span>
</div>
</td>
<td class="px-6 py-4 text-right">
<button class="text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined">more_vert</span>
</button>
</td>
</tr>
<tr>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-3">
<img class="rounded-full size-8" data-alt="Employee avatar" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCkAyUjDSim-dQXklh1Astjc1SkTDAVUjvwMIjUgW4Un8xW6_FIFF5yPue7YXm8_zGSL5nyMKcZRSuePeScEbzy2SiiL3UJGZ6FIA5BEVM3zcuJaioR4cHIFBHXcNwUlNkhCmtt5GE3sqE3uxIlUNYhNs8JBzxV0YaA7FOB9sQU2aZdoKCSCFnfEatsBV9wC6wdcmcQP5YtXvCKtbBYEERy4OsdaD3AqSIF0vgazGDnbzp7HZy9-0V9GOdIPdDCxsWgb7IjEUwZ8Ts"/>
<div class="text-sm font-bold">Robert Fox</div>
</div>
</td>
<td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Operations</td>
<td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Mar 22, 2024</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<div class="w-16 bg-slate-200 dark:bg-slate-700 h-1.5 rounded-full overflow-hidden">
<div class="bg-green-500 h-full w-[90%]"></div>
</div>
<span class="text-xs font-medium text-green-600">90%</span>
</div>
</td>
<td class="px-6 py-4 text-right">
<button class="text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined">more_vert</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<div class="p-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
<p class="text-xs text-slate-500">Showing 1 to 3 of 42 employees</p>
<div class="flex gap-2">
<button class="px-3 py-1 border border-slate-200 dark:border-slate-700 rounded text-xs font-medium hover:bg-slate-50">Previous</button>
<button class="px-3 py-1 border border-slate-200 dark:border-slate-700 rounded text-xs font-medium bg-slate-100 dark:bg-slate-800">1</button>
<button class="px-3 py-1 border border-slate-200 dark:border-slate-700 rounded text-xs font-medium hover:bg-slate-50">2</button>
<button class="px-3 py-1 border border-slate-200 dark:border-slate-700 rounded text-xs font-medium hover:bg-slate-50">Next</button>
</div>
</div>
</div>
</div>
</main>
</div>
</body></html>