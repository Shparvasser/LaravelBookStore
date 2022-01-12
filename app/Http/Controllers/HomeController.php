<?php

namespace App\Http\Controllers;

use App\Services\RatingService;
use App\Repositories\BookRepository;
use App\Repositories\RatingRepository;
use App\Repositories\CategoryRepository;

class HomeController extends Controller
{
    public function __construct(private BookRepository $bookRepository, private RatingRepository $ratingRepository, private CategoryRepository $categoryRepository, private RatingService $ratingService)
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
        $books = $this->bookRepository->withUser();
        $ratings = $this->ratingRepository->getQuery();
        $this->ratingService->roundRatingHome($books, $ratings);

        return view('home', ['books' => $books, 'categories' => $categories]);
    }
}
