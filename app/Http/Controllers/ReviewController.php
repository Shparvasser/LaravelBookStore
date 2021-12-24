<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function review(ReviewRequest $req, $id)
    {
        $review = new Review();
        $review->author_id = $req->user()->id;
        $review->book_id = $id;
        $review->comment = $req->input('comment');
        $review->rating = $req->input('rating');
        $review->save();
        return redirect()->route('home')->with('success', 'Your review added');
    }

    // public function ratingOn(ReviewRequest $req, $id)
    // {
    //     $rating = new Review();
    //     // $rating->author_id = $req->user()->id;
    //     $rating->author_id = $req->input('author_id');
    //     // $rating->book_id = $id;
    //     $rating->book_id = $req->input('book_id');
    //     $rating->rating = $req->input('rating');
    //     $rating->save();

    //     $rules = [
    //         'book_id' => 'unique_with:ratings,author_id',
    //         'author_id' => 'required',
    //     ];
    //     $validator = Validator::make(Input::class, $rules);
    //     if ($validator->fails()) {
    //         return Redirect::back()->withErrors($validator);
    //     }
    //     $rating = new Rating();
    //     $rating->author_id = Input::get('author_id');
    //     $rating->book_id = Input::get('book_id');
    //     $rating->rating = $req->input('rating');
    //     return redirect()->route('home')->with('success', 'Your rating added');
    // }
}
