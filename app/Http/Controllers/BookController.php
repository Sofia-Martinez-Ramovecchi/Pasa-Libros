<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('user')->latest()->paginate(20);
        return response()->json($books);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'genre' => 'required|max:100',
            'condition' => 'required|in:new,used',
            'description' => 'required',
            'photos' => 'required|array|min:1',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $book = new Book($validated);
        $book->user_id = Auth::id();
        $book->save();

        // Manejar la subida de fotos aquí

        return response()->json($book, 201);
    }

    public function show(Book $book)
    {
        return response()->json($book->load('user'));
    }

    public function update(Request $request, Book $book)
    {
        $this->authorize('update', $book);

        $validated = $request->validate([
            'title' => 'sometimes|required|max:255',
            'author' => 'sometimes|required|max:255',
            'genre' => 'sometimes|required|max:100',
            'condition' => 'sometimes|required|in:new,used',
            'description' => 'sometimes|required',
            'photos' => 'sometimes|array|min:1',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $book->update($validated);

        // Manejar la actualización de fotos aquí

        return response()->json($book);
    }

    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);

        $book->delete();

        return response()->json(null, 204);
    }

    public function search(Request $request)
    {
        $query = Book::query();

        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        if ($request->has('author')) {
            $query->where('author', 'like', '%' . $request->input('author') . '%');
        }

        if ($request->has('genre')) {
            $query->where('genre', $request->input('genre'));
        }

        if ($request->has('location')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('location', 'like', '%' . $request->input('location') . '%');
            });
        }

        $books = $query->with('user')->paginate(20);

        return response()->json($books);
    }
}
