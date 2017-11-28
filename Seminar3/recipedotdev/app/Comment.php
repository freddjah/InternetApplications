<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comment extends Model
{
    protected $fillable = ['message', 'user_id', 'recipe_id'];

    public function recipe()
    {
        $this->belongsTo(Recipe::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function creationParams()
    {
        return ['body', 'recipe_id', 'user_id'];
    }

    public function validation()
    {
        return [
            'body' => 'required'
        ];
    }
}
