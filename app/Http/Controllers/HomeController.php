<?php

namespace App\Http\Controllers;

use App\Paginate;
use App\Services\RatingService;
use App\Repositories\BookRepository;
use App\Repositories\RatingRepository;
use App\Repositories\CategoryRepository;

class HomeController extends Controller
{
    public function __construct(private Paginate $paginate, private BookRepository $bookRepository, private RatingRepository $ratingRepository, private CategoryRepository $categoryRepository)
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
        $ratings = $this->paginate->paginate();
        $totalPages = $this->paginate->getTotalPages();

        return view('home', ['categories' => $categories, 'ratings' => $ratings,'pages' => $totalPages ]);
    }

    public function totalBooks($page)
    {
        $categories = $this->categoryRepository->orderByTitle();
        $ratings = $this->paginate->paginate($page);
        $totalPages = $this->paginate->getTotalPages($page);

        return view('home', ['categories' => $categories, 'ratings' => $ratings, 'pages' => $totalPages]);
    }
}
