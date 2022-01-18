<?php
namespace App\Paginator\Interfacies;

interface ICustomPaginator
{
    public function paginate(int $page = 1, \Illuminate\Database\Eloquent\Builder $sqlQuery);
}
