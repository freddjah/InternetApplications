<?php

namespace App\Repositories\Contracts;

interface CommentRepositoryInterface extends BaseRepositoryInterface
{
    public function getValidation();
    function getCommentParams();
}