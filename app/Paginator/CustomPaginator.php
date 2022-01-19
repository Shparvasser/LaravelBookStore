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
     * @param  int $page
     * @param  \Illuminate\Database\Eloquent\Builder $sqlQuery
     * @return array
     */
    public function paginate(int $page = 1, \Illuminate\Database\Eloquent\Builder $sqlQuery):array
    {
        $totalCount = $this->totalCount($sqlQuery);
        $this->offset($page);
        $perPage = $this->perPage($sqlQuery);
        $paginate = round($totalCount/$this->limit);
        $nextLink = $this->nextLink($page);
        $prevLink = $this->prevLink($page);
        $items = ['collection'=>$perPage,'paginate'=>$paginate, 'current'=>$page,'nextLink'=>$nextLink,'prevLink'=>$prevLink,'total'=>$totalCount];

        return $items;
    }

    /**
     * totalCount
     *
     * @param \Illuminate\Database\Eloquent\Builder $sqlQuery
     * @return int
     */
    public function totalCount($sqlQuery):int
    {
        return $sqlQuery->toBase()->getCountForPagination();
    }

    /**
     * offset
     *
     * @param  int $page
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

    /**
     * nextLink
     *
     * @param  int $page
     * @return int
     */
    public function nextLink(int $page):int
    {
        return $page +1;
    }

    /**
     * prevLink
     *
     * @param  int $page
     * @return int
     */
    public function prevLink(int $page):int
    {
        return $page -1;
    }
}
