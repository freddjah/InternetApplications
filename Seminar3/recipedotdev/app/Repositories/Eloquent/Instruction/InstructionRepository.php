<?php

namespace App\Repositories\Eloquent\Instruction;

use App\Instruction;
use App\Repositories\Contracts\InstructionRepositoryInterface;

class InstructionRepository implements InstructionRepositoryInterface
{
    private $instruction;

    public function __construct(Instruction $instruction)
    {
        $this->instruction = $instruction;
    }

    function getAll()
    {
        return $this->instruction->all();
    }

    function getById($id)
    {
        return $this->instruction->where('id', $id)->get();
    }

    function create(array $attributes)
    {

        $this->instruction->create($attributes);
    }

    function update($id, array $attributes)
    {
        return $this->instruction->where('id', $id)->update($attributes);
    }

    function delete($id)
    {
        $this->instruction->where('id', $id)->delete();
    }
}