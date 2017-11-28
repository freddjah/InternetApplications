<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CommentRepositoryInterface;

class CommentController extends Controller
{
    public function __construct(CommentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store()
    {
        // Validate form
        $validator = $this->repository->getValidation();
        $this->validate(request(), $validator);

        // Create comment
        $commentParams = $this->repository->getCommentParams();
        $this->repository->create(request($commentParams));

        return back();
    }

    public function destroy($commentId)
    {
        $this->repository->delete($commentId);
    }
}
