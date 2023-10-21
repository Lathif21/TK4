<?php

namespace App\Http\Controllers;

use App\Models\Books; // Use the correct namespace

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Books::all(); 
        return view('books', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication_year' => 'required|integer',
        ]);

        Books::create($validatedData); // Use the correct model name

        return redirect('/books')->with('success', 'Book added successfully');
    }

    public function edit($id)
    {
        $book = Books::findOrFail($id); // Use the correct model name
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication_year' => 'required|integer',
        ]);

        $book = Books::findOrFail($id); // Use the correct model name
        $book->update($validatedData);

        return redirect('/books')->with('success', 'Book updated successfully');
    }

    public function destroy($id)
    {
        $book = Books::findOrFail($id); // Use the correct model name
        $book->delete();

        return redirect('/books')->with('success', 'Book deleted successfully');
    }
}
