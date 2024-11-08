@extends('layouts.master')
@section('title', 'Laravel Tambah Book')

@section('content')
    <div class="my-8">
        <div class="container mx-auto max-w-xl shadow-lg bg-white py-8 px-10 rounded-xl">
            @if (session()->has('error'))
                <div class="bg-red-500 text-white px-4 py-3 rounded-md mb-4">
                    {{ session('error') }}
                </div>
            @endif
            <a href="{{ route('book.index') }}" class="px-6 py-3 bg-red-600 hover:bg-red-700 rounded-md text-white text-lg shadow-md mb-6 inline-block">Go Back</a>
            <div class="my-3">
                <h1 class="text-center text-4xl font-semibold text-gray-800 mb-6">Create Book</h1>
                <form action="{{ route('book.store') }}" method="POST">
                    @csrf
             
                    <div class="my-4">
                        <label for="title" class="text-lg font-semibold text-gray-700">Book Title</label>
                        <input type="text" name="title" class="block w-full border-2 border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-600 px-4 py-3 text-lg rounded-md my-2" placeholder="Enter book title">
                        @error('title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="my-4">
                        <label for="serial_number" class="text-lg font-semibold text-gray-700">Serial Number</label>
                        <input type="text" name="serial_number" class="block w-full border-2 border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-600 px-4 py-3 text-lg rounded-md my-2" placeholder="Enter serial number">
                        @error('serial_number')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

               
                    <div class="my-4">
                        <label for="author_id" class="text-lg font-semibold text-gray-700">Author</label>
                        <select name="author_id" class="block w-full border-2 border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-600 px-4 py-3 text-lg rounded-md my-2">
                            <option value="">Select Author</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                        @error('author_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                   
                    <div class="my-4">
                        <label for="published_at" class="text-lg font-semibold text-gray-700">Published Date</label>
                        <input type="date" name="published_at" class="block w-full border-2 border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-600 px-4 py-3 text-lg rounded-md my-2">
                        @error('published_at')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                   
                    <button class="px-6 py-3 bg-emerald-600 hover:bg-emerald-700 rounded-md text-white text-lg shadow-md w-full mt-6">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
