<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jornadaLaboral extends Model
{
    public function turnos(){
        return $this->BelongsTo(Turno::class,'turno_id','id');
    }
    

    public function cargos(){
        return $this->BelongsTo(Cargo::class, 'cargo_id','id');
    }

    
    use HasFactory;
}
