<?php

namespace App\Repositories\Interfaces;

interface IBookRepository
{
    public function all();
    public function checkCategory($book, $input);
    public function updateCategory($book, $input);
    public function createBook($req, $file);
    public function deleteBook($slug);
    public function updateBook($req, $file, $book);
    public function getBookBySlug($slug);
}
