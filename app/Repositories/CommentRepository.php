<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    function __construct(private Comment $model)
    {
    }


    /**
     * createComment
     *
     * @param  array $data
     * @param  int $bookId
     * @param  int $userId
     * @return \App\Models\Comment
     */
    public function createComment(array $data, int $bookId, int $userId): \App\Models\Comment
    {
        $comment = $this->model;

        return $comment::create([
            'author_id' => $userId,
            'book_id' => $bookId,
            'comment' => $data['comment'],
        ]);
    }
}
