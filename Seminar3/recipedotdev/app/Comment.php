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
        // TODO: Implement own user auth.
        // $this->belongsTo(User::class);
    }

    public function validate(Request $request)
    {
        return $request->validate([
            'message' => 'required',
        ]);
    }
}
