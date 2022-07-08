<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = trim($request->get('busqueda'));

        $permisos = Permission::orderby('permissions.id','DESC')

        ->where('name', 'LIKE', '%'.$busqueda.'%')
        ->paginate(15)-> withQueryString();

        return view('permisos/listadopermisos')
        ->with('permisos', $permisos)
        ->with('busqueda', $busqueda);
    }

    public function create()
    {
        return view('permisos/crearpermiso');
    }

    public function store(Request $request, $perm=-1)
    {

        $rules=[
            'name' => 'required|max:31|min:5|unique:permissions,name',
            'descripcion'=> 'required|max:83',
        ];
        $mensaje=[
            'name.required' => 'El nombre del permiso no puede estar vacío.',
            'name.max' => 'El nombre del permiso es muy extenso.',
            'name.min' => 'El nombre del permiso es muy corto, debe escribir como mínimo 5 letras.',
            'name.unique' => 'El nombre del permiso ya existe.',

            'descripcion.required' => 'La descripción del permiso no puede estar vacía.',
            'descripcion.max' => 'La descripción del permiso es muy extensa.',
        ];
        $this->validate($request,$rules,$mensaje);

        $permisos = new Permission();

        $permisos->descripcion = $request->input('descripcion');
        $permisos->name = $request->input('name');

        $permi = $permisos->save();

        if ($permi) {
                return redirect()->route('permisos.lista')
                ->with('mensaje', 'El permiso fue agregado exitosamente.');
        } else {

        }
    }

    //FUNCIÓN PARA EDITAR LOS PERMISOS
    public function editar($id)
    {
        $permisos = Permission::findOrFail($id);
        return view('permisos/permisoEditar')
            ->with('permisos', $permisos);
    }


      //Función para guardar los datos actualizados AL EDITAR UN PERMISO
      public function update(Request $request, $id){
        //Validar campos del formulario editar
        $rules= [
            'name' => 'required|max:31|min:5|unique:permissions,name,'.$id,
            'descripcion'=> 'required|max:83',
            
        ] ;

        $mensaje=[
            'name.required' => 'El nombre del permiso no puede estar vacío.',
            'name.max' => 'El nombre del permiso es muy extenso.',
            'name.min' => 'El nombre del permiso es muy corto, debe escribir como mínimo 5 letras.',
            'name.unique' => 'El nombre del permiso ya existe.',

            'descripcion.required' => 'La descripción del permiso no puede estar vacía.',
            'descripcion.max' => 'La descripción del permiso es muy extensa.',
        ];

        $this->validate($request,$rules, $mensaje);

        $actualizarPermiso = Permission::findOrFail($id);

        //Recuperación de los datos guardados
        $actualizarPermiso->name= $request->input('name');
        $actualizarPermiso -> descripcion = $request->input('descripcion');
    

        $actualizado = $actualizarPermiso-> save();

        //Comprobar si fue actualizado
        if ($actualizado){
            return redirect()->route('permisos.lista')->with('mensaje',
                'Los datos del permiso han sido actualizados exitosamente.');
        }
    }

    public function destroy($id){
        Permission::destroy($id);

        return redirect()->route('permisos.lista')
            ->with('mensaje', 'El permiso fue eliminado exitosamente.');
    }
}
