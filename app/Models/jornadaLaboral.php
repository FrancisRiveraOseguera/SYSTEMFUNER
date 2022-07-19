<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jornadaLaboral extends Model
{
    public function turnos(){
        return $this->hasMany(Turnos::class);}
    
    public function cargos(){
        return $this->hasMany(Cargos::class);}

    
    use HasFactory;
}
