<?php

namespace App\Providers;

use App\Repositories\BookRepository;
use App\Repositories\RatingRepository;
use App\Repositories\CommentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Interfaces\IBookRepository::class,
            BookRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\IRatingRepository::class,
            RatingRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\ICommentRepository::class,
            CommentRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
