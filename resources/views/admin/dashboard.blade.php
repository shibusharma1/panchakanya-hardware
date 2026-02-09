<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-6">
            <!-- Welcome Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl mb-8 border border-gray-100">
                <div class="p-8 text-gray-900 flex justify-between items-center">
                    <div>
                        <h3 class="text-2xl font-bold mb-2 text-gray-800">Welcome back, {{ Auth::user()->name }}!</h3>
                        <p class="text-gray-600">Here's what's happening with your website today.</p>
                    </div>
                    <div class="hidden sm:block">
                        <span class="inline-flex items-center px-4 py-2 rounded-full bg-red-50 text-red-700 text-sm font-medium">
                            {{ now()->format('l, F j, Y') }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Products -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 hover:shadow-md transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-50 text-blue-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Total Products</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $productCount ?? 0 }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('admin.products.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium inline-flex items-center">
                                View Inventory <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Categories -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 hover:shadow-md transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-50 text-green-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Categories</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $categoryCount ?? 0 }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('admin.categories.index') }}" class="text-sm text-green-600 hover:text-green-800 font-medium inline-flex items-center">
                                Manage Categories <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Events -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 hover:shadow-md transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-50 text-purple-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Events</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $eventCount ?? 0 }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('admin.events.index') }}" class="text-sm text-purple-600 hover:text-purple-800 font-medium inline-flex items-center">
                                View Events <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Messages -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 hover:shadow-md transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-50 text-yellow-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Unread Messages</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $messageCount ?? 0 }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('admin.contact-messages.index') }}" class="text-sm text-yellow-600 hover:text-yellow-800 font-medium inline-flex items-center">
                                Check Inbox <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Add New Product -->
                <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-md overflow-hidden text-white relative group">
                    <div class="absolute right-0 top-0 h-full w-1/2 bg-white opacity-5 transform skew-x-12 translate-x-12"></div>
                    <div class="p-6 relative z-10">
                        <h4 class="text-xl font-bold mb-2">Add New Product</h4>
                        <p class="text-red-100 mb-6 text-sm">Expand your catalog with new items.</p>
                        <a href="{{ route('admin.products.create') }}" class="inline-block bg-white text-red-600 font-semibold py-2 px-4 rounded-lg shadow hover:bg-red-50 transition-colors duration-200">
                            Create Product
                        </a>
                    </div>
                </div>

                <!-- Update Homepage -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-md overflow-hidden text-white relative group">
                    <div class="absolute right-0 top-0 h-full w-1/2 bg-white opacity-5 transform skew-x-12 translate-x-12"></div>
                    <div class="p-6 relative z-10">
                        <h4 class="text-xl font-bold mb-2">Update Homepage</h4>
                        <p class="text-gray-300 mb-6 text-sm">Keep your landing page fresh and engaging.</p>
                        <a href="{{ route('admin.homepage-sections.index') }}" class="inline-block bg-white text-gray-900 font-semibold py-2 px-4 rounded-lg shadow hover:bg-gray-100 transition-colors duration-200">
                            Manage Sections
                        </a>
                    </div>
                </div>
            </div>
    </div>
</x-admin-layout>
