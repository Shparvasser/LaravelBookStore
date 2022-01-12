<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
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
    public function createCategory(array $request): void
    {
        $category = $this->model;
        $category::create([
            'title' => $request['title']
        ]);
    }

    /**
     * updateCategory
     *
     * @param  mixed $req
     * @param  mixed $category
     * @return void
     */
    public function updateCategory(array $request, object $category): void
    {
        $category->update([
            "title" => $request['title']
        ]);
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
