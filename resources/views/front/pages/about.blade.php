<x-front-layout :light-hero="true">
    @php
        $img1 = (isset($about['image_1']) && str_starts_with($about['image_1'], 'http')) ? $about['image_1'] : (isset($about['image_1']) ? asset('storage/' . $about['image_1']) : 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80');
        $img2 = (isset($about['image_2']) && str_starts_with($about['image_2'], 'http')) ? $about['image_2'] : (isset($about['image_2']) ? asset('storage/' . $about['image_2']) : 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80');
        $img3 = (isset($about['image_3']) && str_starts_with($about['image_3'], 'http')) ? $about['image_3'] : (isset($about['image_3']) ? asset('storage/' . $about['image_3']) : 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80');
        $img4 = (isset($about['image_4']) && str_starts_with($about['image_4'], 'http')) ? $about['image_4'] : (isset($about['image_4']) ? asset('storage/' . $about['image_4']) : 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80');
    @endphp

    <!-- Modern Hero Section -->
    <div class="relative pt-24 pb-12 sm:pt-32 sm:pb-16 overflow-hidden">
        <x-hero-background />
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tighter text-gray-900 sm:text-6xl mb-6 animate-fade-up">
                {!! $about['title'] ?? 'Who <span class="text-red-600">We</span> Are' !!}
            </h1>
            <p class="mt-6 text-lg leading-8 text-gray-600 max-w-2xl mx-auto font-medium animate-fade-up delay-100">
                {{ $about['header_paragraph'] ?? 'Since 1990, Panchakanya Hardware has been the backbone of thousands of homes and commercial projects. Quality, Integrity, and Service are our blueprints.' }}
            </p>
        </div>
    </div>

    <!-- Story Section with Creative Grid -->
    <div class="bg-white py-16 sm:py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div class="order-2 lg:order-1 animate-fade-right">
                    <div class="inline-flex items-center px-3 py-1 rounded-full bg-red-50 text-red-600 text-xs font-bold uppercase tracking-widest mb-6">
                        Our Story
                    </div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-6">
                        {!! $about['story_title'] ?? 'From Humble Beginnings to <br> Market Leaders' !!}
                    </h2>
                    <div class="prose prose-lg text-gray-600">
                        {!! nl2br(e($about['description'] ?? 'Panchakanya Hardware started with a simple mission: to provide high-quality construction materials at fair prices. Over the last three decades, we have grown from a small shop to a comprehensive hardware solution provider. We believe in building lasting relationships with our clients by providing top-notch products and exceptional service.')) !!}
                    </div>
                    
                    <div class="mt-10 grid grid-cols-2 gap-8 border-t border-gray-100 pt-10">
                        <div>
                            <div class="text-4xl font-black text-gray-900">{{ $about['years_of_experience'] ?? '30' }}+</div>
                            <div class="text-sm font-semibold text-gray-500 mt-1">Years of Excellence</div>
                        </div>
                        <div>
                            <div class="text-4xl font-black text-gray-900">
                                {{ $about['active_customers_count'] ?? '5000' }}+
                            </div>
                            <div class="text-sm font-semibold text-gray-500 mt-1">Happy Clients</div>
                        </div>
                    </div>
                </div>

                <!-- Image Collage -->
                <div class="order-1 lg:order-2 relative animate-fade-left">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-4 mt-12">
                            <img class="rounded-2xl shadow-xl w-full h-48 object-cover hover:scale-105 transition-transform duration-500" src="{{ $img1 }}" alt="Construction Site">
                            <img class="rounded-2xl shadow-xl w-full h-64 object-cover hover:scale-105 transition-transform duration-500" src="{{ $img2 }}" alt="Worker">
                        </div>
                        <div class="space-y-4">
                            <img class="rounded-2xl shadow-xl w-full h-64 object-cover hover:scale-105 transition-transform duration-500" src="{{ $img3 }}" alt="Blueprint">
                            <img class="rounded-2xl shadow-xl w-full h-48 object-cover hover:scale-105 transition-transform duration-500" src="{{ $img4 }}" alt="Tools">
                        </div>
                    </div>
                    <!-- Decor element -->
                    <div class="absolute -z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-gradient-to-tr from-red-50 to-orange-50 rounded-full blur-3xl opacity-50"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Horizontal Slider: Our Core Values (Consistent with Home) -->
    <div class="py-24 bg-gray-50 overflow-hidden">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 mb-12 text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Why Choose Us?</h2>
            <p class="mt-4 text-gray-500">Our core values define who we are and how we serve you.</p>
        </div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                @php
                    $colors = [
                        1 => ['bg' => 'bg-red-600', 'shadow' => 'shadow-red-200', 'light' => 'bg-red-50'],
                        2 => ['bg' => 'bg-orange-600', 'shadow' => 'shadow-orange-200', 'light' => 'bg-orange-50'],
                        3 => ['bg' => 'bg-blue-600', 'shadow' => 'shadow-blue-200', 'light' => 'bg-blue-50'],
                        4 => ['bg' => 'bg-green-600', 'shadow' => 'shadow-green-200', 'light' => 'bg-green-50'],
                    ];
                @endphp
                @for($i = 1; $i <= 4; $i++)
                    @if(isset($whyChooseUs['card_'.$i.'_title']))
                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 relative overflow-hidden group/card h-full">
                        <div class="absolute top-0 right-0 w-24 h-24 {{ $colors[$i]['light'] }} rounded-bl-full -mr-4 -mt-4 transition-transform group-hover/card:scale-150 duration-500"></div>
                        <div class="relative z-10">
                            <div class="w-12 h-12 {{ $colors[$i]['bg'] }} rounded-xl flex items-center justify-center mb-6 text-white shadow-lg {{ $colors[$i]['shadow'] }}">
                                @if(!empty($whyChooseUs['card_'.$i.'_icon']))
                                    <i class="{{ $whyChooseUs['card_'.$i.'_icon'] }} text-white text-xl"></i>
                                @else
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                @endif
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $whyChooseUs['card_'.$i.'_title'] }}</h3>
                            <p class="text-gray-500 leading-relaxed">{{ $whyChooseUs['card_'.$i.'_description'] }}</p>
                        </div>
                    </div>
                    @endif
                @endfor

            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="relative isolate overflow-hidden bg-gray-900 py-16 sm:py-24 lg:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Ready to start your project?</h2>
                <p class="mt-4 text-lg leading-8 text-gray-300">Contact us today for a free consultation and quote. Let's build something great together.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="{{ route('contact') }}" class="rounded-md bg-red-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 transition-colors">Contact Us</a>
                    <a href="{{ route('products.index') }}" class="rounded-md bg-white/10 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-white/20 transition-colors">View Products</a>
                </div>
            </div>
        </div>
        <div class="absolute left-1/2 top-0 -z-10 -translate-x-1/2 blur-3xl xl:-top-6" aria-hidden="true">
            <div class="aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>
</x-front-layout>
