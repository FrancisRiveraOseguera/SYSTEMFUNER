<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        
        $rules=[
            'name' => 'required|max:50|min:5|unique:roles,name|regex:/^[\pL\s\-]+$/u',
            'descripcion'=> 'required|max:100|min:10|regex:/^[\pL\s\-]+$/u',
            'permissions' => 'required'
        ];
        $mensaje=[
            
            'name.required' => 'El nombre del rol no puede estar vacío.',
            'name.min' => 'El nombre del rol es muy corto, debe escribir como mínimo 5 letras.',
            'name.unique' => 'El nombre del rol ya existe.',
            'name.regex' => 'El nombre del rol solo puede contener letras',

            'descripcion.regex' => 'La descripción del rol solo puede contener letras',
            'descripcion.required' => 'La descripción del rol no puede estar vacío.',
            'descripcion.min' => 'La descripcion del rol es muy corta, debe escribir como mínimo 5 letras.',

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
