@extends('layouts.master')
@section('title', 'Laravel Test Book')

@section('content')

<div class="my-8">
    <div class="container mx-auto max-w-xl shadow-lg bg-white py-8 px-10 rounded-xl">
        @if (session()->has('error'))
            <div class="bg-red-500 text-white px-4 py-3 rounded-md mb-4">
                {{ session('error') }}
            </div>
        @endif
        <a href="{{ route('author.index') }}" class="px-6 py-3 bg-red-600 hover:bg-red-700 rounded-md text-white text-lg shadow-md mb-6 inline-block">Go Back</a>
        <div class="my-3">
            <h1 class="text-center text-4xl font-semibold text-gray-800 mb-6">Edit Author</h1>
            <form action="{{ route('author.update', $author->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="my-4">
                    <label for="name" class="text-lg font-semibold text-gray-700">Author Name</label>
                    <input type="text" name="name" value="{{ old('name', $author->name) }}" class="block w-full border-2 border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-600 px-4 py-3 text-lg rounded-md my-2" placeholder="Enter author name">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="my-4">
                    <label for="email" class="text-lg font-semibold text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email', $author->email) }}" class="block w-full border-2 border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-600 px-4 py-3 text-lg rounded-md my-2" placeholder="Enter email">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button class="px-6 py-3 bg-emerald-600 hover:bg-emerald-700 rounded-md text-white text-lg shadow-md w-full mt-6">Update</button>
            </form>
        </div>
    </div>
</div>


@endsection
