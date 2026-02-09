<x-front-layout :light-hero="true">
    <!-- Modern Hero Section -->
    <div class="relative pt-24 pb-12 sm:pt-32 sm:pb-16 overflow-hidden">
        <x-hero-background />
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <!-- Date Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-50 text-red-600 mb-8 animate-fade-up">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="font-bold tracking-wide uppercase text-sm">
                    {{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}
                </span>
            </div>

            <h1 class="text-4xl font-black tracking-tighter text-gray-900 sm:text-6xl mb-6 animate-fade-up animation-delay-100">
                {{ $event->title }}
            </h1>

            @if($event->location)
                <div class="flex items-center justify-center gap-2 text-gray-600 text-lg md:text-xl animate-fade-up animation-delay-200">
                    <svg class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="font-medium">{{ $event->location }}</span>
                </div>
            @endif
        </div>
    </div>

    <!-- Content Section -->
    <div class="bg-white py-16 sm:py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-start">
                <!-- Image Section (Left) -->
                <div class="relative animate-fade-right order-2 lg:order-1">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl group">
                        @if($event->image)
                            <img src="{{ str_starts_with($event->image, 'http') ? $event->image : asset('storage/' . $event->image) }}" 
                                 alt="{{ $event->title }}" 
                                 class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
                        @else
                            <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" 
                                 alt="Event Background" 
                                 class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    
                    <!-- Decorative Blob -->
                    <div class="absolute -z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-gradient-to-tr from-red-50 to-orange-50 rounded-full blur-3xl opacity-60"></div>

                    <!-- Date/Location Summary Box -->
                    <div class="mt-8 bg-gray-50 rounded-2xl p-6 border border-gray-100">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-start gap-3">
                                <div class="p-2 bg-red-100 text-red-600 rounded-lg">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wide">Date</p>
                                    <p class="font-semibold text-gray-900">{{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}</p>
                                </div>
                            </div>
                            @if($event->location)
                            <div class="flex items-start gap-3">
                                <div class="p-2 bg-red-100 text-red-600 rounded-lg">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wide">Location</p>
                                    <p class="font-semibold text-gray-900">{{ $event->location }}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Content Section (Right) -->
                <div class="order-1 lg:order-2 animate-fade-left">
                    <a href="{{ route('events.index') }}" class="inline-flex items-center text-sm font-bold text-gray-500 hover:text-red-600 transition-colors mb-8 group">
                        <svg class="w-4 h-4 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to Events
                    </a>

                    <div class="inline-flex items-center px-3 py-1 rounded-full bg-red-50 text-red-600 text-xs font-bold uppercase tracking-widest mb-6">
                        Event Details
                    </div>

                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-6">
                        About the Event
                    </h2>

                    <div class="prose prose-lg prose-red text-gray-600 mb-8">
                        {!! nl2br(e($event->description)) !!}
                    </div>

                    <!-- CTA Action -->
                    <div class="bg-gray-900 rounded-2xl p-8 text-center sm:text-left relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-red-600 rounded-full blur-3xl opacity-20 -mr-10 -mt-10 transition-transform group-hover:scale-150 duration-700"></div>
                        
                        <div class="relative z-10 flex flex-col sm:flex-row items-center justify-between gap-6">
                            <div>
                                <h4 class="text-xl font-bold text-white mb-1">Join Us There?</h4>
                                <p class="text-gray-400 text-sm">Have questions or want to register?</p>
                            </div>
                            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-6 py-3 bg-red-600 text-white font-bold rounded-xl transition-all hover:bg-red-700 hover:scale-105 shadow-lg shadow-red-900/30">
                                Get in Touch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front-layout>
