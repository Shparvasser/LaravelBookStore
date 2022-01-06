<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IBookRepository;
use App\Repositories\Interfaces\ICategoryRepository;
use App\Repositories\Interfaces\IRatingRepository;

class HomeController extends Controller
{
    private $bookRepository;
    private $ratingRepository;
    private $categoryRepository;

    public function __construct(IBookRepository $bookRepository, IRatingRepository $ratingRepository, ICategoryRepository $categoryRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->ratingRepository = $ratingRepository;
        $this->categoryRepository = $categoryRepository;
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
        $ratings = $this->ratingRepository->getQueryRating();
        foreach ($books as $book) {
            if (isset($ratings[$book->id])) {
                $round = round($ratings[$book->id], 2);
                $book->avarageRating = $round;
            }
        }

        return view('home', ['books' => $books, 'categories' => $categories]);
    }
}
