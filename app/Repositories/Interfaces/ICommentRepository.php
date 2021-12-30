<?php

namespace App\Repositories\Interfaces;

interface ICommentRepository
{
    public function createComment($req, $bookId);
}
