<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;


class CommentController extends Controller
{
    public function commentOn(CommentRequest $req, $id)
    {
        $comment = new Comment();
        $comment->author_id = $req->user()->id;
        $comment->book_id = $id;
        $comment->comment = $req->input('comment');
        $comment->save();
        return redirect()->route('home')->with('success', 'Your comment added');
    }
}
