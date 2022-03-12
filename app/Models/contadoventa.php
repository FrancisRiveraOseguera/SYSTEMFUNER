<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contadoVenta extends Model
{   
    public function clientes(){
        return $this->BelongsToMany(Cliente::class)->withTimestamps();} 
    use HasFactory;
}