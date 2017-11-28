<?php

namespace App\Http\Controllers;


use App\Repositories\Contracts\RecipeRepositoryInterface;

class HomeController extends Controller
{
    private $repository;
    public function __construct(RecipeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $latestAddedRecipes = $this->repository->getAllOrderbyCreatedAtDesc()->slice(0,3);
        return view('home', compact('latestAddedRecipes'));
    }
}
