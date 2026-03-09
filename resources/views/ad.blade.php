<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Adhoc Rooms List</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Tailwind CSS -->
        @vite(['resources/css/app.css','resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Theme Configuration -->
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
</head>

<body
    class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-white font-display antialiased overflow-hidden">
    <div class="flex h-screen w-full">
        <!-- Sidebar -->
        <aside
            class="hidden md:flex w-64 flex-col border-r border-slate-200 dark:border-slate-800 bg-white dark:bg-[#151c2b] h-full transition-all duration-300 ease-in-out">
            <div class="flex items-center gap-3 px-6 py-5 border-b border-slate-100 dark:border-slate-800/50">
                <div class="size-8 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined">grid_view</span>
                </div>
                <h1 class="text-lg font-bold tracking-tight text-slate-900 dark:text-white">Room Manager</h1>
            </div>
            <div class="flex flex-col flex-1 gap-1 p-4 overflow-y-auto">
                <p class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2 mt-2">Main Menu</p>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 group transition-colors"
                    href="#">
                    <span
                        class="material-symbols-outlined text-slate-500 group-hover:text-primary transition-colors">drive_presentation</span>
                    <span class="text-sm font-medium">Official Rooms</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-primary/10 text-primary dark:text-blue-400 group transition-colors"
                    href="#">
                    <span class="material-symbols-outlined fill-1">calendar_month</span>
                    <span class="text-sm font-semibold">Adhoc Rooms</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 group transition-colors"
                    href="#">
                    <span
                        class="material-symbols-outlined text-slate-500 group-hover:text-primary transition-colors">analytics</span>
                    <span class="text-sm font-medium">Reports</span>
                </a>
                <div class="my-4 border-t border-slate-100 dark:border-slate-800"></div>
                <p class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">System</p>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 group transition-colors"
                    href="#">
                    <span
                        class="material-symbols-outlined text-slate-500 group-hover:text-primary transition-colors">settings</span>
                    <span class="text-sm font-medium">Settings</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 group transition-colors"
                    href="#">
                    <span
                        class="material-symbols-outlined text-slate-500 group-hover:text-primary transition-colors">person</span>
                    <span class="text-sm font-medium">Profile</span>
                </a>
            </div>
            <div class="p-4 border-t border-slate-100 dark:border-slate-800">
                <div class="flex items-center gap-3 px-3 py-2">
                    <div class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden"
                        data-alt="User profile picture showing a smiling man"
                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC1o5T0v1_7wF0-_rD2Qgnm7dISlphsTsJlPGN9iwWpmS6UpmJTShpce0yJ2zlUce7yCMYMBAD4kjhdluePszc92VBNApwUrpw6DrSf9_y0kDwThKRwI1Qs5LCTAinJm6ottZ3KWrFk9KwOi_GKbMuhAhFA7mMNN6Guxz7OBx8JT2vSRUTQsUDBuX76kepNSPq9Do5Jd_AER7S9zOcW_kBMbx2r9wa6sEURx_quzGVbaJku_squ8cpDWk2yyHaA6zSchnT16tkDiQk'); background-size: cover;">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-slate-900 dark:text-white">Alex Morgan</span>
                        <span class="text-xs text-slate-500 dark:text-slate-400">Admin</span>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 flex flex-col h-full relative overflow-hidden">
            <!-- Top Navbar -->
            <header
                class="h-16 flex items-center justify-between px-6 border-b border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-[#151c2b]/80 backdrop-blur-sm z-10 sticky top-0">
                <div class="flex items-center gap-4 md:hidden">
                    <button class="text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-white">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <h2 class="text-lg font-bold text-slate-900 dark:text-white">Adhoc Rooms</h2>
                </div>
                <div class="hidden md:flex flex-1">
                    <!-- Empty spacer for desktop -->
                </div>
                <div class="flex items-center gap-4">
                    <div class="relative hidden sm:block">
                        <span
                            class="material-symbols-outlined absolute left-2.5 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">search</span>
                        <input
                            class="h-9 w-64 rounded-lg bg-slate-100 dark:bg-slate-800 border-none pl-9 pr-4 text-sm text-slate-900 dark:text-white focus:ring-2 focus:ring-primary/50 placeholder:text-slate-400 transition-all"
                            placeholder="Global search..." type="text" />
                    </div>
                    <button
                        class="relative size-9 flex items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined text-[20px]">notifications</span>
                        <span
                            class="absolute top-2 right-2.5 size-2 bg-red-500 rounded-full border border-white dark:border-[#151c2b]"></span>
                    </button>
                    <button
                        class="hidden sm:flex size-9 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined text-[20px]">help</span>
                    </button>
                </div>
            </header>
            <!-- Scrollable Content -->
            <div class="flex-1 overflow-y-auto bg-background-light dark:bg-background-dark p-4 md:p-8">
                <div class="max-w-7xl mx-auto flex flex-col gap-6">
                    <!-- Page Heading -->
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white tracking-tight">
                                Adhoc Rooms Management</h2>
                            <p class="text-slate-500 dark:text-slate-400 mt-1">Manage temporary rooms for ad-hoc
                                meetings and events.</p>
                        </div>
                        <button
                            class="flex items-center justify-center gap-2 bg-primary hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg shadow-sm hover:shadow transition-all font-medium text-sm group">
                            <span
                                class="material-symbols-outlined text-[20px] group-hover:rotate-90 transition-transform">add</span>
                            <span>Create New Room</span>
                        </button>
                    </div>
                    <!-- Filters & Toolbar -->
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                        <!-- Search -->
                        <div class="md:col-span-5 lg:col-span-4">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Search
                                Rooms</label>
                            <div class="relative group">
                                <span
                                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">search</span>
                                <input
                                    class="w-full h-10 rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-[#151c2b] text-slate-900 dark:text-white pl-10 pr-4 focus:border-primary focus:ring-primary shadow-sm text-sm"
                                    placeholder="Search by name or ID..." type="text" />
                            </div>
                        </div>
                        <!-- Status Filter -->
                        <div class="md:col-span-3 lg:col-span-2">
                            <label
                                class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Status</label>
                            <div class="relative">
                                <select
                                    class="w-full h-10 rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-[#151c2b] text-slate-900 dark:text-white pl-3 pr-8 focus:border-primary focus:ring-primary shadow-sm text-sm appearance-none cursor-pointer">
                                    <option value="all">All Status</option>
                                    <option value="active">Active</option>
                                    <option value="draft">Draft</option>
                                    <option value="archived">Archived</option>
                                </select>
                                <span
                                    class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-[20px]">expand_more</span>
                            </div>
                        </div>
                        <!-- Sort Filter -->
                        <div class="md:col-span-3 lg:col-span-2">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Sort
                                By</label>
                            <div class="relative">
                                <select
                                    class="w-full h-10 rounded-lg border-slate-200 dark:border-slate-700 bg-white dark:bg-[#151c2b] text-slate-900 dark:text-white pl-3 pr-8 focus:border-primary focus:ring-primary shadow-sm text-sm appearance-none cursor-pointer">
                                    <option value="date_desc">Date Created (Newest)</option>
                                    <option value="date_asc">Date Created (Oldest)</option>
                                    <option value="name_asc">Name (A-Z)</option>
                                </select>
                                <span
                                    class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-[20px]">expand_more</span>
                            </div>
                        </div>
                    </div>
                    <!-- Filter Chips (optional quick filters) -->
                    <div class="flex flex-wrap gap-2">
                        <button
                            class="inline-flex items-center px-3 py-1 rounded-full bg-slate-200 dark:bg-slate-700 text-xs font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-300 dark:hover:bg-slate-600 transition-colors">
                            Active Rooms
                            <span
                                class="ml-1.5 flex items-center justify-center size-4 rounded-full bg-white dark:bg-slate-800 text-[10px] font-bold">12</span>
                        </button>
                        <button
                            class="inline-flex items-center px-3 py-1 rounded-full border border-slate-200 dark:border-slate-700 bg-transparent text-xs font-medium text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                            Drafts
                            <span class="ml-1.5 text-slate-400">4</span>
                        </button>
                        <button
                            class="inline-flex items-center px-3 py-1 rounded-full border border-slate-200 dark:border-slate-700 bg-transparent text-xs font-medium text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                            Archived
                            <span class="ml-1.5 text-slate-400">8</span>
                        </button>
                    </div>
                    <!-- Data Table Card -->
                    <div
                        class="bg-white dark:bg-[#151c2b] rounded-xl shadow-sm border border-slate-200 dark:border-slate-800 overflow-hidden flex flex-col">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr
                                        class="bg-slate-50/50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-800">
                                        <th
                                            class="px-6 py-4 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-12">
                                            <input
                                                class="rounded border-slate-300 text-primary focus:ring-primary bg-transparent"
                                                type="checkbox" />
                                        </th>
                                        <th
                                            class="px-6 py-4 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                            Room Name</th>
                                        <th
                                            class="px-6 py-4 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider hidden sm:table-cell">
                                            Description</th>
                                        <th
                                            class="px-6 py-4 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                            Status</th>
                                        <th
                                            class="px-6 py-4 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider hidden md:table-cell">
                                            Last Active</th>
                                        <th
                                            class="px-6 py-4 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-right">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                                    <!-- Row 1 -->
                                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors group">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input
                                                class="rounded border-slate-300 text-primary focus:ring-primary bg-transparent"
                                                type="checkbox" />
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="size-9 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 dark:text-blue-400 shrink-0">
                                                    <span
                                                        class="material-symbols-outlined text-[20px]">meeting_room</span>
                                                </div>
                                                <div class="flex flex-col">
                                                    <span
                                                        class="text-sm font-semibold text-slate-900 dark:text-white">Q3
                                                        Strategy Breakout</span>
                                                    <span class="text-xs text-slate-500 dark:text-slate-400">ID:
                                                        #RM-2049</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 max-w-xs hidden sm:table-cell">
                                            <p class="text-sm text-slate-600 dark:text-slate-400 truncate">Marketing
                                                team brainstorming session for upcoming Q3 goals.</p>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400 border border-green-200 dark:border-green-900/50">
                                                <span class="size-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                            <span class="text-sm text-slate-600 dark:text-slate-400">Oct 24,
                                                2023</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right">
                                            <div
                                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button
                                                    class="p-1.5 rounded-md text-slate-500 hover:text-primary hover:bg-primary/10 transition-colors"
                                                    title="View Details">
                                                    <span
                                                        class="material-symbols-outlined text-[20px]">visibility</span>
                                                </button>
                                                <button
                                                    class="p-1.5 rounded-md text-slate-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors"
                                                    title="Edit Room">
                                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                                </button>
                                                <button
                                                    class="p-1.5 rounded-md text-slate-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 transition-colors"
                                                    title="Delete Room">
                                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Row 2 -->
                                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors group">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input
                                                class="rounded border-slate-300 text-primary focus:ring-primary bg-transparent"
                                                type="checkbox" />
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="size-9 rounded-lg bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 dark:text-indigo-400 shrink-0">
                                                    <span class="material-symbols-outlined text-[20px]">groups</span>
                                                </div>
                                                <div class="flex flex-col">
                                                    <span
                                                        class="text-sm font-semibold text-slate-900 dark:text-white">Project
                                                        X Kickoff</span>
                                                    <span class="text-xs text-slate-500 dark:text-slate-400">ID:
                                                        #RM-2110</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 max-w-xs hidden sm:table-cell">
                                            <p class="text-sm text-slate-600 dark:text-slate-400 truncate">Initial
                                                meeting with stakeholders for the new platform launch.</p>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400 border border-green-200 dark:border-green-900/50">
                                                <span class="size-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                            <span class="text-sm text-slate-600 dark:text-slate-400">Oct 22,
                                                2023</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right">
                                            <div
                                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button
                                                    class="p-1.5 rounded-md text-slate-500 hover:text-primary hover:bg-primary/10 transition-colors"
                                                    title="View Details">
                                                    <span
                                                        class="material-symbols-outlined text-[20px]">visibility</span>
                                                </button>
                                                <button
                                                    class="p-1.5 rounded-md text-slate-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors"
                                                    title="Edit Room">
                                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                                </button>
                                                <button
                                                    class="p-1.5 rounded-md text-slate-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 transition-colors"
                                                    title="Delete Room">
                                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Row 3 -->
                                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors group">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input
                                                class="rounded border-slate-300 text-primary focus:ring-primary bg-transparent"
                                                type="checkbox" />
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="size-9 rounded-lg bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center text-orange-600 dark:text-orange-400 shrink-0">
                                                    <span
                                                        class="material-symbols-outlined text-[20px]">video_camera_front</span>
                                                </div>
                                                <div class="flex flex-col">
                                                    <span
                                                        class="text-sm font-semibold text-slate-900 dark:text-white">External
                                                        Client Demo</span>
                                                    <span class="text-xs text-slate-500 dark:text-slate-400">ID:
                                                        #RM-1055</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 max-w-xs hidden sm:table-cell">
                                            <p class="text-sm text-slate-600 dark:text-slate-400 truncate">Sandbox
                                                environment demo room for potential leads.</p>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800 dark:bg-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-600">
                                                <span class="size-1.5 rounded-full bg-slate-400 mr-1.5"></span>
                                                Draft
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                            <span class="text-sm text-slate-600 dark:text-slate-400">Oct 20,
                                                2023</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right">
                                            <div
                                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button
                                                    class="p-1.5 rounded-md text-slate-500 hover:text-primary hover:bg-primary/10 transition-colors"
                                                    title="View Details">
                                                    <span
                                                        class="material-symbols-outlined text-[20px]">visibility</span>
                                                </button>
                                                <button
                                                    class="p-1.5 rounded-md text-slate-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors"
                                                    title="Edit Room">
                                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                                </button>
                                                <button
                                                    class="p-1.5 rounded-md text-slate-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 transition-colors"
                                                    title="Delete Room">
                                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Row 4 -->
                                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors group">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input
                                                class="rounded border-slate-300 text-primary focus:ring-primary bg-transparent"
                                                type="checkbox" />
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="size-9 rounded-lg bg-teal-100 dark:bg-teal-900/30 flex items-center justify-center text-teal-600 dark:text-teal-400 shrink-0">
                                                    <span class="material-symbols-outlined text-[20px]">forum</span>
                                                </div>
                                                <div class="flex flex-col">
                                                    <span
                                                        class="text-sm font-semibold text-slate-900 dark:text-white">HR
                                                        Policy Review</span>
                                                    <span class="text-xs text-slate-500 dark:text-slate-400">ID:
                                                        #RM-0992</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 max-w-xs hidden sm:table-cell">
                                            <p class="text-sm text-slate-600 dark:text-slate-400 truncate">Annual
                                                review of company policies and compliance.</p>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400 border border-yellow-200 dark:border-yellow-900/50">
                                                <span class="size-1.5 rounded-full bg-yellow-500 mr-1.5"></span>
                                                Archived
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                            <span class="text-sm text-slate-600 dark:text-slate-400">Sep 15,
                                                2023</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right">
                                            <div
                                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button
                                                    class="p-1.5 rounded-md text-slate-500 hover:text-primary hover:bg-primary/10 transition-colors"
                                                    title="View Details">
                                                    <span
                                                        class="material-symbols-outlined text-[20px]">visibility</span>
                                                </button>
                                                <button
                                                    class="p-1.5 rounded-md text-slate-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors"
                                                    title="Edit Room">
                                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                                </button>
                                                <button
                                                    class="p-1.5 rounded-md text-slate-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 transition-colors"
                                                    title="Delete Room">
                                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Row 5 -->
                                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors group">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input
                                                class="rounded border-slate-300 text-primary focus:ring-primary bg-transparent"
                                                type="checkbox" />
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="size-9 rounded-lg bg-pink-100 dark:bg-pink-900/30 flex items-center justify-center text-pink-600 dark:text-pink-400 shrink-0">
                                                    <span
                                                        class="material-symbols-outlined text-[20px]">celebration</span>
                                                </div>
                                                <div class="flex flex-col">
                                                    <span
                                                        class="text-sm font-semibold text-slate-900 dark:text-white">Happy
                                                        Hour Virtual</span>
                                                    <span class="text-xs text-slate-500 dark:text-slate-400">ID:
                                                        #RM-2201</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 max-w-xs hidden sm:table-cell">
                                            <p class="text-sm text-slate-600 dark:text-slate-400 truncate">Casual
                                                Friday remote gathering.</p>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400 border border-green-200 dark:border-green-900/50">
                                                <span class="size-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                            <span class="text-sm text-slate-600 dark:text-slate-400">Oct 26,
                                                2023</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right">
                                            <div
                                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button
                                                    class="p-1.5 rounded-md text-slate-500 hover:text-primary hover:bg-primary/10 transition-colors"
                                                    title="View Details">
                                                    <span
                                                        class="material-symbols-outlined text-[20px]">visibility</span>
                                                </button>
                                                <button
                                                    class="p-1.5 rounded-md text-slate-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors"
                                                    title="Edit Room">
                                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                                </button>
                                                <button
                                                    class="p-1.5 rounded-md text-slate-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 transition-colors"
                                                    title="Delete Room">
                                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination Footer -->
                        <div
                            class="px-6 py-4 border-t border-slate-200 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/20 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <span class="text-sm text-slate-500 dark:text-slate-400">
                                Showing <span class="font-medium text-slate-900 dark:text-white">1</span> to <span
                                    class="font-medium text-slate-900 dark:text-white">5</span> of <span
                                    class="font-medium text-slate-900 dark:text-white">24</span> results
                            </span>
                            <div class="flex items-center gap-2">
                                <button
                                    class="px-3 py-1 rounded-md border border-slate-200 dark:border-slate-700 text-sm font-medium text-slate-600 dark:text-slate-300 hover:bg-white dark:hover:bg-slate-700 disabled:opacity-50 disabled:cursor-not-allowed"
                                    disabled="">
                                    Previous
                                </button>
                                <div class="flex items-center gap-1">
                                    <button
                                        class="size-8 flex items-center justify-center rounded-md bg-primary text-white text-sm font-medium">1</button>
                                    <button
                                        class="size-8 flex items-center justify-center rounded-md hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 text-sm font-medium transition-colors">2</button>
                                    <button
                                        class="size-8 flex items-center justify-center rounded-md hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 text-sm font-medium transition-colors">3</button>
                                    <span class="text-slate-400 px-1">...</span>
                                    <button
                                        class="size-8 flex items-center justify-center rounded-md hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 text-sm font-medium transition-colors">8</button>
                                </div>
                                <button
                                    class="px-3 py-1 rounded-md border border-slate-200 dark:border-slate-700 text-sm font-medium text-slate-600 dark:text-slate-300 hover:bg-white dark:hover:bg-slate-700 transition-colors">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
