<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{   
    public function empleados(){
        return $this->BelongsTo(empleado::class, 'empleado_id','id');}
    use HasFactory;
    
}
