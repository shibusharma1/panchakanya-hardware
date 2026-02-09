@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
<div class="error-page text-center py-20">
    <h1 class="text-9xl font-bold text-red-600">404</h1>
    <h2 class="text-4xl font-semibold mt-4">Oops! Page Not Found</h2>
    <p class="mt-2 text-gray-600">The page you are looking for might have been removed or is temporarily unavailable.</p>
    <a href="{{ url('/') }}" class="mt-6 inline-block px-6 py-3 bg-red-600 text-white rounded hover:bg-red-700 transition">Go Home</a>
</div>
@endsection
