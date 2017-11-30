<?php

namespace App\Http\Controllers;

use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

        return back();
    }

    public function destroy($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();
        return back();
    }
}
