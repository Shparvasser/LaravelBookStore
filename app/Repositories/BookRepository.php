<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\User;
use App\Repositories\Interfaces\BookRepositoryInterface;

class BookRepository implements BookRepositoryInterface
{
    function __construct(private Book $model)
    {
    }

    /**
     * all
     *
     * @return \App\Models\Book
     */
    public function all(): mixed
    {
        return $this->model::all();
    }

    public function getByUser(User $user)
    {
        return $this->model::where('user_id' . $user->id)->get();
    }
}
