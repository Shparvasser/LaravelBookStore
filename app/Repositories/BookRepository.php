<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\User;
use App\Repositories\Interfaces\IBookRepository;

class BookRepository implements IBookRepository
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

    /**
     * checkCategory
     *
     * @param  mixed $book
     * @param  mixed $input
     * @return void
     */
    public function checkCategory(mixed $book, mixed $input): void
    {
        $book->categories()->attach($input);
    }

    /**
     * updateCategory
     *
     * @param  mixed $book
     * @param  mixed $input
     * @return void
     */
    public function updateCategory(mixed $book, mixed $input): void
    {
        $book->categories()->sync($input);
    }

    /**
     * getBookBySlug
     *
     * @param  mixed $slug
     * @return \App\Models\Book
     */
    public function getBookBySlug(mixed $slug): \App\Models\Book
    {
        return $this->model::where('slug', $slug)->first();
    }

    /**
     * createBook
     *
     * @param  mixed $req
     * @param  mixed $file
     * @return \App\Models\Book
     */
    public function createBook(mixed $req, mixed $file): \App\Models\Book
    {
        $book = $this->model;
        $book->author_id = $req->user()->id;
        $book->title = $req->input('title');
        $book->photo = $file;
        $book->page = $req->input('page');
        $book->content = $req->input('content');
        $book->save();
        return $book;
    }

    /**
     * deleteBook
     *
     * @param  mixed $slug
     * @return void
     */
    public function deleteBook(mixed $slug): void
    {
        $this->model::where('slug', $slug)->delete();
    }

    /**
     * updateBook
     *
     * @param  mixed $req
     * @param  mixed $file
     * @param  mixed $book
     * @return void
     */
    public function updateBook(mixed $req, mixed $file, mixed $book): void
    {
        $book->author_id = $book->author_id;
        $book->title = $req->input('title');
        $book->photo = $file;
        $book->page = $req->input('page');
        $book->content = $req->input('content');
        $book->save();
    }

    /**
     * withUser
     *
     * @return mixed
     */
    public function withUser(): mixed
    {
        return $this->model::with('user')->get();
    }
}
