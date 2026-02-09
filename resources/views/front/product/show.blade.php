<x-front-layout :light-hero="true">
    <!-- Modern Hero Section -->
    <div class="relative pt-24 pb-12 sm:pt-32 sm:pb-16 overflow-hidden">
        <x-hero-background />
        
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tighter text-gray-900 sm:text-6xl mb-6 animate-fade-up">
                {{ $product->name }}
            </h1>
            <p class="mt-6 text-lg leading-8 text-gray-600 max-w-2xl mx-auto font-medium animate-fade-up delay-100">
                <span class="inline-flex items-center gap-2">
                    <span class="text-gray-400">Category:</span>
                    <a href="{{ route('category.show', $product->category->slug) }}" class="text-red-600 hover:text-red-700 font-bold transition-colors">
                        {{ $product->category->name }}
                    </a>
                </span>
            </p>
        </div>
    </div>

    <div class="bg-gray-50 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-8 mb-6 animate-on-scroll">
                <a href="{{ $product->category ? route('category.show', $product->category->slug) : route('products.index') }}" class="inline-flex items-center text-gray-500 hover:text-primary-red transition-colors font-medium">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    {{ $product->category ? 'Back to ' . $product->category->name : 'Back to Products' }}
                </a>
            </div>

            <div class="lg:grid lg:grid-cols-2 lg:gap-x-12 lg:items-start">
                <!-- Image gallery -->
                <div class="flex flex-col-reverse animate-on-scroll">
                    <div class="w-full aspect-square bg-white rounded-2xl shadow-xl overflow-hidden relative group">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/600' }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover sm:rounded-lg transform transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                </div>

                <!-- Product info -->
                <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0 animate-on-scroll delay-100">
                    <div class="mt-4">
                        <h2 class="sr-only">Product information</h2>
                        @if($product->price)
                            <p class="text-4xl font-bold text-primary-red">Rs. {{ number_format($product->price, 2) }}</p>
                        @endif
                    </div>

                    <div class="mt-8">
                        <h3 class="sr-only">Description</h3>
                        <div class="text-base text-gray-700 space-y-6 leading-relaxed bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                            {!! nl2br(e($product->description)) !!}
                        </div>
                    </div>

                    <div class="mt-10 flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('contact') }}" class="flex-1 bg-primary-red border border-transparent rounded-full py-4 px-8 flex items-center justify-center text-lg font-bold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-red-500 transition-all shadow-lg hover:shadow-red-500/30 transform hover:-translate-y-1">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Enquire Now
                        </a>
                        <a href="tel:{{ $globalSettings['contact_phone'] ?? $globalSettings['phone'] ?? '' }}" class="flex-1 bg-white border-2 border-gray-200 rounded-full py-4 px-8 flex items-center justify-center text-lg font-bold text-gray-700 hover:border-primary-red hover:text-primary-red focus:outline-none transition-all transform hover:-translate-y-1">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            Call Us
                        </a>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            @if($relatedProducts->count() > 0)
                <section aria-labelledby="related-heading" class="mt-24 border-t border-gray-200 pt-16">
                    <h2 id="related-heading" class="text-3xl font-extrabold tracking-tight text-gray-900 mb-8 animate-on-scroll">Related Products</h2>

                    <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                        @foreach($relatedProducts as $related)
                            <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden animate-on-scroll">
                                <div class="w-full aspect-square bg-gray-200 overflow-hidden relative">
                                    <img src="{{ $related->image ? asset('storage/' . $related->image) : 'https://via.placeholder.com/300' }}" alt="{{ $related->name }}" class="w-full h-full object-center object-cover transition-transform duration-500 group-hover:scale-110">
                                    
                                    <!-- Quick View / Action Overlay -->
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                        <a href="{{ route('product.show', $related->slug) }}" class="bg-white text-gray-900 px-4 py-2 rounded-full font-bold transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 hover:bg-primary-red hover:text-white text-sm">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1 group-hover:text-primary-red transition-colors">
                                        <a href="{{ route('product.show', $related->slug) }}">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            {{ $related->name }}
                                        </a>
                                    </h3>
                                    <p class="text-sm text-gray-500 mb-3">{{ $related->category->name }}</p>
                                    
                                    @if($related->price)
                                        <p class="text-lg font-bold text-primary-red">Rs. {{ number_format($related->price, 2) }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </div>
</x-front-layout>
