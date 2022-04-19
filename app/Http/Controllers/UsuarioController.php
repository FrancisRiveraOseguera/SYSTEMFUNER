<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function create(){
        return view ('Usuarios.CrearUsuario');
    }

    public function store(Request $request)
    {
        //Validación de los datos
        $rules=[
            'correo' => 'required|max:35|min:8|unique:usuarios,correo|email:filter',
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u|max:35',
            'apellidos' => 'required|regex:/^[\pL\s\-]+$/u|max:35',
            'nameUser' => 'required|max:20|unique:usuarios,nameUser',
            'cargo' => 'required|regex:/^[\pL\s\-]+$/u|min:5|max:50|unique:usuarios,cargo',
            'password' => 'required|regex:/^[\pL\s\-]+$/u|min:8|max:20',
        ];

        $mensaje=[
            'correo.required' => 'El campo :attribute no puede estar vacío.',
            'correo.regex' => 'El campo :attribute no cumple el formato correcto.',
            'correo.unique' => 'El campo :attribute debe de ser único.',

            'nombres.required' => 'El campo :attribute no puede estar vacío.',
            'nombres.regex' => 'El campo :attribute solo debe contener letras. ',
            'nombres.max' => 'El campo :attribute debe contener 35 letras como máximo.',

            'apellidos.required' => 'El campo :attribute no puede estar vacío.',
            'apellidos.regex' => 'El campo :attribute solo debe contener letras. ',
            'apellidos.max' => 'El campo :attribute debe contener 35 letras como máximo.',

            'correo.required' => 'El campo :attribute no puede estar vacío.',
            'correo.max' => 'El campo :attribute debe contener 35 letras como máximo.',
            'correo.min' => 'El campo :attribute debe contener 8 letras como mínimo.',

            'cargo.required'  => 'El campo :attribute no puede estar vacío.',

            'password.required'  => 'El campo :attribute no puede estar vacío.',
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevoUser= new Usuario();


        $nuevoUser->correo = $request->input('correo');
        $nuevoUser->nombres = $request->input('nombres');
        $nuevoUser->apellidos = $request->input('apellidos');
        $nuevoUser->nameUser = $request->input('nameUser');
        $nuevoUser->cargo = $request->input('cargo');
        $nuevoUser->password = $request->input('password');

        $creado = $nuevoUser->save();

        if ($creado) {
            if($creado){
                /*Se debe cambiar la ruta de redirección, la dejé en el listado de clientes porque no existe nada para usuarios */
                return redirect()->route('listado.clientes')->with('mensaje', 'El usuario fue registrado exitosamente.');
            }else{
            }
            }
    }
}
