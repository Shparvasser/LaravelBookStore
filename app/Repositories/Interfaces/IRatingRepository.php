<?php

namespace App\Repositories\Interfaces;

interface IRatingRepository
{
    public function averageRating($bookId);
    public function createRating($req);
}
