<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    public function inventarios(){
        return $this->BelongsToMany(Inventario::class)->withTimestamps();}

    public function contadoventas(){
        return $this->hasMany(contadoventa::class);}
    use HasFactory;

    public function creditoventas(){
        return $this->hasMany(creditoventa::class);}
    use HasFactory;
}
