<?php

namespace App\Repositories\Interfaces;

interface IBookRepository
{
    public function all();
    public function checkCategory(mixed $book, mixed $input);
    public function updateCategory(mixed $book, mixed $input);
    public function createBook(mixed $data, $userId);
    public function deleteBook(mixed $slug);
    public function updateBook(array $data, mixed $book);
    public function getBookBySlug(mixed $slug);
    public function withUser();
}
