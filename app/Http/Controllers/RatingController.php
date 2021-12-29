<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Http\Requests\RatingRequest;

class RatingController extends Controller
{
    /**
     * ratingOn
     *
     * @param  mixed $req
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function ratingOn(RatingRequest $req): mixed
    {
        $rating = new Rating();
        $rating->book_id = $req->input('book_id');
        $rating->author_id = $req->input('author_id');
        $rating->rating = $req->input('rating');
        $rating->save();

        return redirect()->route('home')->with('success', 'Your rating added');
    }
}
