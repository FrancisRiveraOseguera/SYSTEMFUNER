<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    public function usuarios(){
        return $this->BelongsTo(usuario::class, 'id');}
    
    use HasFactory;
}
