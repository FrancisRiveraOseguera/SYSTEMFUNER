<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $table = 'inventario';

    public function servicios(){
        return $this->hasMany(Servicio::class);
    }

    public function empleados(){
        return $this->BelongsTo(Empleado::class,'empleado_id','id');}
}
