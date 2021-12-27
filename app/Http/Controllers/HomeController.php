<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('title')->get();
        $book = new Book();
        // $rating = $book->reviews()->avg('rating')'rating' => $rating;
        $books = $book->all();
        return view('home', ['books' => $books, 'categories' => $categories]);
    }
}
