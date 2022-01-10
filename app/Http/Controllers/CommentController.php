<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Repositories\Interfaces\IBookRepository;
use App\Repositories\Interfaces\ICommentRepository;

class CommentController extends Controller
{
    function __construct(private ICommentRepository $commentRepository, private IBookRepository $bookRepository)
    {
    }

    /**
     * commentOn
     *
     * @param  mixed $req
     * @param  mixed $slug
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function commentOn(CommentRequest $req, mixed $slug): mixed
    {
        $book = $this->bookRepository->getBookBySlug($slug);
        $this->commentRepository->createComment($req, $book->id);

        return redirect()->route('home')->with('success', 'Your comment added');
    }
}
