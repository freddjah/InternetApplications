<?php

namespace App\Repositories\Contracts;

interface BaseRepositoryInterface
{
    function getAll();
    function getById($id, array $relationships = []);
    function create(array $attributes);
    function update($id, array $attributes);
    function delete($id);
}