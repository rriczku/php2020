<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BooksController extends Controller
{
    public function index()
    {
        $books=Book::all();
        return view('books.index')->withBooks($books);
    }

    public function create()
    {
        return view('books.createNew');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'isbn' => 'required|digits:13|integer',
            'description' => 'required',
        ]);

        $book = new Book();
        $book->isbn=$request['isbn'];
        $book->description=$request['description'];
        $book->title=$request['title'];
        $book->save();
        return redirect('/books/'.$book->__get('id'));
    }
    public function show(Book $book)
    {
        return view('books.showbook')->withBook($book);
    }
}
