@extends('layouts.master')
@section('title', 'Laravel Test Book')

@section('content')
    <div class="section-body container mx-auto mt-5">
        <!-- Header Section -->
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

        <!-- Table Section -->
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-lg rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-blue-500 text-white">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">#</th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Title</th>
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
                                            {{ $book->id }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $book->title }}</td>
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
                                            <form action="{{ route('book.destroy', ['book' => $book->id]) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-5 py-2 bg-red-500 rounded-md text-white text-lg shadow-md hover:bg-red-600 transition">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-gray-500">No books found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex justify-center mt-6">
            <nav aria-label="Page navigation">
                <ul class="inline-flex items-center -space-x-px">
                    {{-- Previous Page Link --}}
                    @if ($books->onFirstPage())
                        <li>
                            <span class="px-3 py-2 text-gray-500 bg-gray-200 border border-gray-300 cursor-not-allowed">&laquo;</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $books->previousPageUrl() }}" class="px-3 py-2 text-blue-600 border border-gray-300 bg-white hover:bg-gray-100">«</a>
                        </li>
                    @endif
        
                    {{-- Page Number Links --}}
                    @foreach ($books->links() as $element)
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $books->currentPage())
                                    <li>
                                        <span class="px-3 py-2 text-white bg-blue-600 border border-blue-600">{{ $page }}</span>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $url }}" class="px-3 py-2 text-blue-600 border border-gray-300 bg-white hover:bg-gray-100">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
        
                    {{-- Next Page Link --}}
                    @if ($books->hasMorePages())
                        <li>
                            <a href="{{ $books->nextPageUrl() }}" class="px-3 py-2 text-blue-600 border border-gray-300 bg-white hover:bg-gray-100">»</a>
                        </li>
                    @else
                        <li>
                            <span class="px-3 py-2 text-gray-500 bg-gray-200 border border-gray-300 cursor-not-allowed">»</span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
        
        
    </div>



@endsection
