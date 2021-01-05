<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class BookCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Book $book)
    {
        return view('books.Comments.index')->withBook($book);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book)
    {
        return view('books.Comments.create')->withBook($book);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Book $book)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required'
        ]);

        $comment = new Comment();
        $comment->title = $request->title;
        $comment->text = $request->text;
        $comment->book_id = $book->id;
        $comment->save();

        return redirect()->route('comments.show', $comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book, Comment $comment)
    {

        return view('books.Comments.edit')->withComment($comment)->withBook($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Book $book,Comment $comment)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required'
        ]);


        $comment->title = $request->title;
        $comment->text = $request->text;
        $comment->save();

        return redirect()->route('comments.show', $comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book, Comment $comment)
    {
        $comment->delete();

        return redirect()->route('books.comments.index',$book);

    }
}
