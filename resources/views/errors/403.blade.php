@extends('layouts.app')

@section('title', 'Access Denied')

@section('content')
<div class="error-page text-center py-20">
    <h1 class="text-9xl font-bold text-yellow-500">403</h1>
    <h2 class="text-4xl font-semibold mt-4">Access Denied</h2>
    <p class="mt-2 text-gray-600">You do not have permission to access this page.</p>
    <a href="{{ url('/') }}" class="mt-6 inline-block px-6 py-3 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">Go Home</a>
</div>
@endsection
