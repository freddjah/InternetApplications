<?php

namespace App\Repositories\Eloquent\Ingredient;

use App\Ingredient;
use App\Repositories\Contracts\IngredientRepositoryInterface;

class IngredientRepository implements IngredientRepositoryInterface
{
    private $ingredient;

    public function __construct(Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;
    }

    function getAll()
    {
        return $this->ingredient->all();
    }

    function getById($id, array $relationships = [])
    {
        return $this->ingredient->with($relationships)->where('id', $id)->get();
    }

    function create(array $attributes)
    {
        $this->ingredient->create($attributes);
    }

    function update($id, array $attributes)
    {
        return $this->ingredient->where('id', $id)->update($attributes);
    }

    function delete($id)
    {
        $this->ingredient->where('id', $id)->delete();
    }
}