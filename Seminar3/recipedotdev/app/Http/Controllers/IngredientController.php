<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\IngredientRepositoryInterface;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function __construct(IngredientRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
