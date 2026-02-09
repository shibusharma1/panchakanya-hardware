<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Setting') }}: {{ ucfirst(str_replace('_', ' ', $siteSetting->key)) }}
        </h2>
    </x-slot>

    <div class="p-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <form action="{{ route('admin.site-settings.update', $siteSetting->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    @if(Str::contains($siteSetting->key, ['image', 'logo', 'icon']))
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Upload Image</label>
                            <div class="flex items-center gap-6">
                                @if($siteSetting->value)
                                    <img src="{{ asset('storage/' . $siteSetting->value) }}" alt="Current Image" class="h-20 w-auto object-contain rounded border border-gray-200 p-1">
                                @endif
                                <input type="file" name="image" id="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 transition-colors">
                            </div>
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    @else
                        <div>
                            <label for="value" class="block text-sm font-medium text-gray-700 mb-1">Value</label>
                            <textarea name="value" id="value" rows="4" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">{{ old('value', $siteSetting->value) }}</textarea>
                            @error('value')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif

                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('admin.site-settings.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">
                            Cancel
                        </a>
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg shadow-sm transition-colors duration-200">
                            Update Setting
                        </button>
                    </div>
                </form>
            </div>
    </div>
</x-admin-layout>
