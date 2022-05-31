<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    public function usuarios(){
        return $this->BelongsTo(usuario::class, 'id');
    }

    public function cargos(){
        return $this->BelongsTo(Cargo::class, 'cargo_id','id');
    }
    
    use HasFactory;
}
