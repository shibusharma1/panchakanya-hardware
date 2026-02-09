<x-front-layout :light-hero="true">
    <!-- Modern Hero Section -->
    <div class="relative pt-24 pb-12 sm:pt-32 sm:pb-16 overflow-hidden">
        <x-hero-background />
        
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tighter text-gray-900 sm:text-6xl mb-6 animate-fade-up">
                @if(request('search'))
                    Search Results for <span class="text-red-600">"{{ request('search') }}"</span>
                @else
                    Our <span class="text-red-600">Products</span>
                @endif
            </h1>
            <p class="mt-6 text-lg leading-8 text-gray-600 max-w-2xl mx-auto font-medium animate-fade-up delay-100">
                Explore our complete range of high-quality hardware and construction materials.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="pt-6 pb-24 lg:grid lg:grid-cols-4 lg:gap-x-10">
                <!-- Mobile Categories Filter -->
                <div class="lg:hidden mb-8 animate-on-scroll">
                    <details class="bg-white rounded-2xl shadow-lg group">
                        <summary class="list-none flex items-center justify-between p-6 cursor-pointer font-bold text-gray-900">
                            <span>Browse Categories</span>
                            <span class="transition-transform duration-300 group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                            </span>
                        </summary>
                        <div class="px-6 pb-6 border-t border-gray-100 pt-4">
                             <ul class="space-y-3">
                                <li>
                                    <a href="{{ route('products.index') }}" class="flex items-center text-primary-red font-bold transition-colors">
                                        <span class="w-2 h-2 rounded-full bg-primary-red mr-3"></span>
                                        All Categories
                                    </a>
                                </li>
                                @if(isset($globalCategories))
                                    @foreach($globalCategories as $cat)
                                        <li>
                                            <a href="{{ route('category.show', $cat->slug) }}" class="flex items-center text-gray-600 hover:text-primary-red transition-colors">
                                                <span class="w-2 h-2 rounded-full bg-gray-300 mr-3"></span>
                                                {{ $cat->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </details>
                </div>

                <!-- Sidebar -->
                <aside class="hidden lg:block animate-on-scroll">
                    <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 border-b border-gray-100 pb-4">Categories</h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="{{ route('products.index') }}" class="flex items-center text-primary-red font-bold transition-colors group">
                                    <span class="w-2 h-2 rounded-full bg-primary-red mr-3 transition-colors"></span>
                                    All Categories
                                </a>
                            </li>
                            @if(isset($globalCategories))
                                @foreach($globalCategories as $cat)
                                    <li>
                                        <a href="{{ route('category.show', $cat->slug) }}" class="flex items-center text-gray-600 hover:text-primary-red transition-colors group">
                                            <span class="w-2 h-2 rounded-full bg-gray-300 group-hover:bg-primary-red mr-3 transition-colors"></span>
                                            {{ $cat->name }}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </aside>

                <!-- Product Grid -->
                <section aria-labelledby="product-heading" class="mt-6 lg:mt-0 lg:col-span-3">
                    <h2 id="product-heading" class="sr-only">Products</h2>

                    <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 gap-x-8">
                        @forelse($products as $product)
                            <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden animate-on-scroll">
                                <div class="w-full aspect-square bg-gray-200 overflow-hidden relative">
                                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300' }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover transition-transform duration-500 group-hover:scale-110">
                                    
                                    <!-- Quick View / Action Overlay -->
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                        <a href="{{ route('product.show', $product->slug) }}" class="bg-white text-gray-900 px-6 py-2 rounded-full font-bold transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 hover:bg-primary-red hover:text-white">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="p-6">
                                    <div class="mb-2">
                                        <p class="text-xs text-gray-500 uppercase tracking-wide">{{ $product->category->name ?? 'General' }}</p>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-primary-red transition-colors">
                                        <a href="{{ route('product.show', $product->slug) }}">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            {{ $product->name }}
                                        </a>
                                    </h3>
                                    <div class="flex items-center justify-between mt-4 border-t border-gray-100 pt-4">
                                        @if($product->price)
                                            <p class="text-xl font-extrabold text-primary-red">Rs. {{ number_format($product->price, 2) }}</p>
                                        @else
                                            <p class="text-sm text-gray-500 italic">Contact for price</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-3 text-center py-20 bg-white rounded-2xl shadow-sm animate-on-scroll">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414a1 1 0 00-.707-.293H4"></path></svg>
                                <p class="text-xl text-gray-500 font-medium">No products found.</p>
                                <a href="{{ route('home') }}" class="mt-4 inline-block text-primary-red hover:underline font-bold">Back to Home</a>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-12">
                        {{ $products->withQueryString()->links() }}
                    </div>
                </section>
            </div>
        </div>
</x-front-layout>
