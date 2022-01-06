<?php

namespace App\Repositories\Interfaces;

interface ICommentRepository
{
    public function createComment(object $req, int $bookId);
}
