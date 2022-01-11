<?php

namespace App\Repositories;

use App\Models\Book;
use App\Services\ImageService;
use App\Repositories\Interfaces\IBookRepository;

class BookRepository implements IBookRepository
{
    function __construct(private Book $model, private ImageService $imageService,)
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
    public function createBook(mixed $data, $userId): \App\Models\Book
    {
        $book = $this->model;

        return $book::create([
            'author_id' => $userId,
            'title' => $data['title'],
            'photo' => $data['photo'],
            'page' => $data['page'],
            'content' => $data['content'],
        ]);
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
    public function updateBook(array $data, mixed $book): void
    {
        $book->update([
            'author_id' => $book->author_id,
            'title' => $data['title'],
            'photo' => $data['photo'],
            'page' => $data['page'],
            'content' => $data['content'],
        ]);
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
