<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaCcess - Streamline Your Workflow</title>


    {{-- <script src="https://unpkg.com/@tailwindcss/browser@4"></script> --}}
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        [x-cloak] {
            display: none !important;
        }

        /* Animation Engine */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body id="top" class="bg-gray-50 text-gray-900 antialiased" x-data="{
    scrolled: false,
    mobileMenuOpen: false,
    init() {
        window.addEventListener('scroll', () => { this.scrolled = window.scrollY > 20 });

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('visible');
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    }
}">

    <nav :class="scrolled ? 'bg-white/80 backdrop-blur-md shadow-sm border-b border-gray-100' : 'bg-white border-b border-gray-100'"
        class="fixed top-0 w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">

                <div class="flex-shrink-0 flex items-center gap-2 group cursor-pointer"
                    @click="window.scrollTo({top: 0, behavior: 'smooth'})">
                    <div class="p-1.5 bg-blue-600 rounded-lg group-hover:rotate-6 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                    </div>
                    <span class="font-bold text-xl text-blue-600 tracking-tight">MaCcess</span>
                </div>

                <div class="hidden md:flex space-x-8 text-sm font-medium text-gray-600">
                    <a href="#top" class="hover:text-blue-600 transition">Home</a>
                    <a href="#features" class="hover:text-blue-600 transition">Features</a>
                    <a href="#" class="hover:text-blue-600 transition">About</a>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <button class="px-5 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 transition">Log
                        In</button>
                    <button
                        class="px-6 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition shadow-lg shadow-blue-100">Sign
                        Up</button>
                </div>

                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-600 p-2 focus:outline-none">
                        <svg x-show="!mobileMenuOpen" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="mobileMenuOpen" x-cloak class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-cloak class="md:hidden bg-white border-t border-gray-100 px-4 py-6 space-y-3 shadow-2xl absolute w-full">
            <a href="#top" @click="mobileMenuOpen = false"
                class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-blue-50 rounded-lg">Home</a>
            <a href="#features" @click="mobileMenuOpen = false"
                class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-blue-50 rounded-lg">Features</a>
            <a href="#"
                class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-blue-50 rounded-lg">About</a>
            <div class="pt-4 flex flex-col gap-2">
                <a href="/login" class="w-full py-3 text-blue-600 font-bold border border-blue-600 rounded-lg">Log In</a>
                <a href="/register" class="w-full py-3 bg-blue-600 text-white rounded-lg font-bold">Sign Up Free</a>
            </div>
        </div>
    </nav>

    <header class="relative bg-white pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="reveal">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-[1.1] mb-6">
                        Streamline Attendance <br class="hidden lg:block" /> with Ease
                    </h1>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed max-w-xl">
                        Our intuitive Attendance App simplifies room management, user tracking, and report generation
                        for efficient operations.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="/login" class="px-8 py-4 text-base font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 transition shadow-xl shadow-blue-100 hover:-translate-y-1 inline-block">Log In</a>
                        <a href="/register" class="px-8 py-4 text-base font-bold text-blue-600 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition inline-block">Sign Up</a>
                    </div>
                </div>
                <div class="reveal" style="transition-delay: 200ms">
                    <div
                        class="bg-gray-900 rounded-2xl aspect-video shadow-2xl flex items-center justify-center relative group">
                        <div class="absolute inset-0 bg-blue-600/10 group-hover:bg-transparent transition-colors"></div>
                        <div class="grid grid-cols-2 gap-2 opacity-20">
                            <div class="w-12 h-12 bg-white rounded-sm"></div>
                            <div class="w-12 h-12 bg-white rounded-sm"></div>
                            <div class="w-12 h-12 bg-white rounded-sm"></div>
                            <div class="w-12 h-12 bg-white rounded-sm"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="features" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Powerful Features Designed for You</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8 items-stretch">
                <div
                    class="reveal flex flex-col p-8 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <div
                        class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-6 shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Easy Room Management</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">Effortlessly create and manage virtual or
                        physical rooms, assign access, and monitor activity across your organization.</p>
                </div>

                <div class="reveal flex flex-col p-8 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300"
                    style="transition-delay: 100ms">
                    <div
                        class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-6 shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Efficient User Tracking</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">Keep track of user attendance, roles, and
                        permissions with a comprehensive user management system.</p>
                </div>

                <div class="reveal flex flex-col p-8 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300"
                    style="transition-delay: 200ms">
                    <div
                        class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-6 shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Robust Reporting</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">Generate detailed attendance reports, analyze
                        trends, and gain insights with intuitive dashboards.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-white pb-32 space-y-32">
        <div class="text-center max-w-7xl mx-auto px-4 reveal">
            <h2 class="text-3xl font-bold text-gray-900">Unlock Efficiency in Attendance Management</h2>
        </div>

        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <div class="w-full md:w-1/2 reveal">
                    <div class="aspect-video rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                        <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=800&q=80"
                            alt="S1"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-[1.02]" />
                    </div>
                </div>
                <div class="w-full md:w-1/2 reveal" style="transition-delay: 200ms">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Simplify Your Daily Operations</h3>
                    <p class="text-gray-600 leading-relaxed">Our app drastically reduces the time spent on manual
                        attendance tracking, freeing up your team to focus on more critical tasks.</p>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row-reverse items-center gap-16">
                <div class="w-full md:w-1/2 reveal">
                    <div class="aspect-video rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                        <img src="https://images.unsplash.com/photo-1531545514256-b1400bc00f31?auto=format&fit=crop&w=800&q=80"
                            alt="S2"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-[1.02]" />
                    </div>
                </div>
                <div class="w-full md:w-1/2 reveal" style="transition-delay: 200ms">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Ensure Accuracy and Compliance</h3>
                    <p class="text-gray-600 leading-relaxed">Automated logging and secure data storage help minimize
                        errors and maintain precise records for audits and compliance.</p>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <div class="w-full md:w-1/2 reveal">
                    <div class="aspect-video rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80"
                            alt="S3"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-[1.02]" />
                    </div>
                </div>
                <div class="w-full md:w-1/2 reveal" style="transition-delay: 200ms">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Empower Better Decision Making</h3>
                    <p class="text-gray-600 leading-relaxed">Access real-time attendance data and comprehensive reports
                        to make informed operational decisions.</p>
                </div>
            </div>
        </section>
    </div>

    <section class="bg-blue-50/50 py-24 reveal text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-6 text-gray-900">Ready to Transform Your Attendance?</h2>
            <p class="text-lg text-gray-600 mb-10">Experience the difference with a modern tracking solution.</p>
            <button @click="window.scrollTo({top: 0, behavior: 'smooth'})"
                class="px-10 py-4 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 shadow-xl shadow-blue-100 transition-all hover:-translate-y-1 active:scale-95">
                Get Started Now
            </button>
        </div>
    </section>

    <footer class="bg-white pt-16 pb-12 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="p-1.5 bg-indigo-600 rounded-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="font-bold text-lg text-indigo-600 tracking-tight">MaCcess</span>
                    </div>
                    <p class="text-gray-500 text-sm">Simplifying management for the modern workplace.</p>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-4 text-sm uppercase tracking-wider">Product</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-indigo-600 transition">Features</a></li>
                        <li><a href="#" class="hover:text-indigo-600 transition">Pricing</a></li>
                        <li><a href="#" class="hover:text-indigo-600 transition">API</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-4 text-sm uppercase tracking-wider">Resources</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-indigo-600 transition">Documentation</a></li>
                        <li><a href="#" class="hover:text-indigo-600 transition">Support</a></li>
                        <li><a href="#" class="hover:text-indigo-600 transition">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-4 text-sm uppercase tracking-wider">Company</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-indigo-600 transition">About Us</a></li>
                        <li><a href="#" class="hover:text-indigo-600 transition">Careers</a></li>
                        <li><a href="#" class="hover:text-indigo-600 transition">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-sm text-gray-400">© 2026 MaCcess. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="#" class="text-gray-400 hover:text-indigo-600"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg></a>
                    <a href="#" class="text-gray-400 hover:text-indigo-600"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg></a>
                    <a href="#" class="text-gray-400 hover:text-indigo-600"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
