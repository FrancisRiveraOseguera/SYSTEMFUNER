<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gerente = Role::create(['name' => 'Gerente', 'descripcion' => 'Acceso total al sistema']);
        $subgerente = Role::create(['name' => 'Sub-Gerente', 'descripcion' => 'Acceso limitado al sistema']);
        $developer = Role::create(['name' => 'Developer', 'descripcion' => 'Acceso total al sistema']);
    }
}
