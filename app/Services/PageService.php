<?php

namespace App\Services;

class PageService
{
    public function __construct(protected int $limit = 2)
    {
        $this->limit = $limit;
    }

    /**
     * getTotalPages
     *
     * @param  int $page
     * @param  mixed $method
     * @return array
     */
    public function getTotalPages(int $page = 1, mixed $method)
    {
        $totalBooks = $method;

        return ['paging'=>round($totalBooks/$this->limit),'current'=>$page];
    }
}
