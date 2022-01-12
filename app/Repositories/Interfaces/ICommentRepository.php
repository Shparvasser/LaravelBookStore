<?php

namespace App\Repositories\Interfaces;

interface ICommentRepository
{
    public function createComment(array $data, int $bookId, int $userId);
}
