<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * index
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $categories = Category::orderBy('title')->get();
        $book = new Book();
        $books = $book
            ->with('user')
            ->get();
        $ratings = Rating::query()
            ->selectRaw('book_id, AVG(rating) as rating')
            ->groupBy('book_id')
            ->get()
            ->pluck('rating', 'book_id');
        foreach ($books as $book) {
            if (isset($ratings[$book->id])) {
                $round = round($ratings[$book->id], 2);
                $book->avarageRating = $round;
            }
        }

        return view('home', ['books' => $books, 'categories' => $categories]);
    }
}
