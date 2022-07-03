<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $Roles = Role::paginate(15)->withQueryString();
        return view('Roles/listadoRoles')->with('Roles', $Roles);
    }

    public function create()
    {
        //Usamos el pluck para optimizar la busqueda de estos datos
        $permissions = Permission::all()->pluck('name', 'id');
        return view('Roles/crearRoles', compact('permissions'));
    }

    public function store(Request $request)
    {

        Role::create($request->only('name'));
        
        $rules=[
            'name' => 'required|max:50|min:5|unique:roles,name',
            'descripcion'=> 'required|max:100|min:10',
            'permissions' => 'required'
        ];
        $mensaje=[
            
            'name.required' => 'El nombre del permiso no puede estar vacío.',
            'name.min' => 'El nombre del permiso es muy corto, debe escribir como mínimo 5 letras.',
            'name.unique' => 'El nombre del permiso ya existe.',

            'descripcion.required' => 'La descripción del permiso no puede estar vacío.',
            'descripcion.min' => 'La descripcion del permiso es muy corta, debe escribir como mínimo 5 letras.',

            'permissions.required' => 'Debe seleccionar al menos uno de los permisos.'
        ];

        $this->validate($request,$rules,$mensaje);

        $roles = new Role();

        $roles->name = $request->input('name');
        $roles->descripcion = $request->input('descripcion');

        $rol = $roles->save();

        if ($rol) {
           return redirect()->route('roles.index')
            ->with('mensaje', 'El rol fue agregado exitosamente!');
        }else{

        }
    }
}
