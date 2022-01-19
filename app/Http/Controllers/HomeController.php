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
        $getBooksRatings = $this->ratingRepository->getBooksRatings();
        $paginate = $this->paginate->paginate($page = 1, $getBooksRatings);

        return view('home', ['categories' => $categories, 'paginate'=>$paginate]);
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
        $getBooksRatings = $this->ratingRepository->getBooksRatings();
        $paginate = $this->paginate->paginate($page, $getBooksRatings);

        return view('home', ['categories' => $categories, 'paginate'=>$paginate]);
    }
}
