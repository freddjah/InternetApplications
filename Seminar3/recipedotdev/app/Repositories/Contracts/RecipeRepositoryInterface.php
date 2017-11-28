<?php

namespace App\Repositories\Contracts;

interface RecipeRepositoryInterface extends BaseRepositoryInterface
{
    function getAllOrderbyCreatedAtDesc();
    function getAllOrderbyCreatedAtAsc();
    function getCommentsOnRecipe($id);
    function getIngredientsOnRecipe($id);
}