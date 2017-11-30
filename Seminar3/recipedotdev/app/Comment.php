<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Specifying what attributes has to be set in order to create a new entity in DB.
     *
     * @var array
     */
    protected $fillable = ['message', 'user_id', 'recipe_id'];

    /**
     * Defining relationship: A Comment has been made on a Recipe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    /**
     * Defining relationship: A Comment has been made by a User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns the fields needed in a POST-request form.
     *
     * @return array
     */
    public static function validation()
    {
        return [
            'message' => 'required'
        ];
    }

    /**
     * Orders the comments by created_at in descending order. Fetches chosen amount of recipes (1 is default).
     *
     * @param $query
     * @param $amount
     * @return mixed
     */
    function scopeLatest($query, $amount)
    {
        return $query->orderBy('created_at', 'desc')->take($amount);
    }
}
