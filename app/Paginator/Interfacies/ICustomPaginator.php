<?php
namespace App\Paginator\Interfacies;

interface ICustomPaginator
{
    public function paginate(int $count, int $page = 1, \Illuminate\Database\Eloquent\Builder $sqlQuery):array;
    public function totalCount(int $page = 1, int $count):int;
    public function offset(int $page = 1):int;
    public function perPage(\Illuminate\Database\Eloquent\Builder $sqlQuery):\Illuminate\Database\Eloquent\Collection;
}
