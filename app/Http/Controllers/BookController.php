<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Service\ImageService;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\IBookRepository;
use App\Repositories\Interfaces\IRatingRepository;
use App\Repositories\Interfaces\ICategoryRepository;

class BookController extends Controller
{

    public function __construct(private IBookRepository $bookRepository, private IRatingRepository $ratingRepository, private ICategoryRepository $categoryRepository, private ImageService $imageService)
    {
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
        $file = $this->imageService->saveImage($req);
        $book = $this->bookRepository->createBook($req, $file);
        $this->bookRepository->checkCategory($book, $req->input('categories'));

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
        $book = $this->bookRepository->getBookBySlug($slug);
        $ratings = $this->ratingRepository->averageRating($book->id);
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
        $book = $this->bookRepository->getBookBySlug($slug);
        $categories = $this->categoryRepository->all();

        return view('edit', ['book' => $book, 'categories' => $categories]);
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
        $file = $this->imageService->saveImage($req);
        $book = $this->bookRepository->getBookBySlug($slug);
        $this->bookRepository->updateBook($req, $file, $book);
        $this->bookRepository->updateCategory($book, $req->input('categories'));

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
        $this->bookRepository->deleteBook($slug);

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
        $categories = $this->categoryRepository->orderByTitle();
        $currentCategory = $this->categoryRepository->getCategoryById($id);
        $ratings = $this->ratingRepository->getQueryRating();
        foreach ($currentCategory->books as $book) {
            if (isset($ratings[$book->id])) {
                $round = round($ratings[$book->id], 2);
                $book->avarageRating = $round;
            }
        }

        return view('home', ['books' => $currentCategory->books, 'categories' => $categories]);
    }
}
