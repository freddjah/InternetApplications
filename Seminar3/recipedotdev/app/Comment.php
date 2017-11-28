<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comment extends Model
{
    protected $fillable = ['message', 'user_id', 'recipe_id'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function validation()
    {
        return [
            'message' => 'required'
        ];
    }
}
