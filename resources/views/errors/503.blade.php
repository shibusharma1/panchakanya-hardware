@extends('layouts.app')

@section('title', 'Service Unavailable')

@section('content')
<div class="error-page text-center py-20">
    <h1 class="text-9xl font-bold text-gray-500">503</h1>
    <h2 class="text-4xl font-semibold mt-4">Service Unavailable</h2>
    <p class="mt-2 text-gray-600">Our servers are currently down for maintenance. Please try again later.</p>
    <a href="{{ url('/') }}" class="mt-6 inline-block px-6 py-3 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Go Home</a>
</div>
@endsection
