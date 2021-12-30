<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Repositories\Interfaces\IBookRepository;
use App\Repositories\Interfaces\ICommentRepository;

class CommentController extends Controller
{
    private $commentRepository;
    private $bookRepository;

    function __construct(ICommentRepository $commentRepository, IBookRepository $bookRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->bookRepository = $bookRepository;
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
