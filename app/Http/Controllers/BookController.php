<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\IBookRepository;

class BookController extends Controller
{
    private $bookRepository;

    public function __construct(IBookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * index
     *
     * @return Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('book', ['categories' => Category::get()]);
    }

    /**
     * create
     *
     * @param  mixed $req
     * @return Illuminate\Http\RedirectResponse
     */
    public function create(BookRequest $req): \Illuminate\Http\RedirectResponse
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
     * @param  mixed  $slug
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(mixed $slug): mixed
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
     * @param  mixed  $slug
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(mixed $slug): mixed
    {
        $book = Book::where('slug', $slug)->first();

        return view('edit', ['book' => $book, 'categories' => Category::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  mixed  $slug
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(mixed $slug, BookRequest $req): mixed
    {
        $file = $req->file('photo')->store('uploads', 'public');
        $book = Book::where('slug', $slug)->first();
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
     * @param  mixed  $slug
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(mixed $slug): mixed
    {
        Book::where('slug', $slug)->delete();

        return redirect()->route('admin-panel')->with('success', 'The book has been deleted');
    }

    /**
     * getBookByCategory
     *
     * @param  mixed $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getBookByCategory(int $id): mixed
    {
        $categories = Category::orderBy('title')->get();
        $currentCategory = Category::where('id', $id)
            ->first();
        $ratings = Rating::query()
            ->selectRaw('book_id, AVG(rating) as rating')
            ->groupBy('book_id')
            ->get()
            ->pluck('rating', 'book_id');
        foreach ($currentCategory->books as $book) {
            $round = round($ratings[$book->id], 2);
            $book->avarageRating = $round;
        }

        return view('home', ['books' => $currentCategory->books, 'categories' => $categories]);
    }
}
