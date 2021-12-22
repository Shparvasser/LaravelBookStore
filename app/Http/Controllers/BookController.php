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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::where('id', $id)->first();
        return view('view', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::where('id', $id)->first();
        return view('edit', ['book' => $book, 'categories' => Category::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $req)
    {
        $file = $req->file('photo')->store('uploads', 'public');
        $book = Book::find($id);
        $book->author_id = $req->user()->id;
        $book->title = $req->input('title');
        $book->photo = $file;
        $book->page = $req->input('page');
        $book->content = $req->input('content');
        $book->save();
        if ($req->input('categories')) {
            $book->categories()->sync($req->input('categories'));
        }
        return redirect()->route('admin-panel')->with('success', 'The book has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect()->route('admin-panel')->with('success', 'The book has been deleted');
    }
}
