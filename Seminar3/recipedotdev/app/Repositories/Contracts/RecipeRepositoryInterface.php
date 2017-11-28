<?php

namespace App\Repositories\Contracts;

interface RecipeRepositoryInterface extends BaseRepositoryInterface
{
    function getAllOrderbyCreatedAtDesc();
    function getAllOrderbyCreatedAtAsc();
    function getCommentsOnRecipe($id);
    function getInstructionsOnRecipe($id);
    function getIngredientsOnRecipe($id);
}