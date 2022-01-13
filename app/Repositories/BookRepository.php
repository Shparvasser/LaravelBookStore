<?php

namespace App\Repositories;

use App\Models\Book;
use App\Services\ImageService;

class BookRepository
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
     * @param  object $book
     * @param  array $request
     * @return void
     */
    public function checkCategory(object $book, array $request): void
    {
        $book->categories()->attach($request);
    }

    /**
     * updateCategory
     *
     * @param  object $book
     * @param  array $request
     * @return void
     */
    public function updateCategory(object $book, array $request): void
    {
        $book->categories()->sync($request);
    }

    /**
     * getBookBySlug
     *
     * @param  string $slug
     * @return \App\Models\Book
     */
    public function getBookBySlug(string $slug): \App\Models\Book
    {
        return $this->model::where('slug', $slug)->first();
    }

    /**
     * createBook
     *
     * @param  array $data
     * @param  int $userId
     * @return \App\Models\Book
     */
    public function createBook(array $data, int $userId): \App\Models\Book
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
     * @param  string $slug
     * @return void
     */
    public function deleteBook(string $slug): void
    {
        $this->model::where('slug', $slug)->delete();
    }

    /**
     * updateBook
     *
     * @param  array $data
     * @param  mixed $book
     * @return void
     */
    public function updateBook(array $data, object $book): void
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
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function withUser(): \Illuminate\Database\Eloquent\Collection|static
    {
        return $this->model::with('user')->get();
    }

    public function getTotalBooks()
    {
        $count = $this->model::query()
            ->selectRaw('COUNT(id) as Id')
            ->pluck('Id');
        return $count['0'];
    }
}
