@extends('layouts.master')
@section('title', 'Laravel Test Book')

@section('content')
    <div class="section-body container mx-auto mt-5">

        @if (session('success'))
            <div class="bg-green-500 text-white px-4 py-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-500 text-white px-4 py-3 rounded-md mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex justify-between items-center bg-blue-600 p-5 rounded-md text-white shadow-lg mb-5">
            <div>
                <h1 class="text-xl font-semibold">Books ({{ $books->count() }})</h1>
            </div>
            <div>
                <a href="{{ route('book.create') }}"
                    class="px-5 py-2 bg-green-500 rounded-md text-white text-lg shadow-md hover:bg-green-600 transition">Add
                    New</a>
            </div>
        </div>


        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-lg rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-blue-500 text-white">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">#</th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Title</th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Serial
                                        Number</th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Author
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Published
                                        Date</th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Edit</th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-50 divide-y divide-gray-200">
                                @forelse ($books as $book)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $loop->iteration + ($books->currentPage() - 1) * $books->perPage() }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $book->title }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $book->serial_number }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $book->author->name ?? 'Unknown Author' }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $book->published_at ? $book->published_at->format('d-m-Y') : 'Not Published' }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('book.edit', ['book' => $book->id]) }}"
                                                class="px-5 py-2 bg-yellow-500 rounded-md text-white text-lg shadow-md hover:bg-yellow-600 transition">Edit</a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <button onclick="deleteBook({{ $book->id }})"
                                                class="px-5 py-2 bg-red-500 rounded-md text-white text-lg shadow-md hover:bg-red-600 transition">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-gray-500">No books found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-4">
            {{ $books->links() }}
        </div>
    </div>

@endsection
