<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    /**
     * Defining relationship: A Recipe can have many Comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Defining relationshop: A Recipe can have many Ingredients.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    /**
     * Defining relationshop: A Recipe can have many Instructions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function instructions()
    {
        return $this->hasMany(Instruction::class);
    }

    /**
     * Orders the recipes by created_at in descending order. Fetches chosen amount of recipes (1 is default).
     *
     * @param $query
     * @param $amount
     * @return mixed
     */
    function scopeLatest($query, $amount = 1)
    {
        return $query->orderBy('created_at', 'desc')->take($amount);
    }

    /**
     * Returns data from recipe as well as data from all its relations.
     *
     * @param $query
     * @param $id
     * @return mixed
     */
    function scopeRecipeData($query, $id)
    {
        return $query->with(['ingredients', 'instructions','comments'])->where('id', $id);
    }
}
