<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{

    public function clientes(){
        return $this->BelongsTo(Cliente::class,'nombres','apellido');} 
    
    use HasFactory;
}
