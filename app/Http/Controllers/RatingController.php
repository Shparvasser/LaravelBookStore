<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function ratingOn(RatingRequest $req, $id)
    {
        $rating = new Rating();
        // $rating->author_id = $req->user()->id;
        $rating->author_id = $req->input('author_id');
        $rating->rating = $req->input('rating');
        // $rating->book_id = $id;
        $rating->book_id = $req->input('book_id');
        $rating->save();
        return redirect()->route('home')->with('success', 'Your rating added');
    }
}
