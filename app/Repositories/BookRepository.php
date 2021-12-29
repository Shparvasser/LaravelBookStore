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
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model::all();
    }

    public function checkCategory($book, $input)
    {
        $book->categories()->attach($input);
    }

    public function getByUser(User $user)
    {
        return $this->model::where('user_id' . $user->id)->get();
    }
}
