<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {

        $authors = Author::paginate(10); 
        return view('author.index', compact('authors'));
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:authors,email',
        ]);
    

        Author::create($request->only('name', 'email'));

        return redirect()->route('author.index')->with('success', 'Author created successfully!');
    }
    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('author.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:authors,email,' . $id,
        ]);
    
        $author = Author::findOrFail($id);
        $author->update($request->only('name', 'email'));
    
        return redirect()->route('author.index')->with('success', 'Author updated successfully!');
    }
    
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
    
        if ($author->delete()) {
            return redirect()->route('author.index')->with('success', 'Author deleted successfully.');
        }
    
        return redirect()->route('author.index')->with('error', 'Failed to delete author.');
        
    
        
    }
}
