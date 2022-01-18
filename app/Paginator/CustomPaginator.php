<?php
namespace App\Paginator;

class CustomPaginator
{
    protected $start;
    public function __construct(protected int $limit = 2)
    {
        $this->limit = $limit;
    }


    /**
     * paginate
     *
     * @param  int $count
     * @param  int $page
     * @param  \Illuminate\Database\Eloquent\Builder $sqlQuery
     * @return array
     */
    public function paginate(int $count, int $page = 1, \Illuminate\Database\Eloquent\Builder $sqlQuery):array
    {
        $totalCount = $this->totalCount($count);
        $this->offset($page);
        $perPage = $this->perPage($sqlQuery);
        $paging = round($totalCount/$this->limit);

        return ['collection'=>$perPage,'paging'=>$paging, 'current'=>$page];
    }

    /**
     * getTotalPages
     *
     * @param  int $count
     * @return int
     */
    public function totalCount(int $count):int
    {
        return $count;
    }

    /**
     * offset
     *
     * @param  mixed $page
     * @return int
     */
    public function offset(int $page = 1):int
    {
        $this->start = ($page - 1) * $this->limit;
        return $this->start;
    }

    /**
     * perPage
     *
     * @param  \Illuminate\Database\Eloquent\Builder $sqlQuery
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function perPage(\Illuminate\Database\Eloquent\Builder $sqlQuery):\Illuminate\Database\Eloquent\Collection
    {
        return $sqlQuery
        ->limit($this->limit)
        ->offset($this->start)
        ->get();
    }
}
