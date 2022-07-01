<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    public function index()
    {
        $permisos = Permission::paginate(15)-> withQueryString();
        return view('permisos/listadopermisos')->with('permisos', $permisos);
    }

    public function create()
    {
        return view('permisos/crearpermiso');
    }

    public function store(Request $request, $perm=-1)
    {

        $rules=[
            'name' => 'required|max:100|unique:permissions,name',
            'descripcion'=> 'required|max:191',
        ];
        $mensaje=[
            'name.required' => 'El nombre del permiso no puede estar vacío.',
            'name.max' => 'El nombre del permiso es muy extenso.',
            'name.unique' => 'El nombre del permiso ya existe.',

            'descripcion.required' => 'La descripción del permiso no puede estar vacío.',
            'descripcion.max' => 'La descripcion del permiso es muy extensa.',
        ];
        $this->validate($request,$rules,$mensaje);

        $permisos = new Permission();

        $permisos->descripcion = $request->input('descripcion');
        $permisos->name = $request->input('name');

        $permi = $permisos->save();

        if ($permi) {
                return redirect()->route('permisos.lista')
                ->with('mensaje', 'El permiso fue agregado exitosamente!');
        } else {

        }
    }
}
