<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IBookRepository;
use App\Repositories\Interfaces\ICategoryRepository;

class AdminController extends Controller
{
    private $bookRepository;
    private $categoryRepository;

    function __construct(IBookRepository $bookRepository, ICategoryRepository $categoryRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('admin.panel');
    }

    /**
     * showBooks
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showBooks(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $books = $this->bookRepository->all();

        return view('admin.panel-books', ['books' => $books]);
    }

    /**
     * showCategories
     *
     * @return Illuminate\Contracts\View\View
     */
    public function showCategories(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $categories = $this->categoryRepository->all();

        return view('admin.panel-categories', ['categories' => $categories]);
    }
}
