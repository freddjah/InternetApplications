<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    function comments()
    {
        return $this->hasMany(Comment::class);
    }

    function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    function instructions()
    {
        return $this->hasMany(Instruction::class);
    }
}
