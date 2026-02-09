<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Site Setting') }}
        </h2>
    </x-slot>

    <div class="p-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <form action="{{ route('admin.site-settings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    @if(auth()->user()->role === 'super_admin')
                        <div>
                            <label for="key" class="block text-sm font-medium text-gray-700 mb-1">Setting Key</label>
                            <input type="text" name="key" id="key" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" value="{{ old('key') }}" required placeholder="e.g., site_logo">
                            @error('key')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif

                    <div>
                        <label for="value" class="block text-sm font-medium text-gray-700 mb-1">Value (Text)</label>
                        <textarea name="value" id="value" rows="3" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="Enter setting value...">{{ old('value') }}</textarea>
                        <p class="text-gray-500 text-xs mt-1">Leave empty if uploading an image.</p>
                        @error('value')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Or Upload Image (For Logo/Icons)</label>
                        <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 transition-colors">
                        @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('admin.site-settings.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">
                            Cancel
                        </a>
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg shadow-sm transition-colors duration-200">
                            Save Setting
                        </button>
                    </div>
                </form>
            </div>
    </div>
</x-admin-layout>
