<x-front-layout :light-hero="false">
    <!-- Immersive Hero Section -->
    <div class="relative min-h-[90vh] flex items-center justify-center overflow-hidden bg-slate-900 pt-24">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img 
                src="{{ (isset($hero['image']) && str_starts_with($hero['image'], 'http')) ? $hero['image'] : (isset($hero['image']) ? asset('storage/' . $hero['image']) : 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80') }}" 
                alt="Hero Background" 
                class="w-full h-full object-cover opacity-60 scale-105 animate-slow-zoom"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-slate-900/40 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-transparent to-slate-900/90"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-8 text-center pb-32">
            <div class="space-y-8">
                <!-- Subtitle -->
                <p class="text-red-500 font-bold tracking-[0.2em] uppercase text-sm sm:text-base animate-fade-up">
                    {{ $hero['subtitle'] ?? 'Premium Hardware Solutions' }}
                </p>

                <!-- Main Title -->
                <h1 class="text-5xl sm:text-7xl lg:text-9xl font-black tracking-tighter text-white leading-tight animate-fade-up animation-delay-200">
                    BUILD YOUR <br class="hidden sm:block" />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-gray-200 to-gray-400">
                        DREAM
                    </span>
                </h1>

                <!-- Description -->
                <p class="max-w-2xl mx-auto text-lg sm:text-xl text-gray-300 leading-relaxed font-light animate-fade-up animation-delay-400">
                    {{ $hero['description'] ?? 'Experience the perfect blend of strength and aesthetics with Panchakanya\'s premium hardware solutions.' }}
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-8 animate-fade-up animation-delay-600">
                    <a href="{{ route('products.index') }}" class="group relative px-8 py-4 bg-red-600 overflow-hidden rounded-full transition-all hover:scale-105 shadow-2xl hover:shadow-red-900/50">
                        <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-shine"></div>
                        <span class="relative text-white font-bold tracking-wide flex items-center gap-2">
                            {{ $hero['button_text'] ?? 'Explore Catalog' }}
                            <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </span>
                    </a>
                    
                    <a href="#categories" class="px-8 py-4 rounded-full border border-white/20 text-white font-medium hover:bg-white/10 transition-all backdrop-blur-sm">
                        View Collections
                    </a>
                </div>
            </div>
        </div>

        <!-- Floating Stats/Features (Bottom) -->
        <div class="absolute bottom-0 left-0 w-full z-20 border-t border-white/10 bg-white/5 backdrop-blur-md hidden md:block animate-fade-up animation-delay-1000">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-6">
                <div class="grid grid-cols-3 gap-8 text-white/80">
                    <div class="flex items-center justify-center gap-4 border-r border-white/10">
                        <div class="p-3 rounded-full bg-white/10 text-red-500">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <p class="text-xs uppercase tracking-wider text-gray-400">Quality</p>
                            <p class="font-bold text-lg text-white">100% Guaranteed</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-4 border-r border-white/10">
                        <div class="p-3 rounded-full bg-white/10 text-red-500">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <p class="text-xs uppercase tracking-wider text-gray-400">Experience</p>
                            <p class="font-bold text-lg text-white">{{ $about['years_of_experience'] ?? '30' }}+ Years</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-4">
                        <div class="p-3 rounded-full bg-white/10 text-red-500">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <p class="text-xs uppercase tracking-wider text-gray-400">Clients</p>
                            <p class="font-bold text-lg text-white">{{ $about['active_customers_count'] ?? '5000' }}+ Happy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Categories -->
    @if($featuredCategories->count() > 0)
        <div id="categories" class="bg-gray-50 py-16 relative overflow-hidden">
             <!-- Decorative Background Elements -->
             <div class="absolute top-0 left-0 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-red-100 rounded-full blur-3xl opacity-50"></div>
             <div class="absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2 w-96 h-96 bg-gray-200 rounded-full blur-3xl opacity-50"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-12 animate-on-scroll">
                    <div class="inline-flex items-center px-3 py-1 rounded-full bg-red-50 text-red-600 text-xs font-bold uppercase tracking-widest mb-4">
                        Collections
                    </div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        Browse by Category
                    </h2>
                </div>
                
                <!-- Categories Slider -->
                <div x-data="{
                    autoSlideInterval: null,
                    init() {
                        if (window.innerWidth >= 768) {
                            this.startAutoSlide();
                        }
                    },
                    startAutoSlide() {
                        if (window.innerWidth < 768) return;
                        this.autoSlideInterval = setInterval(() => {
                            this.scrollNext();
                        }, 3000);
                    },
                    stopAutoSlide() {
                        clearInterval(this.autoSlideInterval);
                    },
                    scrollNext() {
                        const container = $refs.container;
                        if (container.scrollLeft + container.offsetWidth >= container.scrollWidth - 10) {
                            container.scrollTo({ left: 0, behavior: 'smooth' });
                        } else {
                            container.scrollBy({ left: container.offsetWidth / 2, behavior: 'smooth' });
                        }
                    },
                    scrollPrev() { $refs.container.scrollBy({ left: -$refs.container.offsetWidth / 2, behavior: 'smooth' }); }
                }" 
                class="relative group/slider px-4"
                @mouseenter="stopAutoSlide()"
                @mouseleave="startAutoSlide()"
                >
                    
                    <!-- Navigation Buttons -->
                    <button @click="scrollPrev()" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 z-20 bg-white text-gray-800 p-3 rounded-full shadow-lg opacity-0 group-hover/slider:opacity-100 transition-all duration-300 hover:bg-primary-red hover:text-white border border-gray-100 hidden md:block">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button @click="scrollNext()" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 z-20 bg-white text-gray-800 p-3 rounded-full shadow-lg opacity-0 group-hover/slider:opacity-100 transition-all duration-300 hover:bg-primary-red hover:text-white border border-gray-100 hidden md:block">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>

                    <div x-ref="container" class="flex overflow-x-auto gap-6 pb-4 snap-x snap-mandatory no-scrollbar scroll-smooth items-stretch">
                        @foreach($featuredCategories as $category)
                            <div class="flex-shrink-0 w-full sm:w-[45%] lg:w-[23%] snap-start h-full">
                                <a href="{{ route('category.show', $category->slug) }}" class="group/card block bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden animate-on-scroll border border-gray-100 flex flex-col h-full">
                                    <!-- Image Container -->
                                    <div class="relative h-48 overflow-hidden">
                                        <img src="{{ ($category->image && str_starts_with($category->image, 'http')) ? $category->image : ($category->image ? asset('storage/' . $category->image) : 'https://via.placeholder.com/600x400') }}" 
                                             alt="{{ $category->name }}" 
                                             class="w-full h-full object-cover transition-transform duration-700 group-hover/card:scale-110">
                                        <div class="absolute inset-0 bg-black/10 group-hover/card:bg-black/0 transition-colors duration-300"></div>
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="p-4 flex-1 flex flex-col justify-between">
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-900 mb-1 group-hover/card:text-primary-red transition-colors line-clamp-1">{{ $category->name }}</h3>
                                            <p class="text-gray-500 text-xs line-clamp-2 min-h-[2.5em]">
                                                {{ $category->description ?? 'Explore ' . $category->name }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Top Selling Products -->
    @if($topSellingProducts->count() > 0)
        <div class="bg-white py-16 relative overflow-hidden">
             <!-- Decorative Background Elements -->
             <div class="absolute top-1/2 left-0 -translate-y-1/2 w-64 h-64 bg-gray-50 rounded-full blur-3xl -z-10"></div>
             <div class="absolute bottom-0 right-0 w-96 h-96 bg-red-50 rounded-full blur-3xl -z-10 opacity-60"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-12 animate-on-scroll">
                    <div class="inline-flex items-center px-3 py-1 rounded-full bg-red-50 text-red-600 text-xs font-bold uppercase tracking-widest mb-4">
                        Customer Favorites
                    </div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        Top Selling Products
                    </h2>
                </div>
                
                <div x-data="{
                    autoSlideInterval: null,
                    init() {
                        if (window.innerWidth >= 768) {
                            this.startAutoSlide();
                        }
                    },
                    startAutoSlide() {
                        if (window.innerWidth < 768) return;
                        this.autoSlideInterval = setInterval(() => {
                            this.scrollNext();
                        }, 3000);
                    },
                    stopAutoSlide() {
                        clearInterval(this.autoSlideInterval);
                    },
                    scrollNext() {
                        const container = $refs.container;
                        if (container.scrollLeft + container.offsetWidth >= container.scrollWidth - 10) {
                            container.scrollTo({ left: 0, behavior: 'smooth' });
                        } else {
                            container.scrollBy({ left: container.offsetWidth / 2, behavior: 'smooth' });
                        }
                    },
                    scrollPrev() { $refs.container.scrollBy({ left: -$refs.container.offsetWidth / 2, behavior: 'smooth' }); }
                }" 
                class="relative group/slider px-4"
                @mouseenter="stopAutoSlide()"
                @mouseleave="startAutoSlide()"
                >
                    
                    <!-- Navigation Buttons -->
                    <button @click="scrollPrev()" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 z-20 bg-white text-gray-800 p-3 rounded-full shadow-lg opacity-0 group-hover/slider:opacity-100 transition-all duration-300 hover:bg-primary-red hover:text-white border border-gray-100 hidden md:block">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button @click="scrollNext()" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 z-20 bg-white text-gray-800 p-3 rounded-full shadow-lg opacity-0 group-hover/slider:opacity-100 transition-all duration-300 hover:bg-primary-red hover:text-white border border-gray-100 hidden md:block">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>

                    <div x-ref="container" class="flex overflow-x-auto gap-6 pb-4 snap-x snap-mandatory no-scrollbar scroll-smooth items-stretch">
                        @foreach($topSellingProducts as $product)
                            <div class="flex-shrink-0 w-full sm:w-[45%] lg:w-[20%] snap-start h-full">
                                <div class="group/card relative bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1 overflow-hidden animate-on-scroll flex flex-col h-full border border-gray-100">
                                    <!-- Image Container -->
                                    <div class="w-full aspect-square bg-gray-50 overflow-hidden relative">
                                        <img src="{{ ($product->image && str_starts_with($product->image, 'http')) ? $product->image : ($product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300') }}" 
                                             alt="{{ $product->name }}" 
                                             class="w-full h-full object-center object-cover transition-transform duration-700 group-hover/card:scale-110">
                                        
                                        <!-- Overlay Actions -->
                                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-3 backdrop-blur-[1px]">
                                            <a href="{{ route('product.show', $product->slug) }}" class="transform translate-y-4 group-hover/card:translate-y-0 transition-all duration-500 delay-100 bg-white text-gray-900 px-4 py-2 rounded-full hover:bg-primary-red hover:text-white shadow-lg font-bold text-xs flex items-center">
                                                View
                                            </a>
                                        </div>
                                        
                                        <!-- Badges -->
                                        @if($product->is_top_selling)
                                            <div class="absolute top-2 left-2">
                                                <span class="bg-primary-red text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow-md uppercase tracking-wide">
                                                    Best Seller
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <!-- Product Info -->
                                    <div class="p-4 flex-1 flex flex-col relative">
                                        <div class="mb-1">
                                            <span class="text-[10px] font-bold text-primary-red uppercase tracking-wider bg-red-50 px-1.5 py-0.5 rounded-md">{{ $product->category->name ?? 'General' }}</span>
                                        </div>
                                        <h3 class="text-sm font-bold text-gray-900 mb-1 leading-tight group-hover/card:text-primary-red transition-colors line-clamp-2 min-h-[2.5rem]">
                                            <a href="{{ route('product.show', $product->slug) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h3>
                                        
                                        <div class="mt-auto pt-2 border-t border-gray-50 flex items-end justify-between">
                                            @if($product->price)
                                                <span class="text-base font-black text-gray-900">Rs. {{ number_format($product->price, 0) }}</span>
                                            @else
                                                <span class="text-xs font-medium text-gray-500 italic bg-gray-100 px-2 py-0.5 rounded-full">Contact us</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="mt-12 text-center animate-on-scroll">
                    <a href="{{ route('products.index') }}" class="group inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-bold rounded-full hover:bg-primary-red transition-all duration-300 shadow-xl hover:shadow-red-900/30 transform hover:-translate-y-1">
                        View Full Collection
                        <svg class="ml-2 -mr-1 w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- Why Choose Us -->
    <div class="bg-gray-900 py-16 relative overflow-hidden">
        <!-- Background Accents -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 opacity-20">
             <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary-red rounded-full mix-blend-multiply filter blur-3xl animate-[pulse_8s_ease-in-out_infinite]"></div>
             <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-blue-900 rounded-full mix-blend-multiply filter blur-3xl animate-[pulse_10s_ease-in-out_infinite]"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-12 animate-on-scroll">
                <h2 class="text-2xl font-extrabold text-white sm:text-3xl">
                    {{ $whyChooseUs['title'] ?? 'Why Choose Panchakanya Hardware?' }}
                </h2>
                <div class="w-16 h-1 bg-gradient-to-r from-primary-red to-red-900 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @for($i = 1; $i <= 4; $i++)
                    @if(isset($whyChooseUs['card_'.$i.'_title']))
                    <div class="bg-white/5 backdrop-blur-md p-6 rounded-2xl border border-white/10 hover:border-primary-red/50 transition-all duration-300 group hover:-translate-y-1 hover:bg-white/10 animate-on-scroll h-full flex flex-col delay-{{ ($i-1)*100 }}">
                        <div class="w-12 h-12 bg-gradient-to-br from-gray-800 to-black rounded-xl flex items-center justify-center mb-4 group-hover:from-primary-red group-hover:to-red-900 transition-all duration-300 shadow-lg border border-white/10 flex-shrink-0">
                            @if(isset($whyChooseUs['card_'.$i.'_icon']) && str_contains($whyChooseUs['card_'.$i.'_icon'], 'fa-'))
                                <i class="{{ $whyChooseUs['card_'.$i.'_icon'] }} text-white text-xl"></i>
                            @else
                                <!-- Fallback Icon -->
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2 group-hover:text-primary-red transition-colors">{{ $whyChooseUs['card_'.$i.'_title'] }}</h3>
                        <p class="text-gray-400 text-sm leading-relaxed group-hover:text-gray-300 transition-colors flex-1">
                            {{ $whyChooseUs['card_'.$i.'_description'] }}
                        </p>
                    </div>
                    @endif
                @endfor
            </div>
        </div>
    </div>

    <!-- Latest Events -->
    @if(isset($upcomingEvents) && $upcomingEvents->count() > 0)
        <div id="events" class="bg-gray-50 py-16 relative overflow-hidden">
             <!-- Decorative Elements -->
             <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-96 h-96 bg-red-100 rounded-full blur-3xl opacity-50"></div>
             <div class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/2 w-96 h-96 bg-gray-200 rounded-full blur-3xl opacity-50"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center max-w-3xl mx-auto mb-12 animate-on-scroll">
                    <div class="inline-flex items-center px-3 py-1 rounded-full bg-red-50 text-red-600 text-xs font-bold uppercase tracking-widest mb-4">
                        News & Updates
                    </div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        Upcoming Events
                    </h2>
                </div>

                <div x-data="{
                    scrollNext() { $refs.container.scrollBy({ left: $refs.container.offsetWidth / 2, behavior: 'smooth' }); },
                    scrollPrev() { $refs.container.scrollBy({ left: -$refs.container.offsetWidth / 2, behavior: 'smooth' }); }
                }" class="relative group/slider px-4">
                    
                    <!-- Navigation Buttons -->
                    <button @click="scrollPrev()" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 z-20 bg-white text-gray-800 p-3 rounded-full shadow-lg opacity-0 group-hover/slider:opacity-100 transition-all duration-300 hover:bg-primary-red hover:text-white border border-gray-100 hidden md:block">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button @click="scrollNext()" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 z-20 bg-white text-gray-800 p-3 rounded-full shadow-lg opacity-0 group-hover/slider:opacity-100 transition-all duration-300 hover:bg-primary-red hover:text-white border border-gray-100 hidden md:block">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>

                    <div x-ref="container" class="flex overflow-x-auto gap-6 pb-4 snap-x snap-mandatory no-scrollbar scroll-smooth items-stretch">
                        @foreach($upcomingEvents as $event)
                            <div class="flex-shrink-0 w-full sm:w-[45%] lg:w-[23%] snap-start h-full">
                                <a href="{{ route('event.show', $event->slug) }}" class="group/card flex flex-col bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100 animate-on-scroll h-full">
                                    <div class="relative h-56 overflow-hidden">
                                        <img src="{{ $event->image ? asset('storage/' . $event->image) : 'https://via.placeholder.com/600x400' }}" alt="{{ $event->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover/card:scale-110">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-60"></div>
                                        
                                        <!-- Date Badge -->
                                        <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-md px-3 py-1 rounded-xl shadow-lg flex flex-col items-center border border-white/50">
                                            <span class="text-lg font-black text-gray-900 leading-none">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</span>
                                            <span class="text-[10px] font-bold text-primary-red uppercase tracking-wide">{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="p-5 flex-1 flex flex-col">
                                        <div class="mb-2">
                                            @if($event->location)
                                                <div class="flex items-center text-xs text-gray-500 mb-1">
                                                    <svg class="w-3 h-3 mr-1 text-primary-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                                    {{ $event->location }}
                                                </div>
                                            @endif
                                            <h3 class="text-lg font-bold text-gray-900 group-hover/card:text-primary-red transition-colors line-clamp-2 leading-tight min-h-[3.5rem]">
                                                {{ $event->title }}
                                            </h3>
                                        </div>
                                        
                                        <div class="flex-1 mb-4">
                                            <p class="text-gray-500 text-sm line-clamp-2 leading-relaxed min-h-[2.5rem]">
                                                {{ \Illuminate\Support\Str::limit($event->description ?? '', 80) }}
                                            </p>
                                        </div>
                                        
                                        <div class="pt-4 border-t border-gray-100 flex items-center justify-between mt-auto">
                                            <span class="text-xs font-bold text-gray-900 group-hover/card:text-primary-red transition-colors">View Details</span>
                                            <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center group-hover/card:bg-primary-red group-hover/card:text-white transition-all duration-300 shadow-sm">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="mt-12 text-center animate-on-scroll">
                    <a href="{{ route('events.index') }}" class="inline-flex items-center px-6 py-2.5 border-2 border-gray-900 text-sm font-bold rounded-full text-gray-900 hover:bg-gray-900 hover:text-white transition-all duration-300">
                        View All Events
                        <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- CTA Section -->
    <div class="relative py-16 overflow-hidden bg-gray-900">
        <!-- Background Image/Pattern -->
        <div class="absolute inset-0 z-0">
             <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/95 to-primary-red/20"></div>
             <div class="absolute top-0 right-0 w-full h-full opacity-10">
                 <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                     <defs>
                         <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                             <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                         </pattern>
                     </defs>
                     <rect width="100%" height="100%" fill="url(#grid)" />
                 </svg>
             </div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="lg:w-1/2 text-left animate-on-scroll">
                    <span class="text-primary-red font-bold tracking-wider uppercase text-xs mb-1 block">{{ $cta['subtitle'] ?? 'Get in Touch' }}</span>
                    <h2 class="text-3xl font-black text-white sm:text-4xl mb-4 tracking-tight leading-tight">
                        {!! $cta['title'] ?? 'Building Your Dream <br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-red to-red-400">Project?</span>' !!}
                    </h2>
                    <p class="text-lg text-gray-400 max-w-lg leading-relaxed mb-6">
                        {{ $cta['description'] ?? 'We are here to help you find the best materials for your construction needs. Contact us today.' }}
                    </p>
                    
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ $cta['button_link'] ?? route('contact') }}" class="px-6 py-3 bg-primary-red text-white text-base font-bold rounded-full shadow-lg shadow-red-900/30 hover:bg-red-700 transition-all duration-300 transform hover:-translate-y-1 flex items-center">
                            {{ $cta['button_text'] ?? 'Contact Us Now' }}
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </a>
                        <a href="#categories" class="px-6 py-3 bg-white/10 backdrop-blur-sm border border-white/20 text-white text-base font-bold rounded-full hover:bg-white hover:text-gray-900 transition-all duration-300 flex items-center">
                            Explore Catalog
                        </a>
                    </div>
                </div>
                
                <div class="lg:w-5/12 animate-on-scroll delay-100">
                    <div class="relative bg-white/5 backdrop-blur-md p-6 rounded-2xl border border-white/10 shadow-2xl">
                         <!-- Contact Info Cards -->
                         <div class="space-y-4">
                             <div class="flex items-start">
                                 <div class="w-10 h-10 rounded-lg bg-primary-red/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                     <svg class="w-5 h-5 text-primary-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                 </div>
                                 <div class="ml-3">
                                     <h4 class="text-white font-bold text-base">Call Us</h4>
                                     <p class="text-gray-400 text-sm">
                                         {{ $globalSettings['site_phone'] ?? $globalSettings['contact_phone'] ?? '+977-1234567890' }}
                                     </p>
                                     <p class="text-[10px] text-gray-500 mt-0.5">Mon-Fri 8am-5pm</p>
                                 </div>
                             </div>
                             
                             <div class="flex items-start">
                                 <div class="w-10 h-10 rounded-lg bg-primary-red/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                     <svg class="w-5 h-5 text-primary-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                 </div>
                                 <div class="ml-3">
                                     <h4 class="text-white font-bold text-base">Email Us</h4>
                                     <p class="text-gray-400 text-sm">
                                         {{ $globalSettings['site_email'] ?? $globalSettings['contact_email'] ?? 'info@panchakanya.com' }}
                                     </p>
                                     <p class="text-[10px] text-gray-500 mt-0.5">Online 24/7</p>
                                 </div>
                             </div>
                             
                             <div class="flex items-start">
                                 <div class="w-10 h-10 rounded-lg bg-primary-red/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                     <svg class="w-5 h-5 text-primary-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                 </div>
                                 <div class="ml-3">
                                     <h4 class="text-white font-bold text-base">Visit Us</h4>
                                     <p class="text-gray-400 text-sm">
                                         {{ $globalSettings['site_address'] ?? $globalSettings['address'] ?? 'Kathmandu, Nepal' }}
                                     </p>
                                 </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front-layout>
