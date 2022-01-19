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
     * @param  int $id
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
     * @param  array $req
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
     * @param  array $req
     * @param  object $category
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
     * @param  int $id
     * @return true|false
     */
    public function deleteCategory(int $id): bool
    {
        return $this->model::where('id', $id)->delete();
    }
}
