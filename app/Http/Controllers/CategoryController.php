<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Interfaces\ICategoryRepository;

class CategoryController extends Controller
{
    private $categoryRepository;
    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CategoryRequest $req): \Illuminate\Http\RedirectResponse
    {
        $this->categoryRepository->createCategory($req);

        return redirect()->route('admin-panel')->with('success', 'The category has been created');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $category = $this->categoryRepository->getCategoryById($id);

        return view('admin.panel-edit-category', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $req, int $id): \Illuminate\Http\RedirectResponse
    {
        $category = $this->categoryRepository->getCategoryById($id);
        $this->categoryRepository->updateCategory($req, $category);

        return redirect()->route('admin-panel')->with('success', 'The category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->categoryRepository->deleteCategory($id);

        return redirect()->route('admin-panel')->with('success', 'The category has been deleted');
    }
}
