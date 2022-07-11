<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        abort_if(Gate::denies('Listado_roles'),redirect()->route('madre')->with('error','No tiene acceso'));
        $Roles = Role::paginate(15)->withQueryString();
        return view('Roles/listadoRoles')->with('Roles', $Roles);
    }

    public function create()
    {
        abort_if(Gate::denies('Nuevo_roles'),redirect()->route('madre')->with('error','No tiene acceso'));
        //Usamos el pluck para optimizar la busqueda de estos datos
        $permissions = Permission::all()->pluck('name', 'id');
        return view('Roles/crearRoles', compact('permissions'));
    }

    public function store(Request $request, $rol=-1)
    {
        abort_if(Gate::denies('Nuevo_roles'),redirect()->route('madre')->with('error','No tiene acceso'));
        $rules=[
            'name' => 'required|max:15|min:5|unique:roles,name|regex:/^[\pL\s\-]+$/u',
            'descripcion'=> 'required|max:70|min:10|regex:/^[\pL\s\-]+$/u',
            'permissions' => 'required'
        ];
        $mensaje=[

            'name.required' => 'El nombre del rol no puede estar vacío.',
            'name.min' => 'El nombre del rol es muy corto, debe escribir como mínimo 5 letras.',
            'name.unique' => 'El nombre del rol ya existe.',
            'name.regex' => 'El nombre del rol solo puede contener letras.',

            'descripcion.regex' => 'La descripción del rol solo puede contener letras.',
            'descripcion.required' => 'La descripción del rol no puede estar vacío.',
            'descripcion.min' => 'La descripción del rol es muy corta, debe escribir como mínimo 10 letras.',
            'permissions.required' => 'Debe seleccionar al menos uno de los permisos.'
        ];

        $this->validate($request,$rules,$mensaje);

        $roles = new Role();

        $roles->name = $request->input('name');
        $roles->descripcion = $request->input('descripcion');
        $roles->syncPermissions($request->input('permissions', []));

        $rol = $roles->save();

        if ($rol) {
           return redirect()->route('roles.index')
            ->with('mensaje', 'El rol fue agregado exitosamente.');
        }else{

        }
    }

    //Función para editar el rol
    public function editar($id){
        abort_if(Gate::denies('Editar_roles'),redirect()->route('madre')->with('error','No tiene acceso'));
        $role1 = Role::findOrFail($id);
        $permissions = Permission::all()->pluck('name', 'id');
        $role = $role1->load('permissions');
        //dd('Srole');

        return view('Roles.editarRol', compact('role', 'permissions'));
    }

    public function update(Request $request, $id){
        abort_if(Gate::denies('Editar_roles'),redirect()->route('madre')->with('error','No tiene acceso'));
        $rules=[
            'name' => 'required|max:15|min:5|regex:/^[\pL\s\-]+$/u|unique:roles,name,'.$id,
            'descripcion'=> 'required|max:70|min:10|regex:/^[\pL\s\-]+$/u',
            'permissions' => 'required'
        ];
        $mensaje=[

            'name.required' => 'El nombre del rol no puede estar vacío.',
            'name.min' => 'El nombre del rol es muy corto, debe escribir como mínimo 5 letras.',
            'name.unique' => 'El nombre del rol ya existe.',
            'name.regex' => 'El nombre del rol solo puede contener letras',

            'descripcion.regex' => 'La descripción del rol solo puede contener letras',
            'descripcion.required' => 'La descripción del rol no puede estar vacío.',
            'descripcion.min' => 'La descripción del rol es muy corta, debe escribir como mínimo 10 letras.',

            'permissions.required' => 'Debe seleccionar al menos uno de los permisos.'
        ];

        $this->validate($request,$rules,$mensaje);

        $actualizarRol = Role::findOrFail($id);

        $actualizarRol->name = $request->input('name');
        $actualizarRol->descripcion = $request->input('descripcion');
        $actualizarRol->syncPermissions($request->input('permissions', []));

        $rolActualizado = $actualizarRol->save();

        if ($rolActualizado) {
            return redirect()->route('roles.index')
                ->with('mensaje', 'El rol fue actualizado exitosamente.');
        }
    }

    public function destroy($id){
        abort_if(Gate::denies('Eliminar_rol'),redirect()->route('madre')->with('error','No tiene acceso'));
        Role::destroy($id);

        return redirect()->route('roles.index')
            ->with('mensaje', 'El rol fue eliminado exitosamente.');
    }
}
