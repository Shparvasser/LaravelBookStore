<?php
namespace App\Paginator;

use App\Models\Book;
use App\Models\Rating;
use App\Repositories\RatingRepository;

class CustomPaginator
{
    protected $page;

    public function __construct(private RatingRepository $ratingRepository, protected $limit = 2)
    {
        $this->limit = $limit;
    }

    public function paginate($page = 1)
    {
        $start = ($page - 1) * $this->limit;
        return $this->ratingRepository->getModelsBooksRatings()
        ->limit($this->limit)
        ->offset($start)
        ->get();
    }

    public function getTotalBooks()
    {
        $count = Book::query()
            ->selectRaw('COUNT(id) as Id')
            ->pluck('Id');
        return $count['0'];
    }

    public function getTotalPages($page = 1)
    {
        $totalBooks = $this->getTotalBooks();
        return ['paging'=>round($totalBooks/$this->limit),'current'=>$page];
    }

    public function paginateByCategory($id, $page =1)
    {
        $start = ($page - 1) * $this->limit;
        return $this->ratingRepository->getModelsCategoriesBooksRatings($id)
        ->limit($this->limit)
        ->offset($start)
        ->get();
    }

    public function getTotalBooksCategory($id)
    {
        $count = Rating::query()
        ->rightjoin('books', 'books.id', '=', 'ratings.book_id')
        ->join('book_category', 'book_category.book_id', '=', 'books.id')
        ->join('categories', 'categories.id', '=', 'book_category.category_id')
        ->selectRaw('book_category.book_id, books.*, AVG(rating) as rating')
        ->where('categories.id', $id)
        ->groupBy('categories.id')
        ->with('user')
        ->count();

        return $count;
    }

    public function getTotalPagesCategory($id, $page = 1)
    {
        $totalBooks = $this->getTotalBooksCategory($id);
        return ['paging'=>round($totalBooks/$this->limit),'current'=>$page];
    }
}
