<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin</title>

            <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex">
            <!-- Sidebar -->
            <aside class="w-72 bg-white/95 backdrop-blur shadow-lg min-h-screen fixed inset-y-0 left-0 z-50 border-r border-gray-100 overflow-y-auto">
                <div class="p-6 border-b border-gray-100 sticky top-0 bg-white z-10">
                    <a href="{{ route('admin.dashboard') }}" class="text-2xl font-black tracking-tight text-gray-900 flex items-center gap-3">
                        <span class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center text-white">P</span>
                        <span>Panchakanya Admin</span>
                    </a>
                    <p class="mt-2 text-xs text-gray-500">Manage content and operations</p>
                </div>
                <nav class="mt-4 px-2" x-data="{ 
                    openCatalog: {{ request()->routeIs('admin.categories.*', 'admin.products.*', 'admin.events.*') ? 'true' : 'false' }},
                    openPages: {{ request()->routeIs('admin.about.edit', 'admin.contact.edit', 'admin.homepage-sections.*') ? 'true' : 'false' }},
                    openAdmin: {{ request()->routeIs('admin.users.*', 'admin.site-settings.*') ? 'true' : 'false' }}
                }">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 font-semibold text-red-600' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard
                    </a>

                    <!-- Catalog Dropdown -->
                    <div class="mt-2">
                        <button @click="openCatalog = !openCatalog" class="w-full flex items-center justify-between px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                <span>Catalog</span>
                            </div>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="openCatalog ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="openCatalog" x-transition class="pl-11 pr-2 space-y-1 mt-1">
                            <a href="{{ route('admin.categories.index') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-red-600 rounded {{ request()->routeIs('admin.categories.*') ? 'text-red-600 font-semibold' : '' }}">Categories</a>
                            <a href="{{ route('admin.products.index') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-red-600 rounded {{ request()->routeIs('admin.products.*') ? 'text-red-600 font-semibold' : '' }}">Products</a>
                            <a href="{{ route('admin.events.index') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-red-600 rounded {{ request()->routeIs('admin.events.*') ? 'text-red-600 font-semibold' : '' }}">Events</a>
                        </div>
                    </div>

                    <!-- Pages & Content Dropdown -->
                    <div class="mt-2">
                        <button @click="openPages = !openPages" class="w-full flex items-center justify-between px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                <span>Pages & Content</span>
                            </div>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="openPages ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="openPages" x-transition class="pl-11 pr-2 space-y-1 mt-1">
                            <a href="{{ route('admin.about.edit') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-red-600 rounded {{ request()->routeIs('admin.about.edit') ? 'text-red-600 font-semibold' : '' }}">About Us</a>
                            <a href="{{ route('admin.contact.edit') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-red-600 rounded {{ request()->routeIs('admin.contact.edit') ? 'text-red-600 font-semibold' : '' }}">Contact Page</a>
                            <a href="{{ route('admin.homepage-sections.index') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-red-600 rounded {{ request()->routeIs('admin.homepage-sections.*') ? 'text-red-600 font-semibold' : '' }}">Homepage Sections</a>
                        </div>
                    </div>
                    
                    <!-- Messages -->
                    <a href="{{ route('admin.contact-messages.index') }}" class="flex items-center gap-3 px-4 py-3 mt-2 text-gray-700 hover:bg-gray-100 rounded-lg {{ request()->routeIs('admin.contact-messages.*') ? 'bg-gray-100 font-semibold text-red-600' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Messages
                    </a>

                    <!-- Administration Dropdown -->
                    <div class="mt-2">
                        <button @click="openAdmin = !openAdmin" class="w-full flex items-center justify-between px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span>Administration</span>
                            </div>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="openAdmin ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="openAdmin" x-transition class="pl-11 pr-2 space-y-1 mt-1">
                            <a href="{{ route('admin.users.index') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-red-600 rounded {{ request()->routeIs('admin.users.*') ? 'text-red-600 font-semibold' : '' }}">Admin Users</a>
                            <a href="{{ route('admin.site-settings.index') }}" class="block px-3 py-2 text-sm text-gray-600 hover:text-red-600 rounded {{ request()->routeIs('admin.site-settings.*') ? 'text-red-600 font-semibold' : '' }}">Site Settings</a>
                        </div>
                    </div>
                    
                    <!-- Profile -->
                    <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-3 px-4 py-3 mt-2 text-gray-700 hover:bg-gray-100 rounded-lg {{ request()->routeIs('admin.profile.*') ? 'bg-gray-100 font-semibold text-red-600' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        My Profile
                    </a>

                    <div class="border-t border-gray-100 mt-4 pt-4 px-4 pb-6">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center gap-3 w-full px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Log Out
                            </button>
                        </form>
                    </div>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 ml-72">
                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white/90 backdrop-blur border-b border-gray-100">
                        <div class="w-full mx-auto py-4 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>

        <script>
            // SweetAlert for Flash Messages
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    timer: 3000,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end'
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: "{{ session('error') }}",
                    timer: 4000,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end'
                });
            @endif

            // Global Delete Confirmation
            function confirmDelete(formId) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(formId).submit();
                    }
                })
            }
        </script>
    </body>
</html>
