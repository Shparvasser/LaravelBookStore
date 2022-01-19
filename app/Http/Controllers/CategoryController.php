<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    public function __construct(private CategoryRepository $categoryRepository)
    {
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
     * create
     *
     * @param  CategoryRequest $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function create(CategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->categoryRepository->createCategory($request->all());

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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
     * @param  CategoryRequest $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $category = $this->categoryRepository->getCategoryById($id);
        $this->categoryRepository->updateCategory($request->all(), $category);

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
        if ($this->categoryRepository->deleteCategory($id)) {
            $success = 'success';
            $message = 'The category has been deleted';
        }
        $success = 'danger';
        $message = "Something went wrong";

        return redirect()->route('admin-panel')->with($success, $message);
    }
}
