<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CommentRepositoryInterface;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(CommentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
