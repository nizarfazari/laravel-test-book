@extends('layouts.master')
@section('title', 'Edit Book')

@section('content')
    <div class="section-body container mx-auto mt-5">
   
        <div class="flex justify-between items-center bg-blue-600 p-5 rounded-md text-white shadow-lg mb-5">
            <div>
                <h1 class="text-xl font-semibold">Edit Book</h1>
            </div>
            <div>
                <a href="{{ route('book.index') }}" class="px-5 py-2 bg-red-500 rounded-md text-white text-lg shadow-md hover:bg-red-600 transition">Go Back</a>
            </div>
        </div>

        
        <div class="my-3">
            <form action="{{ route('book.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')

              
                <div class="my-2">
                    <label for="title" class="text-md font-bold text-gray-700">Book Title</label>
                    <input type="text" name="title" value="{{ old('title', $book->title) }}" class="block w-full border border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-600 px-2 py-2 text-md rounded-md my-2">
                    @error('title')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

               
                <div class="my-2">
                    <label for="serial_number" class="text-md font-bold text-gray-700">Serial Number</label>
                    <input type="text" name="serial_number" value="{{ old('serial_number', $book->serial_number) }}" class="block w-full border border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-600 px-2 py-2 text-md rounded-md my-2">
                    @error('serial_number')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

               
                <div class="my-2">
                    <label for="author_id" class="text-md font-bold text-gray-700">Author</label>
                    <select name="author_id" class="block w-full border border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-600 px-2 py-2 text-md rounded-md my-2">
                        <option value="">Select Author</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ $author->id == old('author_id', $book->author_id) ? 'selected' : '' }}>{{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                
                <div class="my-2">
                    <label for="published_at" class="text-md font-bold text-gray-700">Published Date</label>
                    <input type="date" name="published_at" value="{{ old('published_at', $book->published_at ? $book->published_at->format('Y-m-d') : '') }}" class="block w-full border border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-600 px-2 py-2 text-md rounded-md my-2">
                    @error('published_at')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 rounded-md text-white text-lg shadow-md">Update Book</button>
            </form>
        </div>
    </div>
@endsection
