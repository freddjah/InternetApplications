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
        $recipes = $this->repository->getIngredientsOnRecipe(3);
        dd($recipes);
    }

    public function show($recipeId)
    {
        $recipe         = $this->repository->getById($recipeId);
        $ingredients    = $this->repository->getIngredientsOnRecipe($recipeId);
        $instructions   = $this->repository->getInstructionsOnRecipe($recipeId);
        $comments       = $this->repository->getCommentsOnRecipe($recipeId);

        return view('recipe.show', [
            'recipe'        => $recipe,
            'ingredients'   => $ingredients,
            'instructions'  => $instructions,
            'comments'      => $comments,
        ]);
    }

}
