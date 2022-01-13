<?php

namespace App\Http\Controllers;

use App\Services\RatingService;
use App\Repositories\BookRepository;
use App\Repositories\RatingRepository;
use App\Repositories\CategoryRepository;

class HomeController extends Controller
{
    public function __construct(private BookRepository $bookRepository, private RatingRepository $ratingRepository, private CategoryRepository $categoryRepository)
    {
    }

    /**
     * index
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $page = 1;
        $limit = 2;
        $start = ($page - 1) * $limit;
        $categories = $this->categoryRepository->orderByTitle();
        $ratings = $this->ratingRepository->getModelsBooksRatings($start, $limit);
        $totalBooks = $this->bookRepository->getTotalBooks();
        $totalPages = ($totalBooks / $limit) + 1;

        return view('home', ['categories' => $categories, 'ratings' => $ratings, 'pages' => $totalPages]);
    }

    public function totalBooks($page)
    {
        $limit = 2;
        $start = ($page - 1) * $limit;
        $categories = $this->categoryRepository->orderByTitle();
        $ratings = $this->ratingRepository->getModelsBooksRatings($start, $limit);
        $totalBooks = $this->bookRepository->getTotalBooks();
        $totalPages = ($totalBooks / $limit) + 1;

        return view('home', ['categories' => $categories, 'ratings' => $ratings, 'pages' => $totalPages]);
    }
}
