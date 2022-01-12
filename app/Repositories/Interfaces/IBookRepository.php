<?php

namespace App\Repositories\Interfaces;

interface IBookRepository
{
    public function all();
    public function checkCategory(object $book, array $input);
    public function updateCategory(object $book, array $input);
    public function createBook(array $data, int $userId);
    public function deleteBook(string $slug);
    public function updateBook(array $data, object $book);
    public function getBookBySlug(string $slug);
    public function withUser();
}
