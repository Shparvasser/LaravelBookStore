<?php

namespace App\Services;

class RatingService
{
    public function roundRatingCategory($items, $attribute)
    {
        foreach ($items->books as $item) {
            if (isset($attribute[$item->id])) {
                $round = round($attribute[$item->id], 2);
                $item->avarageRating = $round;
            }
        }
    }

    public function roundRatingHome($items, $attribute)
    {
        foreach ($items as $item) {
            if (isset($attribute[$item->id])) {
                $round = round($attribute[$item->id], 2);
                $item->avarageRating = $round;
            }
        }
    }
}
