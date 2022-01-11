<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Repositories\Interfaces\ICommentRepository;

class CommentRepository implements ICommentRepository
{
    function __construct(private Comment $model)
    {
    }


    /**
     * createComment
     *
     * @param  mixed $req
     * @param  mixed $bookId
     * @return \App\Models\Comment
     */
    public function createComment(mixed $data, mixed $bookId, $userId): \App\Models\Comment
    {
        $comment = $this->model;
        // $comment->author_id = $req->user()->id;
        // $comment->book_id = $bookId;
        // $comment->comment = $req->input('comment');
        // $comment->save();
        // return $comment;
        return $comment::create([
            'author_id' => $userId,
            'book_id' => $bookId,
            'comment' => $data['comment'],
        ]);
    }
}
