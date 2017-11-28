<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\InstructionRepositoryInterface;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    public function __construct(InstructionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
