<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    public function empleados(){
        return $this->hasMany(empleados::class,  'empleado_id', id);}

    public function jornadalaborals(){
            return $this->BelongsTo(jornadalaboral::class, 'id');
        }
    use HasFactory;
}
