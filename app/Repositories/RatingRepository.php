<?php

namespace App\Repositories;

use App\Models\Rating;

class RatingRepository
{
    function __construct(private Rating $model)
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
     * @return \Illuminate\Support\Collection
     */
    public function getModelsBooksRatings(): \Illuminate\Support\Collection
    {
        return $this->model::query()
            ->join('books', 'books.id', '=', 'ratings.book_id')
            ->selectRaw('books.*, AVG(rating) as rating')
            ->groupBy('book_id')
            ->with('user')
            ->get();
    }

    /**
     * getQuery
     *
     * @return \Illuminate\Support\Collection
     */
    public function getModelsCategoriesBooksRatings($id): \Illuminate\Support\Collection
    {
        return $this->model::query()
            ->join('books', 'books.id', '=', 'ratings.book_id')
            ->join('book_category', 'book_category.book_id', '=', 'books.id')
            ->join('categories', 'categories.id', '=', 'book_category.category_id')
            ->selectRaw('book_category.book_id, books.*, AVG(rating) as rating')
            ->where('categories.id', $id)
            ->groupBy('book_id')
            ->with('user')
            ->get();
    }
}
