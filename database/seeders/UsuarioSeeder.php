<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'nombres' => 'Admin',
            'apellidos' => 'Admin',
            'correo' => 'funeraria@gmail.com',
            'nameUser' => 'Admin',
            'cargo' => 'Admin',
            'password' => bcrypt('12345678')
        ]);
    }
}
