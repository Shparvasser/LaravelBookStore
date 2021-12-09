<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index()
    {
        return view('book', ['categories' => Category::get()]);
    }
    public function create(BookRequest $req)
    {
        $file = $req->file('photo')->store('uploads', 'public');
        $book = new Book();
        $book->author_id = $req->user()->id;
        $book->title = $req->input('title');
        $book->photo = $file;
        $book->page = $req->input('page');
        $book->content = $req->input('content');
        $book->save();
        if ($req->input('categories')) {
            $book->categories()->attach($req->input('categories'));
        }

        return redirect()->route('home');
    }
}
