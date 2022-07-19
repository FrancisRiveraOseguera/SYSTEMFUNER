<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    public function jornadalaborals(){
        return $this->BelongsTo(jornadalaboral::class, 'id');
    }
    use HasFactory;
}
