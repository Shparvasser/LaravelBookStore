<?php

namespace App\Services;

class RatingService
{
    /**
     * roundRatingCategory
     *
     * @param  \Illuminate\Database\Eloquent\Collection $items
     * @param  \Illuminate\Database\Eloquent\Collection $attribute
     * @return void
     */
    public function roundRatingCategory(\Illuminate\Database\Eloquent\Collection $items, \Illuminate\Database\Eloquent\Collection $attribute): void
    {
        foreach ($items->books as $item) {
            if (isset($attribute[$item->id])) {
                $round = round($attribute[$item->id], 2);
                $item->avarageRating = $round;
            }
        }
    }

    /**
     * roundRatingHome
     *
     * @param  \Illuminate\Database\Eloquent\Collection $items
     * @param  \Illuminate\Support\Collection $attribute
     * @return void
     */
    public function roundRatingHome(\Illuminate\Database\Eloquent\Collection $items, \Illuminate\Support\Collection $attribute): void
    {
        foreach ($items as $item) {
            if (isset($attribute[$item->id])) {
                $round = round($attribute[$item->id], 2);
                $item->avarageRating = $round;
            }
        }
    }
}
