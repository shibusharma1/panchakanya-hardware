<x-front-layout :light-hero="true">
    <!-- Modern Hero Section -->
    <div class="relative pt-24 pb-12 sm:pt-32 sm:pb-16 overflow-hidden">
        <x-hero-background />
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tighter text-gray-900 sm:text-6xl mb-6 animate-fade-up">
                {!! $contactInfo['hero_title'] ?? 'Get in <span class="text-red-600">Touch</span>' !!}
            </h1>
            <p class="mt-6 text-lg leading-8 text-gray-600 max-w-2xl mx-auto font-medium animate-fade-up delay-100">
                {{ $contactInfo['hero_description'] ?? "Have questions? We're here to help. Send us a message or reach out directly." }}
            </p>
        </div>
    </div>

    <!-- Contact Content -->
    <div class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                
                <!-- Contact Info -->
                <div class="animate-on-scroll">
                    <div class="bg-white rounded-2xl shadow-lg p-8 h-full">
                        <h2 class="text-2xl font-bold text-gray-900 mb-8">Contact Information</h2>
                        
                        <dl class="space-y-8">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-full bg-primary-red/10 text-primary-red">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <dt class="text-lg font-medium text-gray-900">Phone</dt>
                                    <dd class="mt-1 text-base text-gray-500">
                                        {{ $contactInfo['phone'] ?? $globalSettings['contact_phone'] ?? $globalSettings['phone'] ?? '+977-1234567890' }}
                                    </dd>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-full bg-primary-red/10 text-primary-red">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <dt class="text-lg font-medium text-gray-900">Email</dt>
                                    <dd class="mt-1 text-base text-gray-500">
                                        {{ $contactInfo['email'] ?? $globalSettings['contact_email'] ?? $globalSettings['email'] ?? 'info@panchakanya.com' }}
                                    </dd>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-full bg-primary-red/10 text-primary-red">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <dt class="text-lg font-medium text-gray-900">Address</dt>
                                    <dd class="mt-1 text-base text-gray-500">
                                        {{ $contactInfo['address'] ?? $globalSettings['address'] ?? 'Kathmandu, Nepal' }}
                                    </dd>
                                </div>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="animate-on-scroll delay-100">
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-8">Send us a Message</h2>
                        <form action="{{ route('contact.store') }}" method="POST" class="grid grid-cols-1 gap-y-6">
                            @csrf
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <div class="mt-1">
                                    <input type="text" name="name" id="name" autocomplete="name" class="py-3 px-4 block w-full shadow-sm focus:ring-primary-red focus:border-primary-red border-gray-300 rounded-md bg-gray-50 focus:bg-white transition-colors" placeholder="John Doe" required>
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" autocomplete="email" class="py-3 px-4 block w-full shadow-sm focus:ring-primary-red focus:border-primary-red border-gray-300 rounded-md bg-gray-50 focus:bg-white transition-colors" placeholder="john@example.com" required>
                                </div>
                            </div>
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                                <div class="mt-1">
                                    <input type="text" name="subject" id="subject" class="py-3 px-4 block w-full shadow-sm focus:ring-primary-red focus:border-primary-red border-gray-300 rounded-md bg-gray-50 focus:bg-white transition-colors" placeholder="How can we help?" required>
                                </div>
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                <div class="mt-1">
                                    <textarea id="message" name="message" rows="4" class="py-3 px-4 block w-full shadow-sm focus:ring-primary-red focus:border-primary-red border-gray-300 rounded-md bg-gray-50 focus:bg-white transition-colors" placeholder="Your message here..." required></textarea>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="w-full inline-flex justify-center py-4 px-6 border border-transparent shadow-lg text-lg font-bold rounded-full text-white bg-primary-red hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-red transform transition hover:-translate-y-1 hover:shadow-red-500/30">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front-layout>
