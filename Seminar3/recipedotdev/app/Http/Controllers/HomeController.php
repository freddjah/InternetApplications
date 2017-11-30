<?php

namespace App\Http\Controllers;

use App\Recipe;

class HomeController extends Controller
{
    public function index()
    {
        $recentlyAddedRecipes = Recipe::latest(3)->get();

        return view('home', [
            'recentlyAddedRecipes' => $recentlyAddedRecipes
        ]);
    }
}
