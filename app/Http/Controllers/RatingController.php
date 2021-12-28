<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Requests\RatingRequest;

class RatingController extends Controller
{
    public function ratingOn(RatingRequest $req)
    {
        $rating = new Rating();
        $rating->book_id = $req->input('book_id');
        $rating->author_id = $req->input('author_id');
        $rating->rating = $req->input('rating');
        $rating->save();
        return redirect()->route('home')->with('success', 'Your rating added');
    }
}
