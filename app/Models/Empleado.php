<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    public function contadoventas(){
        return $this->hasMany(contadoventas::class);}
    use HasFactory;
}
