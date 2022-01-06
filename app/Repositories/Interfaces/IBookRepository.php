<?php

namespace App\Repositories\Interfaces;

interface IBookRepository
{
    public function all();
    public function checkCategory(mixed $book, mixed $input);
    public function updateCategory(mixed $book, mixed $input);
    public function createBook(mixed $req, $file);
    public function deleteBook(mixed $slug);
    public function updateBook(mixed $req, mixed $file, mixed $book);
    public function getBookBySlug(mixed $slug);
    public function withUser();
}
