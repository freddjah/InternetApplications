<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CommentRepositoryInterface;

class CommentController extends Controller
{
    public function __construct(CommentRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth');
    }

    public function store($recipeId)
    {
        $validator = $this->repository->getValidation();
        $this->validate(request(), $validator);

        $this->repository->create([
            'recipe_id' => $recipeId,
            'user_id'   => auth()->id(),
            'message'   => request('message'),
        ]);

        return back();
    }

    public function destroy($commentId)
    {
        $this->repository->delete($commentId);
    }
}
