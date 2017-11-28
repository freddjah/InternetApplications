<?php

namespace App\Repositories\Eloquent\Ingredient;

use Illuminate\Support\ServiceProvider;

class InstructionRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Repositories\Contracts\InstructionRepositoryInterface', 'App\Repositories\Eloquent\Instruction\InstructionRepository');
    }
}