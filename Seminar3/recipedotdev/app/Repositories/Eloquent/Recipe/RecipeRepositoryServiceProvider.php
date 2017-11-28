<?php

namespace App\Repositories\Eloquent\Recipe;

use Illuminate\Support\ServiceProvider;

class RecipeRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Repositories\Contracts\RecipeRepositoryInterface', 'App\Repositories\Eloquent\Recipe\RecipeRepository');
    }
}