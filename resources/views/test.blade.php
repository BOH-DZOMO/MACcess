<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Attendance Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
{{-- <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script> --}}
    @vite(['resources/css/app.css','resources/js/app.js'])

<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2b6cee",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101622",
                        "surface-light": "#ffffff",
                        "surface-dark": "#1a212e",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
<style>
        /* Custom scrollbar for webkit */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-[#0d121b] dark:text-white font-display overflow-hidden antialiased">
<div class="flex h-screen w-full">
<!-- Sidebar -->
<aside class="w-64 hidden md:flex flex-col bg-surface-light dark:bg-surface-dark border-r border-[#e7ebf3] dark:border-gray-800 transition-all duration-300">
<div class="p-6 pb-2">
<div class="flex items-center gap-3">
<div class="flex items-center justify-center w-10 h-10 rounded-xl bg-primary text-white">
<span class="material-symbols-outlined">grid_view</span>
</div>
<span class="text-xl font-bold tracking-tight text-slate-900 dark:text-white">Attendo</span>
</div>
</div>
<nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
<a class="flex items-center gap-3 px-3 py-3 rounded-lg bg-primary/10 text-primary group" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">dashboard</span>
<span class="text-sm font-semibold">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-3 py-3 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-slate-50 dark:text-slate-400 dark:hover:text-white dark:hover:bg-gray-800 transition-colors group" href="#">
<span class="material-symbols-outlined">meeting_room</span>
<span class="text-sm font-medium">Official Rooms</span>
</a>
<a class="flex items-center gap-3 px-3 py-3 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-slate-50 dark:text-slate-400 dark:hover:text-white dark:hover:bg-gray-800 transition-colors group" href="#">
<span class="material-symbols-outlined">meeting_room</span>
<span class="text-sm font-medium">Adhoc Rooms</span>
</a>
<a class="flex items-center gap-3 px-3 py-3 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-slate-50 dark:text-slate-400 dark:hover:text-white dark:hover:bg-gray-800 transition-colors group" href="#">
<span class="material-symbols-outlined">location_on</span>
<span class="text-sm font-medium">Locations</span>
</a>
<a class="flex items-center gap-3 px-3 py-3 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-slate-50 dark:text-slate-400 dark:hover:text-white dark:hover:bg-gray-800 transition-colors group" href="#">
<span class="material-symbols-outlined">bar_chart</span>
<span class="text-sm font-medium">Reports</span>
</a>
<a class="flex items-center gap-3 px-3 py-3 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-slate-50 dark:text-slate-400 dark:hover:text-white dark:hover:bg-gray-800 transition-colors group" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="text-sm font-medium">Settings</span>
</a>
</nav>
<div class="p-4 border-t border-[#e7ebf3] dark:border-gray-800">
<div class="flex items-center gap-3 p-2 rounded-lg hover:bg-slate-50 dark:hover:bg-gray-800 cursor-pointer transition-colors">
<div class="bg-center bg-no-repeat bg-cover rounded-full size-10 shadow-sm" data-alt="User avatar showing a professional looking person" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBB2sFVFiRPK7GyMa38j9WZ3VAVDExaAfKPHrePgXiphkJwAzzRwyTlCH0K0VgOvS-A6wzMALqq_txjtVZo_3zzKX37-5JwmF15HYc80o9LhiY0bU2YDoNyypXmdqKIUMU4YV3jqYDsRvVggDceI-q5NNPMbSt52xszZWjzR2PBQooybctfdWiy3pvPf-aNvkrEvHHz6XNVrZVu9P5VGxdBP3OoBZ1vShQIj4hlsIuHTzVHzJ1iWua0bgrgYjVZZj3hY2sPvy6CQjw");'></div>
<div class="flex flex-col overflow-hidden">
<p class="text-sm font-semibold text-slate-900 dark:text-white truncate">Alex Morgan</p>
<p class="text-xs text-slate-500 dark:text-slate-400 truncate">Admin Manager</p>
</div>
<span class="material-symbols-outlined text-slate-400 ml-auto text-lg">expand_more</span>
</div>
</div>
</aside>
<!-- Main Content -->
<main class="flex-1 flex flex-col h-full overflow-hidden relative">
<!-- Top Header -->
<header class="h-16 flex items-center justify-between px-6 py-4 bg-surface-light/80 dark:bg-surface-dark/80 backdrop-blur-md border-b border-[#e7ebf3] dark:border-gray-800 z-10">
<div class="flex items-center gap-4">
<button class="md:hidden p-2 rounded-lg text-slate-500 hover:bg-slate-100 dark:hover:bg-gray-800">
<span class="material-symbols-outlined">menu</span>
</button>
<!-- Breadcrumbs or simple context -->
<div class="hidden sm:flex text-sm text-slate-500 dark:text-slate-400 font-medium">
                        Dashboard
                    </div>
</div>
<div class="flex items-center gap-4 flex-1 justify-end">
<!-- Search -->
<div class="hidden sm:flex relative group w-full max-w-sm mr-4">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-slate-400">search</span>
</div>
<input class="block w-full pl-10 pr-3 py-2 border-none rounded-lg leading-5 bg-slate-100 dark:bg-gray-800 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary/50 transition duration-150 ease-in-out sm:text-sm" placeholder="Search rooms, people..." type="text"/>
</div>
<!-- Actions -->
<button class="relative p-2 rounded-lg text-slate-500 hover:bg-slate-100 dark:hover:bg-gray-800 transition-colors">
<span class="material-symbols-outlined">notifications</span>
<span class="absolute top-2 right-2 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white dark:ring-gray-900"></span>
</button>
<button class="bg-primary hover:bg-primary/90 text-white text-sm font-medium py-2 px-4 rounded-lg shadow-sm shadow-primary/30 flex items-center gap-2 transition-all">
<span class="material-symbols-outlined text-[18px]">add</span>
<span class="hidden sm:inline">Create Event</span>
</button>
</div>
</header>
<!-- Content Scroll Area -->
<div class="flex-1 overflow-y-auto p-6 md:p-8">
<div class="max-w-7xl mx-auto space-y-8">
<!-- Welcome Section -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
<div>
<h1 class="text-3xl font-bold text-slate-900 dark:text-white tracking-tight">Good Morning, Alex</h1>
<p class="text-slate-500 dark:text-slate-400 mt-1">Here's what's happening in your rooms today.</p>
</div>
<div class="text-sm text-slate-500 dark:text-slate-400 font-medium bg-white dark:bg-surface-dark px-3 py-1 rounded-lg border border-slate-200 dark:border-gray-700 shadow-sm">
<span class="text-primary font-bold">Today:</span> Oct 24, 2023
                        </div>
</div>
<!-- Stats Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Card 1 -->
<div class="bg-surface-light dark:bg-surface-dark p-5 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 dark:border-gray-800 flex flex-col gap-4 group hover:border-primary/20 transition-all">
    <div class="flex justify-between items-start">
        <div class="p-2 bg-blue-50 dark:bg-blue-900/20 rounded-lg text-primary">
            <span class="material-symbols-outlined">meeting_room</span>
        </div>
        <span class="text-xs font-semibold text-green-600 bg-green-50 dark:bg-green-900/20 px-2 py-1 rounded-full">+2 New</span>
    </div>
    <div>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Rooms</p>
        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mt-1">124</h3>
    </div>
</div>
<!-- Card 2 -->
<div class="bg-surface-light dark:bg-surface-dark p-5 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 dark:border-gray-800 flex flex-col gap-4 group hover:border-primary/20 transition-all">
    <div class="flex justify-between items-start">
        <div class="p-2 bg-green-50 dark:bg-green-900/20 rounded-lg text-green-600">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">sensors</span>
        </div>
        <span class="flex h-3 w-3 relative">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
        </span>
    </div>
    <div>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Active Now</p>
        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mt-1">18</h3>
    </div>
</div>
<!-- Card 3 -->
<div class="bg-surface-light dark:bg-surface-dark p-5 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 dark:border-gray-800 flex flex-col gap-4 group hover:border-primary/20 transition-all">
<div class="flex justify-between items-start">
    <div class="p-2 bg-purple-50 dark:bg-purple-900/20 rounded-lg text-purple-600">
        <span class="material-symbols-outlined">verified_user</span>
    </div>
    <span class="text-xs font-semibold text-green-600 bg-green-50 dark:bg-green-900/20 px-2 py-1 rounded-full">+12%</span>
</div>
<div>
    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Check-ins Today</p>
    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mt-1">342</h3>
</div>
</div>
<!-- Card 4 -->
<div class="bg-surface-light dark:bg-surface-dark p-5 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 dark:border-gray-800 flex flex-col gap-4 group hover:border-primary/20 transition-all">
<div class="flex justify-between items-start">
    <div class="p-2 bg-orange-50 dark:bg-orange-900/20 rounded-lg text-orange-600">
        <span class="material-symbols-outlined">event</span>
    </div>
<span class="text-xs font-semibold text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-gray-800 px-2 py-1 rounded-full">Next 2h</span>
</div>
<div>
    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Upcoming Events</p>
    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mt-1">8</h3>
</div>
</div>
</div>
<!-- Split Content Area -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<!-- Recent Activity Table (2/3 width) -->
<div class="lg:col-span-2 bg-surface-light dark:bg-surface-dark rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 dark:border-gray-800 overflow-hidden flex flex-col">
<div class="px-6 py-5 border-b border-slate-100 dark:border-gray-800 flex justify-between items-center">
<h2 class="text-lg font-bold text-slate-900 dark:text-white">Recent Attendance</h2>
<button class="text-sm font-medium text-primary hover:text-primary/80 transition-colors">View All</button>
</div>
<div class="overflow-x-auto flex-1">
<table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
<thead class="bg-slate-50 dark:bg-gray-800/50 text-xs uppercase font-semibold text-slate-500 dark:text-slate-400">
<tr>
<th class="px-6 py-4">User</th>
<th class="px-6 py-4">Room</th>
<th class="px-6 py-4">Time</th>
<th class="px-6 py-4">Status</th>
<th class="px-6 py-4"></th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 dark:divide-gray-800">
<tr class="hover:bg-slate-50/50 dark:hover:bg-gray-800/50 transition-colors">
<td class="px-6 py-4 font-medium text-slate-900 dark:text-white flex items-center gap-3">
<div class="h-8 w-8 rounded-full bg-cover bg-center" data-alt="Portrait of Sarah J." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBRoiNAqSoqHZkTxEhBf0awvJpFr0lOP1kDdOiOD-E4jn4JHo7IZwtDYgZ7wzJ2t4LKtKGbIs-tpK5sXUo7cq8EFOgxm-qjEqIwImoHma4l5LuDanF6uUh8tCpyYejoOMVA6pLLCcpsYqMCGQ-XfllUzFnYrkQzVxf4MbX2MP3LZBofC4uL3wp0vqVn5SmuhlM4tDoChAm4CEsv7KowoVz1LoZXsolMP783MKg4oh8ZaJhRIQpU3G8aRbWq02QMYYw0E_juKKADAg4");'></div>
                                                Sarah Jenkins
                                            </td>
<td class="px-6 py-4">Conf. Room A</td>
<td class="px-6 py-4">10:02 AM</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400">
<span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Verified
                                                </span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<tr class="hover:bg-slate-50/50 dark:hover:bg-gray-800/50 transition-colors">
<td class="px-6 py-4 font-medium text-slate-900 dark:text-white flex items-center gap-3">
<div class="h-8 w-8 rounded-full bg-cover bg-center" data-alt="Portrait of Michael C." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBmJjWU6Ae1O8K5PpyK5mZVuTeInLZyQoPhnGlm7KPBSad565x_sSBtLM3uxqPMh34RV1tehf0CXoo7Rgb_1FJlhxJ7gQK_Z7v-ryHw3Unuj-aCsiyhcq8tCFFp4afDLX8_US_ZjnJAm0O-6cGMtybl3x9oHva8feCsxlxm4caS-yR2ZPHpWflB1rpCGeiom_puCMC3rnUJUnX25hRPeUYMdIrK0jKijqfgwqYMhH4YCiPKZgno4icR_cbDKD7CN6a84bJH-FuQa0Y");'></div>
                                                Michael Chen
                                            </td>
<td class="px-6 py-4">Focus Room 3</td>
<td class="px-6 py-4">09:45 AM</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400">
<span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Verified
                                                </span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<tr class="hover:bg-slate-50/50 dark:hover:bg-gray-800/50 transition-colors">
<td class="px-6 py-4 font-medium text-slate-900 dark:text-white flex items-center gap-3">
<div class="h-8 w-8 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 flex items-center justify-center text-xs font-bold">JD</div>
                                                James Doe
                                            </td>
<td class="px-6 py-4">Main Hall</td>
<td class="px-6 py-4">09:30 AM</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400">
<span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> Pending
                                                </span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<tr class="hover:bg-slate-50/50 dark:hover:bg-gray-800/50 transition-colors">
<td class="px-6 py-4 font-medium text-slate-900 dark:text-white flex items-center gap-3">
<div class="h-8 w-8 rounded-full bg-cover bg-center" data-alt="Portrait of Emily R." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDukoO228S1CpC6tC1VhspA4EUNgaodKpi5nXV06Gk1xsXw9MJh9KbrCqsJyyK7g0woukTuggmJbTgTO-YojJfguKEcUNH_34DBwaKUvXSFOiZHq88r0oZ2jMSqLJtHNoIEKrSRsYNDMzkXFAZqNkJqxZXnxSo7j14Vq0mVlbxwCYESoh6yht2_rsPBWf3KKwdM9OgQvDI8q3KNuyp5afUkIMF1Rb3OXj7V3wRrKoBP3jdUDC5nsfHJsZnD86rk22f_EgffFjjzauE");'></div>
                                                Emily Rose
                                            </td>
<td class="px-6 py-4">Design Lab</td>
<td class="px-6 py-4">09:15 AM</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400">
<span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Verified
                                                </span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<tr class="hover:bg-slate-50/50 dark:hover:bg-gray-800/50 transition-colors">
<td class="px-6 py-4 font-medium text-slate-900 dark:text-white flex items-center gap-3">
<div class="h-8 w-8 rounded-full bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-300 flex items-center justify-center text-xs font-bold">AK</div>
                                                Alex Knight
                                            </td>
<td class="px-6 py-4">Conf. Room B</td>
<td class="px-6 py-4">09:05 AM</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400">
<span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Rejected
                                                </span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Active Rooms List (1/3 width) -->
<div class="lg:col-span-1 bg-surface-light dark:bg-surface-dark rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 dark:border-gray-800 flex flex-col">
<div class="px-6 py-5 border-b border-slate-100 dark:border-gray-800">
<h2 class="text-lg font-bold text-slate-900 dark:text-white">Active Rooms</h2>
</div>
<div class="p-4 space-y-3 overflow-y-auto max-h-[400px]">
<!-- Room Item 1 -->
<div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 dark:bg-gray-800/50 hover:bg-slate-100 dark:hover:bg-gray-800 transition-colors cursor-pointer group">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-white dark:bg-gray-700 shadow-sm flex items-center justify-center text-slate-400 group-hover:text-primary transition-colors">
<span class="material-symbols-outlined">videocam</span>
</div>
<div>
<p class="text-sm font-semibold text-slate-900 dark:text-white">Boardroom A</p>
<p class="text-xs text-slate-500">Meeting: Q3 Strategy</p>
</div>
</div>
<span class="text-xs font-medium text-red-500 bg-red-50 dark:bg-red-900/20 px-2 py-1 rounded-md">Occupied</span>
</div>
<!-- Room Item 2 -->
<div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 dark:bg-gray-800/50 hover:bg-slate-100 dark:hover:bg-gray-800 transition-colors cursor-pointer group">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-white dark:bg-gray-700 shadow-sm flex items-center justify-center text-slate-400 group-hover:text-primary transition-colors">
<span class="material-symbols-outlined">groups</span>
</div>
<div>
<p class="text-sm font-semibold text-slate-900 dark:text-white">Huddle Space</p>
<p class="text-xs text-slate-500">Meeting: Design Sync</p>
</div>
</div>
<span class="text-xs font-medium text-red-500 bg-red-50 dark:bg-red-900/20 px-2 py-1 rounded-md">Occupied</span>
</div>
<!-- Room Item 3 -->
<div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 dark:bg-gray-800/50 hover:bg-slate-100 dark:hover:bg-gray-800 transition-colors cursor-pointer group">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-white dark:bg-gray-700 shadow-sm flex items-center justify-center text-slate-400 group-hover:text-primary transition-colors">
<span class="material-symbols-outlined">podium</span>
</div>
<div>
<p class="text-sm font-semibold text-slate-900 dark:text-white">Auditorium</p>
<p class="text-xs text-slate-500">Event: Town Hall</p>
</div>
</div>
<span class="text-xs font-medium text-red-500 bg-red-50 dark:bg-red-900/20 px-2 py-1 rounded-md">Occupied</span>
</div>
<!-- Room Item 4 -->
<div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 dark:bg-gray-800/50 hover:bg-slate-100 dark:hover:bg-gray-800 transition-colors cursor-pointer group">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-white dark:bg-gray-700 shadow-sm flex items-center justify-center text-slate-400 group-hover:text-primary transition-colors">
<span class="material-symbols-outlined">meeting_room</span>
</div>
<div>
<p class="text-sm font-semibold text-slate-900 dark:text-white">Room 404</p>
<p class="text-xs text-slate-500">Available for booking</p>
</div>
</div>
<span class="text-xs font-medium text-green-600 bg-green-50 dark:bg-green-900/20 px-2 py-1 rounded-md">Free</span>
</div>
<button class="w-full mt-2 text-center text-sm font-medium text-primary py-2 hover:bg-primary/5 rounded-lg transition-colors">View All Rooms</button>
</div>
</div>
</div>
</div>
</div>
</main>
<!-- Floating Action Button for Mobile -->
<button class="md:hidden fixed bottom-6 right-6 h-14 w-14 bg-primary text-white rounded-2xl shadow-lg flex items-center justify-center z-50 hover:bg-primary/90 transition-colors">
<span class="material-symbols-outlined text-[28px]">add</span>
</button>
</div>
</body></html>