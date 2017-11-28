<?php

namespace App\Repositories\Eloquent;

use App\Comment;
use App\Repositories\Contracts\CommentRepositoryInterface;
use Illuminate\Http\Request;

class CommentRepository implements CommentRepositoryInterface
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    function getAll()
    {
        return $this->comment->all();
    }

    function getById($id)
    {
        return $this->comment->where('id', $id)->get();
    }

    function create(array $attributes)
    {

        return $this->comment->create($attributes);
    }

    function update($id, array $attributes)
    {
        return $this->comment->where('id', $id)->update($attributes);
    }

    function delete($id)
    {
        $this->comment->where('id', $id)->delete();
    }

    function getValidation()
    {
        return $this->comment->validation();
    }

    function getCommentParams()
    {
        return $this->comment->creationParams();
    }
}