<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $guard_name = 'api';

    public function empleados(){
        return $this->BelongsTo(Empleado::class, 'empleado_id','id');}


    public function cargos(){
            return $this->BelongsTo(Cargo::class, 'cargo_id', 'id');}
    use HasFactory;

}
