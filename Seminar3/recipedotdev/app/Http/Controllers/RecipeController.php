<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Support\Facades\Cache;

class RecipeController extends Controller
{

    public function index()
    {
        $recentlyAddedRecipes = Recipe::latest(3)->get();
        $allRecipes = Recipe::all();

        return view('recipe.index', [
            'recentlyAddedRecipes'  => $recentlyAddedRecipes,
            'allRecipes'            => $allRecipes,
        ]);
    }

    public function show($id)
    {
        $recipe = Recipe::recipeData($id)->firstOrFail();
        $ingredients    = $recipe->ingredients;
        $instructions   = $recipe->instructions;
        $comments       = $recipe->comments->sortByDesc('created_at');

        return view('recipe.show', [
            'recipe'        => $recipe,
            'ingredients'   => $ingredients,
            'instructions'  => $instructions,
            'comments'      => $comments,
        ]);
    }

}
