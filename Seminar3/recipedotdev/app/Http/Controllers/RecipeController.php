<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\RecipeRepositoryInterface;

class RecipeController extends Controller
{
    public function __construct(RecipeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $recipes = $this->repository->getIngredientsOnRecipe(1);
        dd(auth()->user());
    }

}
