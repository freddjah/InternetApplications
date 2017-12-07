<?php

namespace App\Http\Controllers;

use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index($recipeId) 
    {
        return Comment::with('user')->where('recipe_id', $recipeId)->get();
    }

    public function store($recipeId)
    {
        $validator = Comment::validation();
        $this->validate(request(), $validator);

        Comment::create([
            'recipe_id' => $recipeId,
            'user_id'   => auth()->id(),
            'message'   => request('message'),
        ]);
    }

    public function destroy($recipeId, $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();
        return back();
    }
}
