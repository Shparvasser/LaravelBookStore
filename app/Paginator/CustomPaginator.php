<?php
namespace App\Paginator;

class CustomPaginator
{
    public function __construct(protected int $limit = 2)
    {
        $this->limit = $limit;
    }

    /**
     * paginate
     *
     * @param  mixed $page
     * @param  mixed $sqlQuery
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function paginate(int $page = 1, \Illuminate\Database\Eloquent\Builder $sqlQuery):\Illuminate\Database\Eloquent\Collection
    {
        $start = ($page - 1) * $this->limit;

        return $sqlQuery
        ->limit($this->limit)
        ->offset($start)
        ->get();
    }
}
