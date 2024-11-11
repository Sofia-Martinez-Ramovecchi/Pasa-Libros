<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('book')->latest()->paginate(20);
        return response()->json($books);
    }

    public function patch(BookUpdateRequest $request): RedirectResponse
    {
        $validatedDataBook = $request->validated();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photo', 'public');
            $validatedDataBook['photo'] = $path;
        }
        if ($request->hasFile('photoC')) {
            $path = $request->file('photoC')->store('photoC', 'public');
            $validatedDataBook['photoC'] = $path;
        }

        if (!empty($validatedDataBook['tituloLibro'])) {
            $request->book()->tituloLibro = $validatedDataBook['tituloLibro'];
        }

        if (!empty($validatedDataBook['autor'])) {
            $request->book()->name = $validatedDataBook['autor'];
        }

        if (!empty($validatedDataBook['editorialLibro'])) {
            $request->book()->name = $validatedDataBook['editorialLibro'];
        }

        if (!empty($validatedDataBook['editorialLibro'])) {
            $request->book()->name = $validatedDataBook['editorialLibro'];
        }

        if (!empty($validatedDataBook['versionLibro'])) {
            $request->book()->name = $validatedDataBook['versionLibro'];
        }

        if (!empty($validatedDataBook['codigoInternacional'])) {
            $request->book()->name = $validatedDataBook['codigoInternacional'];
        }

        if (!empty($validatedDataBook['descripcionLibro'])) {
            $request->book()->name = $validatedDataBook['descripcionLibro'];
        }



        // Actualizar otros datos del libro
        $request->book()->fill($validatedDataBook);

        // Guardar los cambios en la base de datos
        $request->book()->save();

        // Redirigir con un mensaje de éxito
        return Redirect::route('perfil.mostrar')->with('status', 'success');
    }

    public function show(Book $book)
    {
        return response()->json($book->load('book'));
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

        return Redirect::route('perfil.mostrar')->with('status', 'success');
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
            $query->whereHas('book', function ($q) use ($request) {
                $q->where('location', 'like', '%' . $request->input('location') . '%');
            });
        }

        $books = $query->with('book')->paginate(20);

        return response()->json($books);
    }
}
