<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\ICategoryRepository;

class CategoryRepository implements ICategoryRepository
{

    public function __construct(private Category $model)
    {
    }

    /**
     * getCategoryById
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getCategoryById(int $id): mixed
    {
        $currentCategory = $this->model::where('id', $id)->first();
        return $currentCategory;
    }

    /**
     * orderByTitle
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function orderByTitle(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model::orderBy('title')->get();
    }

    /**
     * all
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model::all();
    }

    /**
     * createCategory
     *
     * @param  mixed $req
     * @return void
     */
    public function createCategory(object $req): void
    {
        $category = $this->model;
        $category->title = $req->input('title');
        $category->save();
    }

    /**
     * updateCategory
     *
     * @param  mixed $req
     * @param  mixed $category
     * @return void
     */
    public function updateCategory(object $req, object $category): void
    {
        $category->title = $req->input('title');
        $category->save();
    }

    /**
     * deleteCategory
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteCategory(int $id): void
    {
        $this->model::where('id', $id)->delete();
    }
}
