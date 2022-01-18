<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Services\PageService;
use App\Paginator\CustomPaginator;
use App\Repositories\BookRepository;
use App\Repositories\RatingRepository;
use App\Repositories\CategoryRepository;

class HomeController extends Controller
{
    public function __construct(private PageService $pageService, private CustomPaginator $paginate, private BookRepository $bookRepository, private RatingRepository $ratingRepository, private CategoryRepository $categoryRepository)
    {
    }

    /**
     * index
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $categories = $this->categoryRepository->orderByTitle();
        $ratingRepository = $this->ratingRepository->getModelsBooksRatings();
        $getTotalBooks = $this-> bookRepository->getTotalBooks();
        $ratings = $this->paginate->paginate($page = 1, $ratingRepository);
        $totalPages = $this->paginate->totalCount($page = 1, $getTotalBooks);

        return view('home', ['categories' => $categories, 'ratings' => $ratings,'pages' => $totalPages ]);
    }

    /**
     * totalBooks
     *
     * @param  int $page
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function totalBooks(int $page):\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $categories = $this->categoryRepository->orderByTitle();
        $ratingRepository = $this->ratingRepository->getModelsBooksRatings();
        $getTotalBooks = $this-> bookRepository->getTotalBooks();
        $ratings = $this->paginate->paginate($page, $ratingRepository);
        $totalPages = $this->paginate->totalCount($page, $getTotalBooks);

        return view('home', ['categories' => $categories, 'ratings' => $ratings, 'pages' => $totalPages]);
    }
}
