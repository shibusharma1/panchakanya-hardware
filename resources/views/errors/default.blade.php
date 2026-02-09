@extends('layouts.app')

@section('title', 'Oops!')

@section('content')
<div class="error-page text-center py-20">
    <h1 class="text-9xl font-bold text-red-600">Error</h1>
    <h2 class="text-4xl font-semibold mt-4">Something Went Wrong</h2>
    <p class="mt-2 text-gray-600">An unexpected error occurred. Please try again later.</p>
    <a href="{{ url('/') }}" class="mt-6 inline-block px-6 py-3 bg-red-600 text-white rounded hover:bg-red-700 transition">Go Home</a>
</div>
@endsection
