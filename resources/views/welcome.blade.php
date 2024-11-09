@extends('layouts.master')
@section('title', 'Laravel Test Book')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Welcome to Laravel Test Book</h1>
    <div class="flex justify-center gap-6">
      
        <a href="{{ route('book.index') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-md text-white text-lg shadow-md">
            Manage Books
        </a>

      
        <a href="{{ route('author.index') }}" class="px-6 py-3 bg-green-600 hover:bg-green-700 rounded-md text-white text-lg shadow-md">
            Manage Authors
        </a>
    </div>
</div>
@endsection
