<?php

namespace App\Repositories\Interfaces;

interface ICategoryRepository
{
    public function all();
    public function getCategoryById(int $id);
    public function orderByTitle();
    public function createCategory(object $req);
    public function updateCategory(object $req, object $category);
    public function deleteCategory(int $id);
}
