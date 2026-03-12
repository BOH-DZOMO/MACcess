<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Attendance Report</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
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
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                },
            },
        }
    </script>
</head>
<body class="bg-background-light dark:bg-background-dark text-[#0d121b] dark:text-white font-display">
<div class="flex min-h-screen w-full">
<!-- Sidebar -->
<aside class="hidden w-64 flex-col border-r border-[#e7ebf3] dark:border-[#2d3748] bg-white dark:bg-[#1a202c] md:flex">
<div class="flex h-full flex-col justify-between p-4">
<div class="flex flex-col gap-4">
<!-- Logo Area -->
<div class="flex gap-3 px-2">
<div class="bg-primary/10 flex items-center justify-center rounded-lg size-10 text-primary">
<span class="material-symbols-outlined text-2xl">grid_view</span>
</div>
<div class="flex flex-col justify-center">
<h1 class="text-[#0d121b] dark:text-white text-base font-bold leading-normal">Attendance Mgr</h1>
<p class="text-[#4c669a] dark:text-[#a0aec0] text-xs font-normal leading-normal">Admin Console</p>
</div>
</div>
<!-- Navigation -->
<nav class="flex flex-col gap-2 mt-4">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-background-light dark:hover:bg-white/5 transition-colors group" href="#">
<span class="material-symbols-outlined text-[#4c669a] dark:text-[#a0aec0] group-hover:text-primary">dashboard</span>
<p class="text-[#0d121b] dark:text-[#e2e8f0] text-sm font-medium leading-normal">Dashboard</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-background-light dark:hover:bg-white/5 transition-colors group" href="#">
<span class="material-symbols-outlined text-[#4c669a] dark:text-[#a0aec0] group-hover:text-primary">meeting_room</span>
<p class="text-[#0d121b] dark:text-[#e2e8f0] text-sm font-medium leading-normal">Rooms</p>
</a>
<!-- Active State -->
<a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/10 text-primary" href="#">
<span class="material-symbols-outlined fill-1">description</span>
<p class="text-primary text-sm font-medium leading-normal">Reports</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-background-light dark:hover:bg-white/5 transition-colors group" href="#">
<span class="material-symbols-outlined text-[#4c669a] dark:text-[#a0aec0] group-hover:text-primary">settings</span>
<p class="text-[#0d121b] dark:text-[#e2e8f0] text-sm font-medium leading-normal">Settings</p>
</a>
</nav>
</div>
<!-- Bottom Action -->
<div class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/10 cursor-pointer transition-colors">
<span class="material-symbols-outlined text-red-500">logout</span>
<p class="text-red-500 text-sm font-medium leading-normal">Sign Out</p>
</div>
</div>
</aside>
<!-- Main Content -->
<main class="flex flex-1 flex-col min-w-0 overflow-hidden">
<!-- Header -->
<header class="flex h-16 items-center justify-between border-b border-[#e7ebf3] dark:border-[#2d3748] bg-white dark:bg-[#1a202c] px-6 py-3">
<div class="flex items-center gap-4 lg:hidden">
<button class="text-[#4c669a] dark:text-[#a0aec0]">
<span class="material-symbols-outlined">menu</span>
</button>
</div>
<!-- Breadcrumbs / Title for Mobile -->
<div class="hidden md:flex items-center text-sm">
<span class="text-[#4c669a] dark:text-[#a0aec0]">Reports</span>
<span class="material-symbols-outlined text-[#4c669a] text-sm mx-2">chevron_right</span>
<span class="font-medium text-[#0d121b] dark:text-white">Attendance</span>
</div>
<div class="flex flex-1 justify-end items-center gap-4">
<!-- Search -->
<div class="hidden md:flex items-center bg-[#f6f6f8] dark:bg-[#2d3748] rounded-lg h-9 px-3 w-64 focus-within:ring-2 focus-within:ring-primary/50 transition-all">
<span class="material-symbols-outlined text-[#4c669a] dark:text-[#a0aec0] text-[20px]">search</span>
<input class="bg-transparent border-none text-sm ml-2 w-full text-[#0d121b] dark:text-white placeholder-[#4c669a] focus:ring-0" placeholder="Search reports..."/>
</div>
<!-- Actions -->
<button class="flex items-center justify-center size-9 rounded-full hover:bg-[#f6f6f8] dark:hover:bg-[#2d3748] text-[#4c669a] dark:text-[#a0aec0] transition-colors relative">
<span class="material-symbols-outlined text-[22px]">notifications</span>
<span class="absolute top-2 right-2 size-2 bg-red-500 rounded-full border border-white dark:border-[#1a202c]"></span>
</button>
<div class="size-9 rounded-full bg-cover bg-center ring-2 ring-white dark:ring-[#1a202c] cursor-pointer" data-alt="User profile picture showing a smiling professional" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuC7vDvV_0JPnN3hy6Lwze8MoqrM73bmZhxpQLH2zAH8kvVd5wxUVxrgDH1CdyGQSzusVTT_ze1BLHnlRo8tY5WA_zpLUKhblY030VlThQth9T9LvwPnARxmRtvQghH2cd6ceyAL7mlKWl-N0_S4nAzHngT3DnNdaC-aai_cguknnwBssTGwXfsH2ImNj3YsWFXo1eoHtqSmYp9TImMT3D1bkggruCA8bAEDkwmUQjtfvac7gvRUWSe-ml5kVyPQEHhEh3crSJOKSIQ");'></div>
</div>
</header>
<!-- Scrollable Content -->
<div class="flex-1 overflow-y-auto p-4 md:p-8 space-y-6">
<!-- Page Heading -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
<div>
<h1 class="text-2xl md:text-3xl font-bold text-[#0d121b] dark:text-white tracking-tight">Attendance Report</h1>
<p class="text-[#4c669a] dark:text-[#a0aec0] mt-1">Generate detailed logs for official and adhoc meetings.</p>
</div>
<div class="flex gap-2">
<button class="flex items-center gap-2 px-4 py-2 bg-white dark:bg-[#2d3748] border border-[#e7ebf3] dark:border-[#4a5568] rounded-lg text-sm font-medium text-[#0d121b] dark:text-white hover:bg-gray-50 dark:hover:bg-[#394557] transition-colors">
<span class="material-symbols-outlined text-[18px]">tune</span>
                        Customize
                    </button>
<button class="flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors shadow-sm shadow-primary/30">
<span class="material-symbols-outlined text-[18px]">download</span>
                        Generate Report
                    </button>
</div>
</div>
<!-- Filters & Configuration Card -->
<div class="bg-white dark:bg-[#1a202c] rounded-xl shadow-sm border border-[#e7ebf3] dark:border-[#2d3748] overflow-hidden">
<!-- Tabs -->
<div class="flex border-b border-[#e7ebf3] dark:border-[#2d3748]">
<button class="flex-1 px-6 py-3 text-sm font-medium text-primary border-b-2 border-primary bg-primary/5 dark:bg-primary/10 transition-colors">
                        Official Rooms
                    </button>
<button class="flex-1 px-6 py-3 text-sm font-medium text-[#4c669a] dark:text-[#a0aec0] hover:text-[#0d121b] dark:hover:text-white transition-colors">
                        Adhoc Events
                    </button>
</div>
<div class="p-5 grid grid-cols-1 md:grid-cols-12 gap-6 items-end">
<!-- Room Selection -->
<div class="md:col-span-4 flex flex-col gap-1.5">
<label class="text-xs font-semibold text-[#4c669a] dark:text-[#a0aec0] uppercase tracking-wider">Select Room</label>
<div class="relative">
<select class="w-full h-10 pl-3 pr-10 text-sm bg-[#f6f6f8] dark:bg-[#2d3748] border-none rounded-lg focus:ring-2 focus:ring-primary text-[#0d121b] dark:text-white appearance-none cursor-pointer">
<option>Executive Boardroom A</option>
<option>Marketing Huddle Area</option>
<option>Main Hall - Townhall</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-2.5 text-[#4c669a] pointer-events-none text-[20px]">expand_more</span>
</div>
</div>
<!-- Date Range -->
<div class="md:col-span-3 flex flex-col gap-1.5">
<label class="text-xs font-semibold text-[#4c669a] dark:text-[#a0aec0] uppercase tracking-wider">Date Range</label>
<div class="relative">
<input class="w-full h-10 pl-9 pr-3 text-sm bg-[#f6f6f8] dark:bg-[#2d3748] border-none rounded-lg focus:ring-2 focus:ring-primary text-[#0d121b] dark:text-white cursor-pointer" readonly="" type="text" value="Oct 24, 2023 - Oct 31, 2023"/>
<span class="material-symbols-outlined absolute left-2.5 top-2.5 text-[#4c669a] pointer-events-none text-[18px]">calendar_today</span>
</div>
</div>
<!-- Status Filter -->
<div class="md:col-span-3 flex flex-col gap-1.5">
<label class="text-xs font-semibold text-[#4c669a] dark:text-[#a0aec0] uppercase tracking-wider">Status</label>
<div class="relative">
<select class="w-full h-10 pl-3 pr-10 text-sm bg-[#f6f6f8] dark:bg-[#2d3748] border-none rounded-lg focus:ring-2 focus:ring-primary text-[#0d121b] dark:text-white appearance-none cursor-pointer">
<option>All Statuses</option>
<option>Present</option>
<option>Absent</option>
<option>Late</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-2.5 text-[#4c669a] pointer-events-none text-[20px]">filter_list</span>
</div>
</div>
<!-- Location Toggle -->
<div class="md:col-span-2 flex items-center justify-start md:justify-center pb-2 gap-3">
<label class="inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox" value=""/>
<div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/50 dark:peer-focus:ring-primary/80 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
<span class="ms-3 text-sm font-medium text-[#0d121b] dark:text-gray-300">Geo-Location</span>
</label>
</div>
</div>
</div>
<!-- Stats Overview -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
<div class="bg-white dark:bg-[#1a202c] p-4 rounded-xl shadow-sm border border-[#e7ebf3] dark:border-[#2d3748] flex items-center gap-4">
<div class="bg-blue-50 dark:bg-blue-900/20 text-blue-600 p-3 rounded-lg">
<span class="material-symbols-outlined text-2xl">groups</span>
</div>
<div>
<p class="text-[#4c669a] dark:text-[#a0aec0] text-sm">Total Attendees</p>
<p class="text-2xl font-bold text-[#0d121b] dark:text-white">124</p>
</div>
</div>
<div class="bg-white dark:bg-[#1a202c] p-4 rounded-xl shadow-sm border border-[#e7ebf3] dark:border-[#2d3748] flex items-center gap-4">
<div class="bg-green-50 dark:bg-green-900/20 text-green-600 p-3 rounded-lg">
<span class="material-symbols-outlined text-2xl">check_circle</span>
</div>
<div>
<p class="text-[#4c669a] dark:text-[#a0aec0] text-sm">Attendance Rate</p>
<p class="text-2xl font-bold text-[#0d121b] dark:text-white">92%</p>
</div>
</div>
<div class="bg-white dark:bg-[#1a202c] p-4 rounded-xl shadow-sm border border-[#e7ebf3] dark:border-[#2d3748] flex items-center gap-4">
<div class="bg-orange-50 dark:bg-orange-900/20 text-orange-600 p-3 rounded-lg">
<span class="material-symbols-outlined text-2xl">schedule</span>
</div>
<div>
<p class="text-[#4c669a] dark:text-[#a0aec0] text-sm">Avg. Duration</p>
<p class="text-2xl font-bold text-[#0d121b] dark:text-white">1h 45m</p>
</div>
</div>
</div>
<!-- Data Table Section -->
<div class="bg-white dark:bg-[#1a202c] rounded-xl shadow-sm border border-[#e7ebf3] dark:border-[#2d3748] flex flex-col">
<div class="flex items-center justify-between p-4 border-b border-[#e7ebf3] dark:border-[#2d3748]">
<h3 class="text-lg font-bold text-[#0d121b] dark:text-white">Detailed Logs</h3>
<div class="flex gap-2">
<button class="p-2 text-[#4c669a] hover:bg-[#f6f6f8] dark:hover:bg-[#2d3748] rounded-lg transition-colors">
<span class="material-symbols-outlined">refresh</span>
</button>
<button class="p-2 text-[#4c669a] hover:bg-[#f6f6f8] dark:hover:bg-[#2d3748] rounded-lg transition-colors">
<span class="material-symbols-outlined">more_vert</span>
</button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left text-sm text-[#0d121b] dark:text-white">
<thead class="bg-[#f8f9fc] dark:bg-[#2d3748] text-[#4c669a] dark:text-[#a0aec0] uppercase text-xs font-semibold">
<tr>
<th class="px-6 py-4">Employee</th>
<th class="px-6 py-4">Role</th>
<th class="px-6 py-4">Check In</th>
<th class="px-6 py-4">Check Out</th>
<th class="px-6 py-4">Location</th>
<th class="px-6 py-4">Status</th>
<th class="px-6 py-4 text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-[#e7ebf3] dark:divide-[#2d3748]">
<!-- Row 1 -->
<tr class="hover:bg-[#f8f9fc] dark:hover:bg-[#2d3748]/50 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="size-8 rounded-full bg-cover bg-center" data-alt="Profile picture of Sarah Miller" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBMW86QamYRUy3wrN5rmWs3noQf6E0tFXZEdgSHwKtybPIvP_KnTrHXUJ_BCp8RPU-kp_avRSbjF06GREZkHsATWdzHuQnA_Y80dGbGNWASuY9CfuxdfUB0Py9-dL3ggIBI0wm2Czjf7xw9FNYCbxTa_jSfqv3uO0cr5CNvNXZ5ECMwrNipcnBWHkaK1pdtSjUyVcZFiezRLjaiKApwjb1TIQOgpYh4qMt4IKfzfhyqFqQIdR8-cksPhbC9AyflYQCis1a3y9D9KZc");'></div>
<div class="font-medium">Sarah Miller</div>
</div>
</td>
<td class="px-6 py-4 text-[#4c669a] dark:text-[#a0aec0]">Project Manager</td>
<td class="px-6 py-4">08:55 AM</td>
<td class="px-6 py-4">05:02 PM</td>
<td class="px-6 py-4">
<div class="flex items-center gap-1 text-[#4c669a] dark:text-[#a0aec0]">
<span class="material-symbols-outlined text-[16px]">location_on</span>
<span>HQ - FL3</span>
</div>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300 border border-green-200 dark:border-green-800">
<span class="size-1.5 rounded-full bg-green-500"></span>
                                        Present
                                    </span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-primary font-medium text-xs hover:underline">View</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-[#f8f9fc] dark:hover:bg-[#2d3748]/50 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="size-8 rounded-full bg-cover bg-center" data-alt="Profile picture of David Chen" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDy0UuGglrj4jTRBZjauqLveUS3paxlM1nIxBrKHBZTVvbOyV6g9xp5Zy4Vwuu1wru8rHNoWrSMy8OZs-rkuIGqz8JQ2_X-n4xb5DAwj1Jn7TVia0lPxB_r2DSYkP4MExK1E0AOt7lx5BV_d2VKjNFhVTfx5G5WGzqkSwOOisBQ_5wVthmjlXzoMdhqyA1EOWB6GfZU1sP4vQwB5OEj-nTkA00ozWH_GKjtkbTRrLBeYlT-IhJNqOvBhdktuOoSI-cx7wqyJ3_06w0");'></div>
<div class="font-medium">David Chen</div>
</div>
</td>
<td class="px-6 py-4 text-[#4c669a] dark:text-[#a0aec0]">Developer</td>
<td class="px-6 py-4">09:15 AM</td>
<td class="px-6 py-4">--</td>
<td class="px-6 py-4">
<div class="flex items-center gap-1 text-[#4c669a] dark:text-[#a0aec0]">
<span class="material-symbols-outlined text-[16px]">location_on</span>
<span>Remote</span>
</div>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300 border border-yellow-200 dark:border-yellow-800">
<span class="size-1.5 rounded-full bg-yellow-500"></span>
                                        Late
                                    </span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-primary font-medium text-xs hover:underline">View</button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-[#f8f9fc] dark:hover:bg-[#2d3748]/50 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="size-8 rounded-full bg-cover bg-center" data-alt="Profile picture of James Wilson" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCCPiBHiKtzQsRCQ8sGzHATy_PEwyTpFIiY2mOYVq0iPtVys9gnVSxqnRjJtlahh8UOaUv4GTsT35mOWT-8YJuK56SmqzXAxr0qMn4O3NLqIxHxHAIrs5lXRwodd5YNW1mvlaSXsYd2LlQVqU_GKgkxeYCHAZLV7P9iNMAmmc6wW0twGT7m2QCY_7bpe0ZXNmyzxFe4dYZNzCPtaeyJqHEaNDHnnDZvk1G_CqrNbr3Gzumxp3uIaY3MlUDWl3onJeCAvSi5k7RIfSw");'></div>
<div class="font-medium">James Wilson</div>
</div>
</td>
<td class="px-6 py-4 text-[#4c669a] dark:text-[#a0aec0]">Designer</td>
<td class="px-6 py-4 text-[#4c669a]">--</td>
<td class="px-6 py-4 text-[#4c669a]">--</td>
<td class="px-6 py-4">
<span class="text-[#4c669a] dark:text-[#a0aec0]">-</span>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300 border border-red-200 dark:border-red-800">
<span class="size-1.5 rounded-full bg-red-500"></span>
                                        Absent
                                    </span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-primary font-medium text-xs hover:underline">View</button>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-[#f8f9fc] dark:hover:bg-[#2d3748]/50 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="size-8 rounded-full bg-cover bg-center" data-alt="Profile picture of Elena Rodriguez" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAtFERo_uS9Ag74SjShqNq9_oR4GUgeIjOSiOqy33xQ5BhVLy15wCaeLgxULah6wcNPC9RDw3g1n6nODhCHQtt-EQDHeoOOBOgWfg4icZwuLyQkr7u4BbqVZaFx8QBj0TSWEmdr-aooKG5CaWeTfFt8slNHZQ3LzzcP5zFohMGKu9WB7XmyYSG-ecCW6EUqKg7D4n6uCbiGie8w7G1f1BewF3LCGxDxtHPkWYqAbWdICcrliTiPGmtjLHKqtHslCAkEU4xbR5XiCvQ");'></div>
<div class="font-medium">Elena Rodriguez</div>
</div>
</td>
<td class="px-6 py-4 text-[#4c669a] dark:text-[#a0aec0]">Analyst</td>
<td class="px-6 py-4">08:45 AM</td>
<td class="px-6 py-4">05:30 PM</td>
<td class="px-6 py-4">
<div class="flex items-center gap-1 text-[#4c669a] dark:text-[#a0aec0]">
<span class="material-symbols-outlined text-[16px]">location_on</span>
<span>HQ - FL2</span>
</div>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300 border border-green-200 dark:border-green-800">
<span class="size-1.5 rounded-full bg-green-500"></span>
                                        Present
                                    </span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-primary font-medium text-xs hover:underline">View</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="flex items-center justify-between p-4 border-t border-[#e7ebf3] dark:border-[#2d3748]">
<span class="text-sm text-[#4c669a] dark:text-[#a0aec0]">Showing <span class="font-medium text-[#0d121b] dark:text-white">1-4</span> of <span class="font-medium text-[#0d121b] dark:text-white">124</span> results</span>
<div class="flex gap-2">
<button class="flex items-center justify-center size-8 rounded-lg border border-[#e7ebf3] dark:border-[#4a5568] text-[#4c669a] dark:text-[#a0aec0] hover:bg-[#f6f6f8] dark:hover:bg-[#2d3748] disabled:opacity-50">
<span class="material-symbols-outlined text-[18px]">chevron_left</span>
</button>
<button class="flex items-center justify-center size-8 rounded-lg bg-primary text-white text-sm font-medium">1</button>
<button class="flex items-center justify-center size-8 rounded-lg border border-[#e7ebf3] dark:border-[#4a5568] text-[#4c669a] dark:text-[#a0aec0] hover:bg-[#f6f6f8] dark:hover:bg-[#2d3748] text-sm font-medium">2</button>
<button class="flex items-center justify-center size-8 rounded-lg border border-[#e7ebf3] dark:border-[#4a5568] text-[#4c669a] dark:text-[#a0aec0] hover:bg-[#f6f6f8] dark:hover:bg-[#2d3748] text-sm font-medium">...</button>
<button class="flex items-center justify-center size-8 rounded-lg border border-[#e7ebf3] dark:border-[#4a5568] text-[#4c669a] dark:text-[#a0aec0] hover:bg-[#f6f6f8] dark:hover:bg-[#2d3748]">
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</div>
</div>
</div>
</main>
</div>
</body></html>