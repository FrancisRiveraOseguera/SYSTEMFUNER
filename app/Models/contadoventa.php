<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contadoVenta extends Model
{   
    public function clientes(){
        return $this->BelongsTo(Cliente::class,'cliente_id','id');} 
    use HasFactory;

    public function empleados(){
        return $this->BelongsTo(Empleado::class,'empleado_id','id');}

     public function servicios(){
            return $this->BelongsTo(Servicio::class,'servicio_id','id');}
}