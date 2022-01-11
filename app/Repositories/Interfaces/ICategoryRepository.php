<?php

namespace App\Repositories\Interfaces;

interface ICategoryRepository
{
    public function all();
    public function getCategoryById(int $id);
    public function orderByTitle();
    public function createCategory(array $request);
    public function updateCategory(array $request, object $category);
    public function deleteCategory(int $id);
}
