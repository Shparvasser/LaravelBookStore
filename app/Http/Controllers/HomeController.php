<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $book = new Book();
        $books = $book->all();
        return view('home', ['books' => $books]);
    }
}
