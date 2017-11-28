<?php

namespace App\Repositories\Eloquent\Recipe;

use App\Recipe;
use App\Repositories\Contracts\RecipeRepositoryInterface;

/**
 * Class RecipeRepository
 * This class is used as a middleman between the controller and the Eloquent model (which is connecting towards the db).
 *
 * @package App\Repositories\Eloquent\Recipe
 */
class RecipeRepository implements RecipeRepositoryInterface
{
    private $recipe;

    public function __construct(Recipe $recipe)
    {
        $this->recipe = $recipe;
    }

    function getAll()
    {
        return $this->recipe->all();
    }

    function getById($id)
    {
        return $this->recipe->where('id', $id)->first();
    }

    function create(array $attributes)
    {
        return $this->recipe->create($attributes);
    }

    function update($id, array $attributes)
    {
        return $this->recipe->where('id', $id)->update($attributes);
    }

    function delete($id)
    {
        $this->recipe->where('id', $id)->delete();
    }

    function getAllOrderbyCreatedAtDesc()
    {
        return $this->getAll()->sortByDesc('created_at');
    }

    function getAllOrderbyCreatedAtAsc()
    {
        return $this->getAll()->sortBy('created_at');
    }

    function getInstructionsOnRecipe($id)
    {
        return $this->getById($id)->instructions()->get();
    }

    function getIngredientsOnRecipe($id)
    {
        return $this->getById($id)->ingredients()->get();
    }

    function getCommentsOnRecipe($id)
    {
        return $this->getById($id)->comments()->get();
    }
}