<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IBookRepository;
use App\Repositories\Interfaces\ICategoryRepository;
use App\Repositories\Interfaces\IRatingRepository;
use App\Services\RatingService;

class HomeController extends Controller
{
    public function __construct(private IBookRepository $bookRepository, private IRatingRepository $ratingRepository, private ICategoryRepository $categoryRepository, private RatingService $ratingService)
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
