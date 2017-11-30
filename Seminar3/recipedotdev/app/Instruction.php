<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    /**
     * Definining relationship: Instruction is connected to a specific recipe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

}
