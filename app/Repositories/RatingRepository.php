<?php

namespace App\Repositories;

use App\Models\Rating;
use App\Repositories\Interfaces\IRatingRepository;

class RatingRepository implements IRatingRepository
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
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getQuery(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model::query()
            ->selectRaw('book_id, AVG(rating) as rating')
            ->groupBy('book_id')
            ->get()
            ->pluck('rating', 'book_id');
    }
}
