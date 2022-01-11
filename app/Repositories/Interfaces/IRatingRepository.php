<?php

namespace App\Repositories\Interfaces;

interface IRatingRepository
{
    public function averageRating(int $bookId);
    public function createRating($data);
    public function getQueryRating();
}
