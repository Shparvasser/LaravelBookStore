<?php
namespace App\Paginator\Interfacies;

interface ICustomPaginator
{
    public function paginate($page = 1, $sqlQuery);
    public function getTotalBooks();
    public function getTotalPages($id, $page =1);
    // public function paginateByCategory($id, $page =1);
    public function getTotalBooksCategory($id);
    public function getTotalPagesCategory($id, $page = 1);
}
