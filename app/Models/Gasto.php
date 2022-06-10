<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    
    use HasFactory;

    public function empleados(){
        return $this->BelongsTo(Empleado::class,'empleado_id','id');
    }

}
