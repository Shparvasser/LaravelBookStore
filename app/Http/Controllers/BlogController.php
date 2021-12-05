<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class BlogController extends Controller
{
    public function index()
    {
        // $categories = Category::orderBy('title');
        // $posts = Post::query()->where('title', 'like', 'post-1%')
        //     ->first();
        // dump($posts);
        // $posts->category;
        // dd($posts);
        $categories = Post::query()->where(function ($query) {
            $query->select('title')
                ->from('categories')
                ->whereColumn('categories.id', 'posts.category_id');
        }, 'Category4')->get();
        $posts = Post::whereHas('category', function (Builder $query) {
            $query->where('title', 'Category4');
        })->get();
        return view('pages.index', ['posts' => $posts]);
    }
    public function getPostsByCategory()
    {
    }
}
