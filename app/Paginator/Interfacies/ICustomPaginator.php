<?php
namespace App\Paginator\Interfacies;

interface ICustomPaginator
{
    public function paginate(int $page = 1, \Illuminate\Database\Eloquent\Builder $sqlQuery);
    public function totalCount(int $page = 1, int $count);
    // public function getTotalPages(int $page = 1, int $totalCount);
}
