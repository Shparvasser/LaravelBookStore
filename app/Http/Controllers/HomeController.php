<?php

namespace App\Http\Controllers;

use App\Paginator\CustomPaginator;
use App\Repositories\BookRepository;
use App\Repositories\RatingRepository;
use App\Repositories\CategoryRepository;

class HomeController extends Controller
{
    public function __construct(private CustomPaginator $paginate, private BookRepository $bookRepository, private RatingRepository $ratingRepository, private CategoryRepository $categoryRepository)
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
        $ratings = $this->paginate->paginate($page = 1, $ratingRepository);
        $totalPages = $this->paginate->getTotalPages();

        return view('home', ['categories' => $categories, 'ratings' => $ratings,'pages' => $totalPages ]);
    }

    public function totalBooks($page)
    {
        $categories = $this->categoryRepository->orderByTitle();
        $ratingRepository = $this->ratingRepository->getModelsBooksRatings();
        $ratings = $this->paginate->paginate($page, $ratingRepository);
        $totalPages = $this->paginate->getTotalPages($page);

        return view('home', ['categories' => $categories, 'ratings' => $ratings, 'pages' => $totalPages]);
    }
}
