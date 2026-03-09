<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Official Rooms List</title>
        @vite(['resources/css/app.css','resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
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
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        /* Custom scrollbar for better aesthetics */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-white">
    <div class="flex h-screen w-full overflow-hidden">
        <!-- Sidebar -->
        <aside class="flex w-64 flex-col border-r border-[#e7ebf3] bg-white dark:bg-[#1a202c] hidden md:flex">
            <div class="flex h-full flex-col justify-between p-4">
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-3 px-2 py-2">
                        <div class="flex items-center justify-center rounded-lg bg-primary/10 p-2">
                            <span class="material-symbols-outlined text-primary">domain</span>
                        </div>
                        <h1 class="text-lg font-bold leading-tight tracking-[-0.015em] text-[#0d121b] dark:text-white">
                            Attendance Mgr</h1>
                    </div>
                    <div class="flex flex-col gap-2 mt-4">
                        <a class="flex items-center gap-3 rounded-lg px-3 py-2 text-[#4c669a] hover:bg-slate-50 hover:text-[#0d121b] transition-colors dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-white"
                            href="#">
                            <span class="material-symbols-outlined">dashboard</span>
                            <p class="text-sm font-medium leading-normal">Dashboard</p>
                        </a>
                        <!-- Active State -->
                        <a class="flex items-center gap-3 rounded-lg bg-primary/10 px-3 py-2 text-primary transition-colors dark:bg-primary/20 dark:text-blue-300"
                            href="#">
                            <span class="material-symbols-outlined"
                                style="font-variation-settings: 'FILL' 1;">meeting_room</span>
                            <p class="text-sm font-medium leading-normal">Official Rooms</p>
                        </a>
                        <a class="flex items-center gap-3 rounded-lg px-3 py-2 text-[#4c669a] hover:bg-slate-50 hover:text-[#0d121b] transition-colors dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-white"
                            href="#">
                            <span class="material-symbols-outlined">schedule</span>
                            <p class="text-sm font-medium leading-normal">Adhoc Rooms</p>
                        </a>
                        <a class="flex items-center gap-3 rounded-lg px-3 py-2 text-[#4c669a] hover:bg-slate-50 hover:text-[#0d121b] transition-colors dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-white"
                            href="#">
                            <span class="material-symbols-outlined">group</span>
                            <p class="text-sm font-medium leading-normal">Staff</p>
                        </a>
                        <a class="flex items-center gap-3 rounded-lg px-3 py-2 text-[#4c669a] hover:bg-slate-50 hover:text-[#0d121b] transition-colors dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-white"
                            href="#">
                            <span class="material-symbols-outlined">bar_chart</span>
                            <p class="text-sm font-medium leading-normal">Reports</p>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col gap-2 border-t border-[#e7ebf3] pt-4 dark:border-slate-700">
                    <a class="flex items-center gap-3 rounded-lg px-3 py-2 text-[#4c669a] hover:bg-slate-50 hover:text-[#0d121b] transition-colors dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-white"
                        href="#">
                        <span class="material-symbols-outlined">settings</span>
                        <p class="text-sm font-medium leading-normal">Settings</p>
                    </a>
                    <div class="flex items-center gap-3 px-3 py-2">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8"
                            data-alt="User profile picture placeholder with abstract gradient"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAVdEh9ezjb44SSON6NY9Dpv5fi4Bp9iQ73At9u6QqPEI4zSbkZEGlhnak3QN5Kaj1_UiT9YZOXCfNsdGgKI0tIrllDtqyleXfuGRN_AEEdqMSu2v0-gXQWPHcMeTbDDu4MLY7-P2mMT2EPFqlMJSPI1SfqG-Nr1Qc0E8llZoVfevgTYbnI7MlBaDUna7mq-HIlCS5uFTItE2EecyXI7pg7YvleD7YOslJOcB-3TYl-xh5kUjXimUwijTPuk7wnTV2P66qdSItpqcM");'>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-sm font-medium text-[#0d121b] dark:text-white">Jane Doe</p>
                            <p class="text-xs text-[#4c669a] dark:text-slate-400">Admin</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Main Content Wrapper -->
        <div class="flex flex-1 flex-col overflow-hidden bg-background-light dark:bg-background-dark">
            <!-- Top Header -->
            <header
                class="flex h-16 items-center justify-between border-b border-[#e7ebf3] bg-white px-6 py-3 dark:border-slate-800 dark:bg-[#1a202c]">
                <div class="flex items-center gap-4 md:hidden">
                    <button class="text-[#0d121b] dark:text-white">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <h2 class="text-lg font-bold text-[#0d121b] dark:text-white">Official Rooms</h2>
                </div>
                <!-- Desktop Search -->
                <div class="hidden md:flex flex-1 max-w-xl">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <span class="material-symbols-outlined text-[#4c669a]">search</span>
                        </div>
                        <input
                            class="block w-full rounded-lg border-none bg-[#f1f3f9] py-2.5 pl-10 pr-3 text-sm text-[#0d121b] placeholder-[#4c669a] focus:ring-2 focus:ring-primary dark:bg-slate-800 dark:text-white dark:placeholder-slate-400"
                            placeholder="Search rooms, location, or capacity..." type="text" />
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <button
                        class="flex items-center justify-center rounded-full bg-[#f1f3f9] p-2 text-[#0d121b] hover:bg-[#e7ebf3] dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <button
                        class="flex items-center justify-center rounded-full bg-[#f1f3f9] p-2 text-[#0d121b] hover:bg-[#e7ebf3] dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700">
                        <span class="material-symbols-outlined">help</span>
                    </button>
                </div>
            </header>
            <!-- Scrollable Content -->
            <main class="flex-1 overflow-y-auto p-4 md:p-8">
                <div class="mx-auto max-w-6xl flex flex-col gap-6">
                    <!-- Page Heading & Actions -->
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                        <div class="flex flex-col gap-1">
                            <h1 class="text-3xl font-bold tracking-tight text-[#0d121b] dark:text-white">Official Rooms
                                Directory</h1>
                            <p class="text-[#4c669a] text-base font-normal dark:text-slate-400">Manage and view all
                                official attendance locations and their current status.</p>
                        </div>
                        <button
                            class="group flex items-center justify-center gap-2 rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white shadow-sm transition-all hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:focus:ring-offset-[#101622]">
                            <span class="material-symbols-outlined text-[20px]">add</span>
                            <span>Create New Room</span>
                        </button>
                    </div>
                    <!-- Filters -->
                    <div class="flex flex-wrap items-center gap-3">
                        <div
                            class="flex items-center gap-2 rounded-lg bg-white px-3 py-2 shadow-sm border border-gray-200 dark:bg-[#1a202c] dark:border-slate-700">
                            <span class="material-symbols-outlined text-[#4c669a] text-[20px]">filter_list</span>
                            <span class="text-sm font-medium text-[#0d121b] dark:text-white">Filter:</span>
                        </div>
                        <button
                            class="flex h-9 items-center gap-2 rounded-lg bg-primary/10 px-4 text-sm font-medium text-primary ring-1 ring-inset ring-primary/20 dark:bg-primary/20 dark:text-blue-300">
                            All Status
                            <span class="material-symbols-outlined text-[18px]">keyboard_arrow_down</span>
                        </button>
                        <button
                            class="flex h-9 items-center gap-2 rounded-lg bg-white px-4 text-sm font-medium text-[#4c669a] ring-1 ring-inset ring-gray-200 hover:bg-gray-50 dark:bg-[#1a202c] dark:text-slate-400 dark:ring-slate-700 dark:hover:bg-slate-800">
                            Active
                        </button>
                        <button
                            class="flex h-9 items-center gap-2 rounded-lg bg-white px-4 text-sm font-medium text-[#4c669a] ring-1 ring-inset ring-gray-200 hover:bg-gray-50 dark:bg-[#1a202c] dark:text-slate-400 dark:ring-slate-700 dark:hover:bg-slate-800">
                            Maintenance
                        </button>
                        <button
                            class="flex h-9 items-center gap-2 rounded-lg bg-white px-4 text-sm font-medium text-[#4c669a] ring-1 ring-inset ring-gray-200 hover:bg-gray-50 dark:bg-[#1a202c] dark:text-slate-400 dark:ring-slate-700 dark:hover:bg-slate-800">
                            Location
                            <span class="material-symbols-outlined text-[18px]">keyboard_arrow_down</span>
                        </button>
                    </div>
                    <!-- Table Container -->
                    <div
                        class="overflow-hidden rounded-xl border border-[#e7ebf3] bg-white shadow-sm dark:border-slate-700 dark:bg-[#1a202c]">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm">
                                <thead
                                    class="border-b border-[#e7ebf3] bg-[#f8f9fc] dark:border-slate-700 dark:bg-slate-800/50">
                                    <tr>
                                        <th class="px-6 py-4 font-semibold text-[#0d121b] dark:text-white"
                                            scope="col">Room Name</th>
                                        <th class="hidden px-6 py-4 font-semibold text-[#0d121b] sm:table-cell dark:text-white"
                                            scope="col">Description</th>
                                        <th class="px-6 py-4 font-semibold text-[#0d121b] dark:text-white"
                                            scope="col">Capacity</th>
                                        <th class="px-6 py-4 font-semibold text-[#0d121b] dark:text-white"
                                            scope="col">Status</th>
                                        <th class="px-6 py-4 font-semibold text-[#0d121b] text-right dark:text-white"
                                            scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#e7ebf3] dark:divide-slate-700">
                                    <!-- Row 1 -->
                                    <tr class="group hover:bg-[#f8f9fc] dark:hover:bg-slate-800/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-100 text-primary dark:bg-blue-900/30 dark:text-blue-300">
                                                    <span class="material-symbols-outlined">meeting_room</span>
                                                </div>
                                                <div>
                                                    <div class="font-medium text-[#0d121b] dark:text-white">Conference
                                                        Hall A</div>
                                                    <div class="text-xs text-[#4c669a] dark:text-slate-400 sm:hidden">
                                                        Main auditorium, 1st Floor</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="hidden px-6 py-4 text-[#4c669a] sm:table-cell dark:text-slate-400">
                                            Main auditorium, 1st Floor, AV equipped
                                        </td>
                                        <td class="px-6 py-4 text-[#4c669a] dark:text-slate-400">
                                            200 ppl
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center rounded-full bg-green-50 px-2.5 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20 dark:bg-green-900/30 dark:text-green-400 dark:ring-green-500/20">
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div
                                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button
                                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-[#4c669a] hover:bg-[#e7ebf3] hover:text-[#0d121b] dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white"
                                                    title="View Details">
                                                    <span
                                                        class="material-symbols-outlined text-[20px]">visibility</span>
                                                </button>
                                                <button
                                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-[#4c669a] hover:bg-[#e7ebf3] hover:text-[#0d121b] dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white"
                                                    title="Edit">
                                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                                </button>
                                                <button
                                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-[#4c669a] hover:bg-[#e7ebf3] hover:text-[#0d121b] dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white md:hidden">
                                                    <span
                                                        class="material-symbols-outlined text-[20px]">more_vert</span>
                                                </button>
                                            </div>
                                            <!-- Mobile visible action trigger when not hovering/touching -->
                                            <div class="md:hidden group-hover:hidden flex justify-end">
                                                <span class="material-symbols-outlined text-[#4c669a]">more_vert</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Row 2 -->
                                    <tr class="group hover:bg-[#f8f9fc] dark:hover:bg-slate-800/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-indigo-100 text-indigo-600 dark:bg-indigo-900/30 dark:text-indigo-300">
                                                    <span class="material-symbols-outlined">videocam</span>
                                                </div>
                                                <div>
                                                    <div class="font-medium text-[#0d121b] dark:text-white">Meeting
                                                        Room 101</div>
                                                    <div class="text-xs text-[#4c669a] dark:text-slate-400 sm:hidden">
                                                        Small meeting room, 2nd Floor</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="hidden px-6 py-4 text-[#4c669a] sm:table-cell dark:text-slate-400">
                                            Small meeting room, 2nd Floor
                                        </td>
                                        <td class="px-6 py-4 text-[#4c669a] dark:text-slate-400">
                                            10 ppl
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center rounded-full bg-green-50 px-2.5 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20 dark:bg-green-900/30 dark:text-green-400 dark:ring-green-500/20">
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div
                                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button
                                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-[#4c669a] hover:bg-[#e7ebf3] hover:text-[#0d121b] dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white"
                                                    title="View Details">
                                                    <span
                                                        class="material-symbols-outlined text-[20px]">visibility</span>
                                                </button>
                                                <button
                                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-[#4c669a] hover:bg-[#e7ebf3] hover:text-[#0d121b] dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white"
                                                    title="Edit">
                                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Row 3 -->
                                    <tr class="group hover:bg-[#f8f9fc] dark:hover:bg-slate-800/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-orange-100 text-orange-600 dark:bg-orange-900/30 dark:text-orange-300">
                                                    <span class="material-symbols-outlined">podium</span>
                                                </div>
                                                <div>
                                                    <div class="font-medium text-[#0d121b] dark:text-white">Lecture
                                                        Hall B</div>
                                                    <div class="text-xs text-[#4c669a] dark:text-slate-400 sm:hidden">
                                                        Large lecture hall, Ground Floor</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="hidden px-6 py-4 text-[#4c669a] sm:table-cell dark:text-slate-400">
                                            Large lecture hall, Ground Floor
                                        </td>
                                        <td class="px-6 py-4 text-[#4c669a] dark:text-slate-400">
                                            150 ppl
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center rounded-full bg-yellow-50 px-2.5 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20 dark:bg-yellow-900/30 dark:text-yellow-400 dark:ring-yellow-500/20">
                                                Maintenance
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div
                                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button
                                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-[#4c669a] hover:bg-[#e7ebf3] hover:text-[#0d121b] dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white"
                                                    title="View Details">
                                                    <span
                                                        class="material-symbols-outlined text-[20px]">visibility</span>
                                                </button>
                                                <button
                                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-[#4c669a] hover:bg-[#e7ebf3] hover:text-[#0d121b] dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white"
                                                    title="Edit">
                                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Row 4 -->
                                    <tr class="group hover:bg-[#f8f9fc] dark:hover:bg-slate-800/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-300">
                                                    <span class="material-symbols-outlined">table_bar</span>
                                                </div>
                                                <div>
                                                    <div class="font-medium text-[#0d121b] dark:text-white">Boardroom
                                                    </div>
                                                    <div class="text-xs text-[#4c669a] dark:text-slate-400 sm:hidden">
                                                        Executive boardroom, Top Floor</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="hidden px-6 py-4 text-[#4c669a] sm:table-cell dark:text-slate-400">
                                            Executive boardroom, Top Floor
                                        </td>
                                        <td class="px-6 py-4 text-[#4c669a] dark:text-slate-400">
                                            20 ppl
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center rounded-full bg-green-50 px-2.5 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20 dark:bg-green-900/30 dark:text-green-400 dark:ring-green-500/20">
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div
                                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button
                                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-[#4c669a] hover:bg-[#e7ebf3] hover:text-[#0d121b] dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white"
                                                    title="View Details">
                                                    <span
                                                        class="material-symbols-outlined text-[20px]">visibility</span>
                                                </button>
                                                <button
                                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-[#4c669a] hover:bg-[#e7ebf3] hover:text-[#0d121b] dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white"
                                                    title="Edit">
                                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Row 5 -->
                                    <tr class="group hover:bg-[#f8f9fc] dark:hover:bg-slate-800/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-rose-100 text-rose-600 dark:bg-rose-900/30 dark:text-rose-300">
                                                    <span class="material-symbols-outlined">computer</span>
                                                </div>
                                                <div>
                                                    <div class="font-medium text-[#0d121b] dark:text-white">Training
                                                        Room C</div>
                                                    <div class="text-xs text-[#4c669a] dark:text-slate-400 sm:hidden">
                                                        IT Training Lab, 3rd Floor</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="hidden px-6 py-4 text-[#4c669a] sm:table-cell dark:text-slate-400">
                                            IT Training Lab, 3rd Floor
                                        </td>
                                        <td class="px-6 py-4 text-[#4c669a] dark:text-slate-400">
                                            30 ppl
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700/50">
                                                Inactive
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div
                                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button
                                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-[#4c669a] hover:bg-[#e7ebf3] hover:text-[#0d121b] dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white"
                                                    title="View Details">
                                                    <span
                                                        class="material-symbols-outlined text-[20px]">visibility</span>
                                                </button>
                                                <button
                                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-[#4c669a] hover:bg-[#e7ebf3] hover:text-[#0d121b] dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white"
                                                    title="Edit">
                                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div
                            class="flex items-center justify-between border-t border-[#e7ebf3] bg-white px-6 py-3 dark:border-slate-700 dark:bg-[#1a202c]">
                            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-[#4c669a] dark:text-slate-400">
                                        Showing <span class="font-medium text-[#0d121b] dark:text-white">1</span> to
                                        <span class="font-medium text-[#0d121b] dark:text-white">5</span> of <span
                                            class="font-medium text-[#0d121b] dark:text-white">12</span> results
                                    </p>
                                </div>
                                <div>
                                    <nav aria-label="Pagination"
                                        class="isolate inline-flex -space-x-px rounded-md shadow-sm">
                                        <a class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 dark:ring-slate-700 dark:hover:bg-slate-800"
                                            href="#">
                                            <span class="sr-only">Previous</span>
                                            <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                                        </a>
                                        <a aria-current="page"
                                            class="relative z-10 inline-flex items-center bg-primary px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                                            href="#">1</a>
                                        <a class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 dark:text-white dark:ring-slate-700 dark:hover:bg-slate-800"
                                            href="#">2</a>
                                        <a class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 dark:text-white dark:ring-slate-700 dark:hover:bg-slate-800"
                                            href="#">3</a>
                                        <a class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 dark:ring-slate-700 dark:hover:bg-slate-800"
                                            href="#">
                                            <span class="sr-only">Next</span>
                                            <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                                        </a>
                                    </nav>
                                </div>
                            </div>
                            <!-- Mobile Pagination -->
                            <div class="flex flex-1 justify-between sm:hidden">
                                <a class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                    href="#">Previous</a>
                                <a class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300"
                                    href="#">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
