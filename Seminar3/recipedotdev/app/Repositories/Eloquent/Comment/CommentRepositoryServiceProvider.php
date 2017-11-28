<?php

namespace App\Repositories\Eloquent\Comment;

use Illuminate\Support\ServiceProvider;

class CommentRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Contracts\CommentRepositoryInterface', 'App\Repositories\Eloquent\Comment\CommentRepository');
    }
}