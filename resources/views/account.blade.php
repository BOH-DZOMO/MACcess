<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>User Profile - Attendance Management System</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
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
<style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">
<div class="relative flex h-screen w-full overflow-hidden">
<!-- Sidebar -->
<aside class="w-64 border-r border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 flex flex-col h-full shrink-0">
<div class="p-6 flex items-center gap-3">
<div class="bg-primary text-white p-1.5 rounded-lg">
<span class="material-symbols-outlined block text-2xl">calendar_today</span>
</div>
<h2 class="text-lg font-bold tracking-tight text-primary">Attendance</h2>
</div>
<nav class="flex-1 px-4 space-y-1">
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span class="text-sm font-medium">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">event_available</span>
<span class="text-sm font-medium">Attendance</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">badge</span>
<span class="text-sm font-medium">Employees</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">bar_chart</span>
<span class="text-sm font-medium">Reports</span>
</a>
<div class="pt-4 pb-2">
<p class="px-3 text-[10px] font-bold uppercase tracking-wider text-slate-400">Settings</p>
</div>
<a class="flex items-center gap-3 px-3 py-2 bg-primary/10 text-primary rounded-lg" href="#">
<span class="material-symbols-outlined">person</span>
<span class="text-sm font-medium">My Account</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="text-sm font-medium">Preferences</span>
</a>
</nav>
<div class="p-4 border-t border-slate-200 dark:border-slate-800">
<div class="flex items-center gap-3 p-2">
<div class="size-10 rounded-full bg-slate-200" data-alt="User profile avatar of Alex Morgan" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBeAuqi1RL52wNp2SJPIngP0t9t8YnAeoP7_ZsG_bU-xkd820xyQd8V1lc40mrLHb-dDuKT041eK95CcfMf74J8x523tV6H2J1mVuvNplrjcMv3dwlV3gzuy7k8W7ulZWwIFubdnzS6isXlQrh2jPvS7KRYjYA1kaI_P2PvvFfKoDLp1FeY0rdxtSeoVShU6bMXE8TGtvFpC96m5wG2qnM08QYZSnpaY8HhIhq_L8jsEGiR-EngfGeS9j9YKkX_OyPwKiebsdWCj1U'); background-size: cover;"></div>
<div class="flex flex-col">
<p class="text-xs font-bold">Alex Morgan</p>
<p class="text-[10px] text-slate-500">Administrator</p>
</div>
</div>
</div>
</aside>
<!-- Main Content -->
<main class="flex-1 flex flex-col h-full overflow-y-auto">
<!-- Header -->
<header class="h-16 border-b border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 flex items-center justify-between px-8 shrink-0">
<div class="flex items-center gap-4 flex-1 max-w-xl">
<div class="relative w-full">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">search</span>
<input class="w-full pl-10 pr-4 py-2 rounded-lg border-none bg-slate-100 dark:bg-slate-800 text-sm focus:ring-2 focus:ring-primary/50 transition-all outline-none" placeholder="Search for reports, employees or settings..." type="text"/>
</div>
</div>
<div class="flex items-center gap-3">
<button class="p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-full transition-colors relative">
<span class="material-symbols-outlined">notifications</span>
<span class="absolute top-2 right-2 size-2 bg-red-500 rounded-full border-2 border-white dark:border-slate-900"></span>
</button>
<button class="p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-full transition-colors">
<span class="material-symbols-outlined">help</span>
</button>
</div>
</header>
<!-- Content Area -->
<div class="p-8 max-w-4xl mx-auto w-full">
<div class="mb-8">
<h1 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">My Account</h1>
<p class="text-slate-500 mt-1">Manage your profile information and security preferences.</p>
</div>
<!-- Profile Header Card -->
<div class="bg-white dark:bg-slate-900 rounded-xl p-6 shadow-sm border border-slate-200 dark:border-slate-800 flex flex-col md:flex-row items-center gap-6 mb-8">
<div class="relative group">
<div class="size-32 rounded-full bg-slate-100 border-4 border-white dark:border-slate-800 shadow-sm overflow-hidden" data-alt="Alex Morgan profile picture placeholder" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBqM3lTVXWgETlSSvDq_QqBTqTCF0CqlJ5ugZoDv4bh6uLWQ-GIl4BvNlTKaGh_P1qOQ-ryLLgNb5qgco_H-_Oex2vfBXpVcXhVSvNdH7VqXem29qf6JDHO_LRPN74GweoYSpx8kNyQBVTrZmnujOaO3dT73X3-7iAx3koo1iacJIdRtALP2uVVi4LomYqPSn9oKfML07l4xsp0pu0TSamUrB2Ns24tahLh-J__jJjoDMFGPnH70u9y7a9eZo7vfISFFfdh1gHS2wU'); background-size: cover;"></div>
<button class="absolute bottom-1 right-1 bg-primary text-white p-2 rounded-full shadow-lg border-2 border-white dark:border-slate-800">
<span class="material-symbols-outlined text-sm">photo_camera</span>
</button>
</div>
<div class="text-center md:text-left flex-1">
<h2 class="text-2xl font-bold text-slate-900 dark:text-white leading-tight">Alex Morgan</h2>
<p class="text-slate-500">Administrator</p>
<div class="flex flex-wrap gap-2 mt-3 justify-center md:justify-start">
<span class="px-2.5 py-1 rounded bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider">Super Admin</span>
<span class="px-2.5 py-1 rounded bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-xs font-bold uppercase tracking-wider">Joined Jan 2023</span>
</div>
</div>
<div class="flex gap-2">
<button class="px-4 py-2 text-sm font-semibold border border-slate-200 dark:border-slate-700 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">View Public Profile</button>
</div>
</div>
<!-- Main Sections -->
<div class="space-y-8">
<!-- Personal Information -->
<section>
<div class="flex items-center gap-2 mb-4">
<span class="material-symbols-outlined text-primary">person</span>
<h3 class="text-lg font-bold">Personal Information</h3>
</div>
<div class="bg-white dark:bg-slate-900 rounded-xl shadow-sm border border-slate-200 dark:border-slate-800 overflow-hidden">
<div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Full Name</label>
<input class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 focus:ring-2 focus:ring-primary/50 transition-all outline-none" type="text" value="Alex Morgan"/>
</div>
<div class="space-y-2">
<label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Email Address</label>
<input class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 focus:ring-2 focus:ring-primary/50 transition-all outline-none" type="email" value="alex.morgan@company.com"/>
</div>
<div class="space-y-2">
<label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Phone Number</label>
<input class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 focus:ring-2 focus:ring-primary/50 transition-all outline-none" type="tel" value="+1 (555) 000-1234"/>
</div>
<div class="space-y-2">
<label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Department</label>
<input class="w-full px-4 py-2.5 rounded-lg border border-slate-100 dark:border-slate-800 bg-slate-100 dark:bg-slate-900 text-slate-400 cursor-not-allowed outline-none" disabled="" type="text" value="Human Resources"/>
</div>
</div>
</div>
</section>
<!-- Account Security -->
<section>
<div class="flex items-center gap-2 mb-4">
<span class="material-symbols-outlined text-primary">security</span>
<h3 class="text-lg font-bold">Account Security</h3>
</div>
<div class="bg-white dark:bg-slate-900 rounded-xl shadow-sm border border-slate-200 dark:border-slate-800 divide-y divide-slate-100 dark:divide-slate-800">
<div class="p-6 flex items-center justify-between">
<div>
<p class="font-semibold">Password</p>
<p class="text-sm text-slate-500">Last changed 3 months ago</p>
</div>
<button class="px-4 py-2 text-sm font-semibold border border-slate-200 dark:border-slate-700 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">Change Password</button>
</div>
<div class="p-6 flex items-center justify-between">
<div>
<p class="font-semibold">Two-Factor Authentication (2FA)</p>
<p class="text-sm text-slate-500">Add an extra layer of security to your account</p>
</div>
<div class="flex items-center gap-3">
<span class="text-xs font-bold text-green-500 uppercase">Enabled</span>
<button class="px-4 py-2 text-sm font-semibold border border-slate-200 dark:border-slate-700 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">Configure</button>
</div>
</div>
</div>
</section>
<!-- Notification Settings -->
<section>
<div class="flex items-center gap-2 mb-4">
<span class="material-symbols-outlined text-primary">notifications_active</span>
<h3 class="text-lg font-bold">Notification Settings</h3>
</div>
<div class="bg-white dark:bg-slate-900 rounded-xl shadow-sm border border-slate-200 dark:border-slate-800 divide-y divide-slate-100 dark:divide-slate-800">
<div class="p-6 flex items-center justify-between">
<div>
<p class="font-semibold">Email Notifications</p>
<p class="text-sm text-slate-500">Receive daily attendance reports and system alerts via email</p>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
</label>
</div>
<div class="p-6 flex items-center justify-between">
<div>
<p class="font-semibold">Push Notifications</p>
<p class="text-sm text-slate-500">Get instant desktop alerts for employee requests</p>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input class="sr-only peer" type="checkbox"/>
<div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
</label>
</div>
</div>
</section>
<!-- Action Buttons -->
<div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200 dark:border-slate-800">
<button class="px-6 py-2.5 text-sm font-bold text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors">Cancel</button>
<button class="px-8 py-2.5 text-sm font-bold text-white bg-primary hover:bg-primary/90 rounded-lg shadow-lg shadow-primary/20 transition-all">Save Changes</button>
</div>
</div>
<!-- Footer Spacing -->
<div class="h-16"></div>
</div>
</main>
</div>
</body></html>