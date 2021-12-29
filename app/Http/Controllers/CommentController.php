<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    /**
     * commentOn
     *
     * @param  mixed $req
     * @param  mixed $slug
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function commentOn(CommentRequest $req, mixed $slug): mixed
    {
        $book = new Book();
        $bookId = $book->where('slug', $slug)->first();
        $bookId->id;
        $comment = new Comment();
        $comment->author_id = $req->user()->id;
        $comment->book_id = $bookId->id;
        $comment->comment = $req->input('comment');
        $comment->save();

        return redirect()->route('home')->with('success', 'Your comment added');
    }
}
