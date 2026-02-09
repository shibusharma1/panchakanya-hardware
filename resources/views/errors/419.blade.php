@extends('layouts.app')

@section('title', 'Session Expired')

@section('content')
<div class="error-page text-center py-20">
    <h1 class="text-9xl font-bold text-blue-500">419</h1>
    <h2 class="text-4xl font-semibold mt-4">Session Expired</h2>
    <p class="mt-2 text-gray-600">Please refresh the page and try again.</p>
    <a href="{{ url()->current() }}" class="mt-6 inline-block px-6 py-3 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Refresh</a>
</div>
@endsection
