<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {

        $books = Book::with('author')->paginate(10); 
        return view('book.index', compact('books'));
    }

    public function create()
    {

        $authors = Author::all();
        return view('book.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'serial_number' => 'required|string|unique:books,serial_number',
            'author_id' => 'required|exists:authors,id',
            'published_at' => 'nullable|date',
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->serial_number = $request->serial_number;
        $book->author_id = $request->author_id;
        $book->published_at = $request->published_at ? Carbon::parse($request->published_at) : null;
        $book->save();


        if ($book) {
            session()->flash('success', 'Book Add Successfully');
            return redirect(route('book.index'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('book.create'));
        }
    }
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all();
        return view('book.edit', compact('book', 'authors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'serial_number' => 'required|string|unique:books,serial_number,' . $id, 
            'author_id' => 'required|exists:authors,id',
            'published_at' => 'nullable|date',
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->serial_number = $request->serial_number;
        $book->author_id = $request->author_id;
        $book->published_at = $request->published_at ? Carbon::parse($request->published_at) : null;
        $book->save();

        return redirect()->route('book.index')->with('success', 'Book updated successfully.');
    }
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
    
        $book->delete();
    
        return redirect()->route('book.index')->with('success', 'Book deleted successfully.');
    }
}
