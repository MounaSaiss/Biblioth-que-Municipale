<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class BookController extends Controller
{
    public function index() {
        return view('book.index', ['books' => Book::all()]);
    }

    public function create() {
        return view('book.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Book::create($validated);

        return redirect()->route('books.index');
    }

    public function show(Book $book) {
        return view('book.show', ['book' => $book]);
    }
    public function edit(Book $book) {
        return view('book.edit', ['book' => $book]);
    }
    public function update(Request $request, Book $book) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $book->update($validated);

        return redirect()->route('books.index');
    }
    public function destroy($id) {
        $book = Book::findorFail($id);
        if(!$book) {
            return response()->json([
                'message' => 'Book not found'
                ], 404);
        }
        else {
            $book->delete();
            return view('book.index', ['books' => Book::all()]);
    }
    }
}