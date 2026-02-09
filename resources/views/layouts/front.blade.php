<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? ($globalSettings['site_name'] ?? config('app.name', 'Panchakanya Hardware')) }}</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        .hero-bg {
            background-color: #1a1a1a;
        }

        .bg-primary-red {
            background-color: #D32F2F;
        }

        .text-primary-red {
            color: #D32F2F;
        }

        .hover-bg-primary-red:hover {
            background-color: #b71c1c;
        }

        .border-primary-red {
            border-color: #D32F2F;
        }

        /* Animation Utilities */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .delay-100 {
            transition-delay: 0.1s;
        }

        .delay-200 {
            transition-delay: 0.2s;
        }

        .delay-300 {
            transition-delay: 0.3s;
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Custom Gradients */
        .bg-gradient-hero {
            background: linear-gradient(to right, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.7) 50%, rgba(0, 0, 0, 0.3) 100%);
        }

        /* Link Hover Effect */
        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 50%;
            background-color: #D32F2F;
            transition: all 0.3s ease-in-out;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        @keyframes float-slow {
            0% {
                transform: translateY(0) translateX(0) scale(1);
            }

            50% {
                transform: translateY(-6px) translateX(4px) scale(1.02);
            }

            100% {
                transform: translateY(0) translateX(0) scale(1);
            }
        }

        .hero-noise {
            background-image: radial-gradient(rgba(0, 0, 0, .025) 1px, transparent 1px);
            background-size: 6px 6px;
            mix-blend-mode: multiply;
            opacity: .25;
        }

        .hero-ring {
            background: conic-gradient(from 120deg, rgba(211, 47, 47, .35), rgba(255, 166, 0, .25), rgba(211, 47, 47, .35));
            -webkit-mask-image: radial-gradient(closest-side, transparent 62%, black 66%);
            mask-image: radial-gradient(closest-side, transparent 62%, black 66%);
            border-radius: 50%;
            filter: blur(18px);
            opacity: .45;
        }

        .hero-blob {
            background: radial-gradient(ellipse at center, rgba(255, 200, 200, .35), rgba(255, 255, 255, 0));
            filter: blur(28px);
            animation: float-slow 12s ease-in-out infinite;
            opacity: .65;
        }

        .hero-stripe {
            background: linear-gradient(120deg, rgba(255, 255, 255, 0), rgba(211, 47, 47, .06), rgba(255, 255, 255, 0));
            transform: rotate(18deg);
            filter: blur(14px);
            opacity: .55;
        }

        @keyframes float-soft {
            0% {
                transform: translateY(0) translateX(0) scale(1);
            }

            50% {
                transform: translateY(-8px) translateX(6px) scale(1.04);
            }

            100% {
                transform: translateY(0) translateX(0) scale(1);
            }
        }

        .mesh-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(34px);
            animation: float-soft 16s ease-in-out infinite;
            opacity: .55;
            mix-blend-mode: screen;
        }

        .mesh-blob.red {
            background: radial-gradient(circle at center, rgba(211, 47, 47, .28), rgba(255, 255, 255, 0));
        }

        .mesh-blob.orange {
            background: radial-gradient(circle at center, rgba(255, 166, 0, .22), rgba(255, 255, 255, 0));
        }

        .mesh-blob.gray {
            background: radial-gradient(circle at center, rgba(160, 160, 160, .18), rgba(255, 255, 255, 0));
        }

        .hero-industrial {
            position: relative;
            background-color: #ffffff;
        }

        .hero-industrial::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(1200px 600px at 6% 10%, rgba(255, 200, 200, .35), transparent 70%),
                radial-gradient(900px 480px at 94% 92%, rgba(240, 240, 240, .7), transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        .hero-industrial::after {
            content: '';
            position: absolute;
            inset: 0;
            background:
                repeating-linear-gradient(135deg, rgba(0, 0, 0, .045) 0 2px, rgba(0, 0, 0, 0) 2px 8px);
            opacity: .35;
            mix-blend-mode: multiply;
            pointer-events: none;
            z-index: 0;
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-900">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav x-data="{
            scrolled: false,
            mobileMenuOpen: false,
            searchOpen: false,
            get isLight() { return this.scrolled || {{ $lightHero ? 'true' : 'false' }} }
        }" @scroll.window="scrolled = (window.pageYOffset > 20)"
            :class="scrolled
                ?
                'bg-white/90 backdrop-blur-md shadow-md py-2' :
                (isLight ? 'bg-transparent py-4' : '{{ $navbarClass }} py-4')"
            class="fixed top-0 left-0 w-full z-50 transition-all duration-300" id="navbar">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20 items-center">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('home') }}" :class="isLight ? 'text-gray-900' : 'text-white'"
                                class="text-2xl font-black tracking-tighter flex items-center gap-2 group transition-colors duration-300">
                                <span
                                    class="w-8 h-8 bg-primary-red rounded-lg flex items-center justify-center text-white transform group-hover:rotate-12 transition-transform duration-300">
                                    P
                                </span>
                                Panchakanya<span class="text-primary-red">.</span>
                            </a>
                        </div>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:flex items-center">
                        <a href="{{ route('home') }}"
                            :class="isLight ?
                                '{{ request()->routeIs('home') ? 'text-primary-red font-bold' : 'text-gray-700 hover:text-primary-red' }}' :
                                '{{ request()->routeIs('home') ? 'text-white font-bold' : 'text-gray-300 hover:text-white' }}'"
                            class="nav-link text-sm font-medium transition duration-150 ease-in-out">
                            Home
                        </a>
                        <a href="{{ route('about') }}"
                            :class="isLight ?
                                '{{ request()->routeIs('about') ? 'text-primary-red font-bold' : 'text-gray-700 hover:text-primary-red' }}' :
                                '{{ request()->routeIs('about') ? 'text-white font-bold' : 'text-gray-300 hover:text-white' }}'"
                            class="nav-link text-sm font-medium transition duration-150 ease-in-out">
                            About
                        </a>
                        <a href="{{ route('home') }}#events"
                            :class="isLight ? 'text-gray-700 hover:text-primary-red' : 'text-gray-300 hover:text-white'"
                            class="nav-link text-sm font-medium transition duration-150 ease-in-out">
                            Events
                        </a>
                        <a href="{{ route('contact') }}"
                            :class="isLight ?
                                '{{ request()->routeIs('contact') ? 'text-primary-red font-bold' : 'text-gray-700 hover:text-primary-red' }}' :
                                '{{ request()->routeIs('contact') ? 'text-white font-bold' : 'text-gray-300 hover:text-white' }}'"
                            class="nav-link text-sm font-medium transition duration-150 ease-in-out">
                            Contact
                        </a>

                        <!-- Search Icon -->
                        <button
                            :class="isLight ? 'text-gray-600 hover:text-primary-red' : 'text-gray-300 hover:text-white'"
                            class="transition duration-150 ease-in-out focus:outline-none hover:scale-110 transform"
                            @click="searchOpen = !searchOpen">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>

                        <a href="{{ route('products.index') }}"
                            :class="isLight ? 'bg-gray-900 text-white hover:bg-primary-red border-transparent' :
                                'bg-white/10 backdrop-blur-md border-white/20 text-white hover:bg-primary-red hover:border-primary-red'"
                            class="ml-4 px-5 py-2.5 border text-sm font-bold rounded-full transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
                            View Products
                        </a>

                        @auth
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit"
                                    :class="isLight ? 'text-gray-700 hover:text-primary-red' : 'text-gray-300 hover:text-white'"
                                    class="text-sm font-medium transition duration-150 ease-in-out">
                                    Log Out
                                </button>
                            </form>
                        @endauth
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="searchOpen = !searchOpen"
                            :class="isLight ? 'text-gray-600 hover:text-primary-red' : 'text-gray-400 hover:text-white'"
                            class="p-2 mr-2 transition-colors">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                        <button @click="mobileMenuOpen = !mobileMenuOpen"
                            :class="isLight ? 'text-gray-600 hover:text-primary-red hover:bg-gray-100' :
                                'text-gray-400 hover:text-white hover:bg-gray-700'"
                            class="inline-flex items-center justify-center p-2 rounded-md focus:outline-none transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': mobileMenuOpen, 'inline-flex': !mobileMenuOpen }"
                                    class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !mobileMenuOpen, 'inline-flex': mobileMenuOpen }"
                                    class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div :class="{ 'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }"
                class="hidden sm:hidden bg-white shadow-xl border-t border-gray-100">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="{{ route('home') }}"
                        class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out {{ request()->routeIs('home') ? 'border-primary-red text-primary-red bg-red-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }}">
                        Home
                    </a>
                    <a href="{{ route('about') }}"
                        class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out {{ request()->routeIs('about') ? 'border-primary-red text-primary-red bg-red-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }}">
                        About
                    </a>
                    <a href="{{ route('home') }}#events"
                        class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                        Events
                    </a>
                    <a href="{{ route('contact') }}"
                        class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out {{ request()->routeIs('contact') ? 'border-primary-red text-primary-red bg-red-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }}">
                        Contact
                    </a>
                    <a href="{{ route('products.index') }}"
                        class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                        View Products
                    </a>
                </div>
                <div class="pt-4 pb-4 border-t border-gray-200">
                    @auth
                        <div class="flex items-center px-4">
                            <div class="flex-shrink-0">
                                <svg class="h-10 w-10 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                        <div class="mt-3 space-y-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>

            <!-- Search Modal (Simple Overlay) -->
            <div x-show="searchOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="absolute top-20 left-0 w-full bg-white shadow-lg border-t border-gray-100 p-4 z-40"
                style="display: none;">
                <form action="{{ route('products.index') }}" method="GET" class="max-w-3xl mx-auto flex gap-2">
                    <input type="text" name="search" placeholder="Search products..."
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    <button type="submit"
                        class="bg-primary-red text-white px-6 py-2 rounded-md hover:bg-red-700 transition-colors">Search</button>
                </form>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white pt-16 pb-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                    <!-- Brand -->
                    <div>
                        <div class="flex items-center gap-2 mb-6">
                            <span
                                class="w-8 h-8 bg-primary-red rounded-lg flex items-center justify-center text-white font-bold">P</span>
                            <span class="text-2xl font-bold tracking-tighter">Panchakanya<span
                                    class="text-primary-red">.</span></span>
                        </div>
                        <p class="text-gray-400 text-sm leading-relaxed mb-6">
                            Building trust since 1990. Your partner in quality construction materials and hardware
                            solutions.
                        </p>
                        <div class="flex space-x-4">
                            <a href="https://facebook.com/panchakanya" target="_blank"
                                class="text-gray-400 hover:text-primary-red transition-colors"><span
                                    class="sr-only">Facebook</span><i class="fab fa-facebook text-2xl"></i></a>
                            <a href="https://twitter.com/panchakanya" target="_blank"
                                class="text-gray-400 hover:text-primary-red transition-colors"><span
                                    class="sr-only">Twitter</span><i class="fab fa-twitter text-2xl"></i></a>
                            <a href="https://instagram.com/panchakanya" target="_blank"
                                class="text-gray-400 hover:text-primary-red transition-colors"><span
                                    class="sr-only">Instagram</span><i class="fab fa-instagram text-2xl"></i></a>
                            <a href="https://linkedin.com/company/panchakanya" target="_blank"
                                class="text-gray-400 hover:text-primary-red transition-colors"><span
                                    class="sr-only">LinkedIn</span><i class="fab fa-linkedin text-2xl"></i></a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-lg font-bold mb-6 text-white">Quick Links</h3>
                        <ul class="space-y-4">
                            <li><a href="{{ route('home') }}"
                                    class="text-gray-400 hover:text-primary-red transition-colors flex items-center gap-2"><span
                                        class="w-1.5 h-1.5 rounded-full bg-gray-600"></span> Home</a></li>
                            <li><a href="{{ route('about') }}"
                                    class="text-gray-400 hover:text-primary-red transition-colors flex items-center gap-2"><span
                                        class="w-1.5 h-1.5 rounded-full bg-gray-600"></span> About Us</a></li>
                            <li><a href="{{ route('products.index') }}"
                                    class="text-gray-400 hover:text-primary-red transition-colors flex items-center gap-2"><span
                                        class="w-1.5 h-1.5 rounded-full bg-gray-600"></span> Products</a></li>
                            <li><a href="{{ route('contact') }}"
                                    class="text-gray-400 hover:text-primary-red transition-colors flex items-center gap-2"><span
                                        class="w-1.5 h-1.5 rounded-full bg-gray-600"></span> Contact</a></li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h3 class="text-lg font-bold mb-6 text-white">Contact Info</h3>
                        <ul class="space-y-4 text-gray-400">
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-primary-red shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ $globalSettings['contact_address'] ?? 'Kathmandu, Nepal' }}</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-primary-red shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span>{{ $globalSettings['contact_phone'] ?? '+977-1-4XXXXXX' }}</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-primary-red shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $globalSettings['contact_email'] ?? 'info@panchakanya.com' }}</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Newsletter -->
                    <div>
                        <h3 class="text-lg font-bold mb-6 text-white">Stay Updated</h3>
                        <p class="text-gray-400 text-sm mb-4">Subscribe to our newsletter for latest updates and
                            offers.</p>
                        <form class="flex gap-2">
                            <input type="email" placeholder="Your email"
                                class="bg-gray-800 border-none rounded-lg px-4 py-2 w-full text-white focus:ring-2 focus:ring-primary-red">
                            <button
                                class="bg-primary-red text-white p-2 rounded-lg hover:bg-red-700 transition-colors">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <div
                    class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-gray-500 text-sm">
                        &copy; {{ date('Y') }} {{ $globalSettings['site_name'] ?? 'Panchakanya Hardware' }}. All
                        rights reserved.
                    </p>
                    <div class="flex gap-6 text-sm text-gray-500">
                        <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                        <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scroll Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target); // Only animate once
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>

</html>
