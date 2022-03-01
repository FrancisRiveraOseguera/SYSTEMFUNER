<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    public function servicios(){
        return $this->hasMany(Servicio::class);
    }

    use HasFactory;
    protected $table = 'inventario';

    public function servicios(){
        return $this->hasMany(Servicio::class);
    }
}
