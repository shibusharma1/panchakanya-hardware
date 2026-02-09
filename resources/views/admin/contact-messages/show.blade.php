<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('View Message') }}
            </h2>
            <a href="{{ route('admin.contact-messages.index') }}" class="text-gray-600 hover:text-gray-900 font-medium text-sm flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="p-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-8">
                    <!-- Sender Info Header -->
                    <div class="flex items-start justify-between border-b border-gray-100 pb-6 mb-6">
                        <div class="flex items-center">
                            <div class="h-12 w-12 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-xl mr-4">
                                {{ strtoupper(substr($contactMessage->name, 0, 1)) }}
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">{{ $contactMessage->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $contactMessage->email }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-sm text-gray-500 block">Received on</span>
                            <span class="text-sm font-medium text-gray-900">{{ $contactMessage->created_at->format('F d, Y, h:i A') }}</span>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="mb-8">
                        <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Subject</h4>
                        <p class="text-lg font-semibold text-gray-900 mb-6">{{ $contactMessage->subject }}</p>
                        
                        <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Message</h4>
                        <div class="bg-gray-50 rounded-lg p-6 border border-gray-100 text-gray-700 leading-relaxed whitespace-pre-line">
                            {{ $contactMessage->message }}
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-100">
                        <form method="POST" action="{{ route('admin.contact-messages.destroy', $contactMessage->id) }}" onsubmit="return confirm('Are you sure you want to delete this message?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-white text-red-600 hover:bg-red-50 border border-red-200 font-semibold py-2 px-4 rounded-lg transition-colors duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Delete Message
                            </button>
                        </form>
                        <a href="mailto:{{ $contactMessage->email }}?subject=Re: {{ $contactMessage->subject }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg shadow-sm transition-colors duration-200 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Reply via Email
                        </a>
                    </div>
                </div>
            </div>
    </div>
</x-admin-layout>
