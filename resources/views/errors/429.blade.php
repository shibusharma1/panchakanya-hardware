@extends('layouts.app')

@section('title', 'Too Many Requests')

@section('content')
<div class="error-page text-center py-20">
    <h1 class="text-9xl font-bold text-purple-600">429</h1>
    <h2 class="text-4xl font-semibold mt-4">Too Many Requests</h2>
    <p class="mt-2 text-gray-600">You have sent too many requests. Please try again later.</p>
    <a href="{{ url('/') }}" class="mt-6 inline-block px-6 py-3 bg-purple-600 text-white rounded hover:bg-purple-700 transition">Go Home</a>
</div>
@endsection
