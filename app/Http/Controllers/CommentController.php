<?php

namespace App\Http\Controllers;

use App\Repositories\BookRepository;
use App\Http\Requests\CommentRequest;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{
    function __construct(private CommentRepository $commentRepository, private BookRepository $bookRepository)
    {
    }

    /**
     * commentOn
     *
     * @param  CommentRequest $request
     * @param  string $slug
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function commentOn(CommentRequest $request, string $slug): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $data = $request->all();
        $book = $this->bookRepository->getBookBySlug($slug);
        $userId = $request->user()->id;
        $this->commentRepository->createComment($data, $book->id, $userId);

        return redirect()->route('home')->with('success', 'Your comment added');
    }
}
