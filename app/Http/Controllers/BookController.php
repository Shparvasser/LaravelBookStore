<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('book');
    }
    public function create(BookRequest $req)
    {
        $book = new Book();
        $book->title = $req->input('title');
        $book->photo = $req->input('photo');
        $book->page = $req->input('page');
        $book->save();
        return redirect()->route('home');
    }
}
