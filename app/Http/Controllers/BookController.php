<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Http\Requests\BookRequest;
use App\Repositories\BookRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\RatingRepository;
use App\Repositories\CategoryRepository;

class BookController extends Controller
{
    public function __construct(private BookRepository $bookRepository, private RatingRepository $ratingRepository, private CategoryRepository $categoryRepository, private ImageService $imageService)
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
     * @param  BookRequest $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function create(BookRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();
        $data['photo'] = $this->imageService->saveImage($request);
        $userId = $request->user()->id;
        $book = $this->bookRepository->createBook($data, $userId);
        $this->bookRepository->checkCategory($book, $request->input('categories'));

        return redirect()->route('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestuest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(string $slug): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
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
     * @param  string $slug
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(string $slug): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $book = $this->bookRepository->getBookBySlug($slug);
        $categories = $this->categoryRepository->all();

        return view('edit', ['book' => $book, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $slug
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(string $slug, BookRequest $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $data = $request->all();
        $data['photo'] = $this->imageService->saveImage($request);
        $book = $this->bookRepository->getBookBySlug($slug);
        $this->bookRepository->updateBook($data, $book);
        $this->bookRepository->updateCategory($book, $request->input('categories'));

        return redirect()->route('admin-panel')->with('success', 'The book has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $slug
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(string $slug): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        if ($this->bookRepository->deleteBook($slug)) {
            $success = 'success';
            $message = 'The book has been deleted';
        }
        $success = 'danger';
        $message = 'Something went wrong';

        return redirect()->route('admin-panel')->with($success, $message);
    }

    /**
     * getBookByCategory
     *
     * @param  int $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getBookByCategory(int $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $categories = $this->categoryRepository->orderByTitle();
        $ratings = $this->ratingRepository->getCategoriesBooksRatings($id);

        return view('home', ['ratings' => $ratings, 'categories' => $categories]);
    }
}
