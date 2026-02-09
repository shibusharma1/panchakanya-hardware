<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit {{ ucfirst(str_replace('_', ' ', $homepageSection->section_key)) }} Section
        </h2>
    </x-slot>

    <div class="p-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                @php
                    $action = route('admin.homepage-sections.update', $homepageSection->id);
                    if (request()->routeIs('admin.about.edit')) {
                        $action = route('admin.about.update');
                    } elseif (request()->routeIs('admin.contact.edit')) {
                        $action = route('admin.contact.update');
                    }
                @endphp
                <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    @if($homepageSection->section_key === 'hero')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                                <input type="text" name="title" value="{{ $homepageSection->content['title'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Subtitle</label>
                                <input type="text" name="subtitle" value="{{ $homepageSection->content['subtitle'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Background Image</label>
                                @if(isset($homepageSection->content['image']))
                                    <div class="mb-4">
                                        <img src="{{ asset('storage/' . $homepageSection->content['image']) }}" class="h-40 w-auto object-cover rounded-lg shadow-sm">
                                    </div>
                                @endif
                                <input type="file" name="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 transition-colors">
                            </div>
                        </div>

                    @elseif($homepageSection->section_key === 'about')
                        <div class="space-y-8">
                            <!-- Header Section -->
                            <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Header Section</h3>
                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Header Title</label>
                                        <input type="text" name="title" value="{{ $homepageSection->content['title'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="e.g., We Build Trust Not Just Structures">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Paragraph Below Header</label>
                                        <textarea name="header_paragraph" rows="3" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="e.g., Since 1990, Panchakanya Hardware has been...">{{ $homepageSection->content['header_paragraph'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Story Section -->
                            <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Story Section</h3>
                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Story Title</label>
                                        <input type="text" name="story_title" value="{{ $homepageSection->content['story_title'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="e.g., From Humble Beginnings to Market Leaders">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Story Paragraph</label>
                                        <textarea name="description" rows="6" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="e.g., Panchakanya Hardware started with a simple mission...">{{ $homepageSection->content['description'] ?? '' }}</textarea>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Years of Experience</label>
                                            <input type="number" name="years_of_experience" value="{{ $homepageSection->content['years_of_experience'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="e.g., 30">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Active Customers Count</label>
                                            <input type="number" name="active_customers_count" value="{{ $homepageSection->content['active_customers_count'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="e.g., 5000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Collage Images -->
                            <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Story Images</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    @foreach(['image_1', 'image_2', 'image_3', 'image_4'] as $imgKey)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ ucfirst(str_replace('_', ' ', $imgKey)) }}</label>
                                        @if(isset($homepageSection->content[$imgKey]))
                                            <div class="mb-4">
                                                <img src="{{ asset('storage/' . $homepageSection->content[$imgKey]) }}" class="w-full h-40 object-cover rounded-lg shadow-sm">
                                            </div>
                                        @endif
                                        <input type="file" name="{{ $imgKey }}" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 transition-colors">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    @elseif($homepageSection->section_key === 'contact_info')
                        <div class="space-y-8">
                             <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Hero Section</h3>
                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Hero Title</label>
                                        <input type="text" name="hero_title" value="{{ $homepageSection->content['hero_title'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="e.g., Get in Touch">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Hero Description</label>
                                        <textarea name="hero_description" rows="3" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">{{ $homepageSection->content['hero_description'] ?? '' }}</textarea>
                                    </div>
                                </div>
                             </div>

                             <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Contact Details</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                        <input type="text" name="phone" value="{{ $homepageSection->content['phone'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                        <input type="text" name="email" value="{{ $homepageSection->content['email'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                        <input type="text" name="address" value="{{ $homepageSection->content['address'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                    </div>
                                </div>
                             </div>
                        </div>

                    @elseif($homepageSection->section_key === 'why_choose_us')
                         <div class="space-y-6">
                             <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Section Title</label>
                                <input type="text" name="title" value="{{ $homepageSection->content['title'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                             </div>

                             <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                 @for($i = 1; $i <= 4; $i++)
                                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                                        <h4 class="font-bold text-gray-900 mb-4">Card {{ $i }}</h4>
                                        <div class="space-y-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                                                <input type="text" name="card_{{ $i }}_title" value="{{ $homepageSection->content['card_'.$i.'_title'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                                <textarea name="card_{{ $i }}_description" rows="2" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">{{ $homepageSection->content['card_'.$i.'_description'] ?? '' }}</textarea>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Icon Class (e.g., fas fa-check)</label>
                                                <input type="text" name="card_{{ $i }}_icon" value="{{ $homepageSection->content['card_'.$i.'_icon'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                            </div>
                                        </div>
                                    </div>
                                 @endfor
                             </div>
                        </div>
                        
                    @elseif($homepageSection->section_key === 'cta')
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                                <input type="text" name="title" value="{{ $homepageSection->content['title'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Subtitle</label>
                                <input type="text" name="subtitle" value="{{ $homepageSection->content['subtitle'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea name="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">{{ $homepageSection->content['description'] ?? '' }}</textarea>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Button Text</label>
                                    <input type="text" name="button_text" value="{{ $homepageSection->content['button_text'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Button Link</label>
                                    <input type="text" name="button_link" value="{{ $homepageSection->content['button_link'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                </div>
                            </div>
                        </div>

                    @elseif($homepageSection->section_key === 'footer')
                         <div class="grid grid-cols-1 gap-6">
                             <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">About Text</label>
                                <textarea name="about_text" rows="4" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">{{ $homepageSection->content['about_text'] ?? '' }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Copyright Text</label>
                                <input type="text" name="copyright" value="{{ $homepageSection->content['copyright'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                            </div>
                        </div>
                    @endif

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ request()->routeIs('admin.about.edit') ? route('admin.dashboard') : route('admin.homepage-sections.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">
                            Cancel
                        </a>
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg shadow-sm transition-colors duration-200">
                            Update Section
                        </button>
                    </div>
                </form>
            </div>
    </div>
</x-admin-layout>
