<?php

namespace App\Repositories\Interfaces;

interface IRatingRepository
{
    public function averageRating(int $bookId);
    public function createRating(object $req);
    public function getQueryRating();
}
