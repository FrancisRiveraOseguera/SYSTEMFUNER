<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    public function inventarios(){
        return $this->BelongsToMany(Inventario::class)->withTimestamps();}    
    use HasFactory;
}
