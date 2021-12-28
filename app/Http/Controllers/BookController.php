<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

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
        $book->slug = $book->setTitleAtribute($book->title);
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
    public function show($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $rating = new Rating();
        $ratings = $rating->where('book_id', $book->id)->avg('rating');
        $ratings = round($ratings, 2);
        if (Auth::check()) {
            $user = Auth::user()->id;
        }

        return view(
            'view',
            [
                'book' => $book,
                'comments' => $book->comments,
                'user' => $user,
                'ratings' => $ratings
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $book = Book::where('slug', $slug)->first();

        return view('edit', ['book' => $book, 'categories' => Category::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($slug, BookRequest $req)
    {
        $file = $req->file('photo')->store('uploads', 'public');
        $book = Book::where('slug', $slug)->first();
        $book->title = $req->input('title');
        $book->slug = $book->setTitleAtribute($book->title);
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
    public function destroy($slug)
    {
        Book::where('slug', $slug)->delete();

        return redirect()->route('admin-panel')->with('success', 'The book has been deleted');
    }

    public function getBookByCategory($id)
    {
        $categories = Category::orderBy('title')->get();
        $currentCategory = Category::where('id', $id)
            ->first();

        return view('home', ['books' => $currentCategory->books, 'categories' => $categories]);
    }
}
