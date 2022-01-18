<?php

namespace App\Repositories;

use App\Models\Rating;

class RatingRepository
{
    public function __construct(private Rating $model)
    {
    }

    /**
     * averageRating
     *
     * @param  int $bookId
     * @return float
     */
    public function averageRating(int $bookId): float
    {
        $rating = $this->model::where('book_id', $bookId)->avg('rating');
        $round = round($rating, 2);
        return $round;
    }

    /**
     * createRating
     *
     * @param  array $data
     * @return void
     */
    public function createRating(array $data): void
    {
        $rating = $this->model;
        $rating::create([
            'book_id' => $data['book_id'],
            'author_id' => $data['author_id'],
            'rating' => $data['rating'],
        ]);
    }

    /**
     * getQuery
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getModelsBooksRatings():\Illuminate\Database\Eloquent\Builder
    {
        return $this->model::query()
            ->rightJoin('books', 'books.id', '=', 'ratings.book_id')
            ->selectRaw('books.*, AVG(rating) as rating')
            ->groupBy('id')
            ->with('user')
            ->orderBy('slug');
    }

    /**
     * getModelsCategoriesBooksRatings
     *
     * @param  mixed $id
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function getModelsCategoriesBooksRatings(int $id):\Illuminate\Database\Eloquent\Builder
    {
        return $this->model::query()
            ->rightjoin('books', 'books.id', '=', 'ratings.book_id')
            ->join('book_category', 'book_category.book_id', '=', 'books.id')
            ->join('categories', 'categories.id', '=', 'book_category.category_id')
            ->selectRaw('book_category.book_id, books.*, AVG(rating) as rating')
            ->where('categories.id', $id)
            ->groupBy('book_id')
            ->with('user');
    }

    /**
     * getTotalBooksCategory
     *
     * @param  mixed $id
     * @return int
     */
    public function getTotalBooksCategory(int $id):int
    {
        $count = $this->model::query()
        ->rightjoin('books', 'books.id', '=', 'ratings.book_id')
        ->join('book_category', 'book_category.book_id', '=', 'books.id')
        ->join('categories', 'categories.id', '=', 'book_category.category_id')
        ->selectRaw('book_category.book_id, books.*, AVG(rating) as rating')
        ->where('categories.id', $id)
        ->groupBy('categories.id')
        ->with('user')
        ->count();

        return $count;
    }
}
