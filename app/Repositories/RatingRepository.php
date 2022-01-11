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
     * @param  mixed $bookId
     * @return float
     */
    public function averageRating(mixed $bookId): float
    {
        $rating = $this->model::where('book_id', $bookId)->avg('rating');
        $round = round($rating, 2);
        return $round;
    }

    /**
     * createRating
     *
     * @param  mixed $req
     * @return void
     */
    public function createRating(mixed $data): void
    {
        $rating = $this->model;
        // $rating->book_id = $req->input('book_id');
        // $rating->author_id = $req->input('author_id');
        // $rating->rating = $req->input('rating');
        // $rating->save();

        $rating::create([
            'book_id' => $data['book_id'],
            'author_id' => $data['author_id'],
            'rating' => $data['rating'],
        ]);
    }

    public function getQueryRating()
    {
        return $this->model::query()
            ->selectRaw('book_id, AVG(rating) as rating')
            ->groupBy('book_id')
            ->get()
            ->pluck('rating', 'book_id');
    }
}
