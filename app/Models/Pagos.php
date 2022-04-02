<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{

    public function clientes(){
        return $this->BelongsTo(Cliente::class,'nombres','apellido');
    } 
    
    public function servicios(){
        return $this->BelongsTo(Servicio::class,'tipo','precio','cuota','prima');
    } 

    public function ventas(){
        return $this->BelongsTo(creditoventa::class,'venta_id','id');
    }
    
    use HasFactory;
}
