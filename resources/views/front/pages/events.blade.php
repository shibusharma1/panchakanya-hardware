<x-front-layout :light-hero="true">
    <!-- Modern Hero Section -->
    <div class="relative pt-24 pb-12 sm:pt-32 sm:pb-16 overflow-hidden">
        <x-hero-background />

        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tighter text-gray-900 sm:text-6xl mb-6 animate-fade-up">
                Upcoming <span class="text-red-600">Events</span>
            </h1>
            <p class="mt-6 text-lg leading-8 text-gray-600 max-w-2xl mx-auto font-medium animate-fade-up delay-100">
                Join us for workshops, product launches, and community gatherings.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($events as $event)
                    <a href="{{ route('event.show', $event->slug) }}" class="group block bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 animate-on-scroll">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ $event->image ? asset('storage/' . $event->image) : 'https://via.placeholder.com/600x400' }}" alt="{{ $event->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-center px-4 py-2 rounded-xl shadow-lg">
                                <span class="block text-xl font-bold text-gray-900">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</span>
                                <span class="block text-xs font-bold text-primary-red uppercase">{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary-red transition-colors line-clamp-1">
                                {{ $event->title }}
                            </h3>
                            <div class="flex items-center text-gray-500 mb-4 text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $event->location }}
                            </div>
                            <p class="text-gray-500 mb-6 line-clamp-2 leading-relaxed">
                                {{ \Illuminate\Support\Str::limit($event->description ?? '', 100) }}
                            </p>
                            <span class="inline-flex items-center text-gray-900 font-bold group-hover:text-primary-red transition-colors">
                                Read More 
                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="col-span-3 text-center py-20 bg-white rounded-2xl shadow-sm animate-on-scroll">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="text-xl text-gray-500 font-medium">No upcoming events at the moment.</p>
                        <a href="{{ route('home') }}" class="mt-4 inline-block text-primary-red hover:underline font-bold">Back to Home</a>
                    </div>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $events->links() }}
            </div>
        </div>
</x-front-layout>
