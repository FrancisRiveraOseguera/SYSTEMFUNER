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
            'identidad' => 'required|regex:([0,1]{1}[0-9]{12})|numeric|unique:usuarios,identidad',
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u|max:35',
            'apellidos' => 'required|regex:/^[\pL\s\-]+$/u|max:35',
            'telefono' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric|unique:usuarios,telefono',
            'direccion' => 'required|max:100',
            'cargo' => 'required|regex:/^[\pL\s\-]+$/u|min:5|max:50|unique:usuarios,cargo',
            'password' => 'required|regex:/^[\pL\s\-]+$/u|min:8|max:20',
        ];

        $mensaje=[
            'identidad.required' => 'El campo :attribute no puede estar vacío.',
            'identidad.regex' => 'El campo :attribute no cumple el formato correcto, debe de iniciar con 0 o 1 y contener 13 números.',
            'identidad.numeric' => 'El campo :attribute solo acepta números.',
            'identidad.unique' => 'El campo :attribute debe de ser único.',

            'nombres.required' => 'El campo :attribute no puede estar vacío.',
            'nombres.regex' => 'El campo :attribute solo debe contener letras. ',
            'nombres.max' => 'El campo :attribute debe contener 35 letras como máximo.',

            'apellidos.required' => 'El campo :attribute no puede estar vacío.',
            'apellidos.regex' => 'El campo :attribute solo debe contener letras. ',
            'apellidos.max' => 'El campo :attribute debe contener 35 letras como máximo.',

            'telefono.required' => 'El campo :attribute no puede estar vacío.',
            'telefono.unique' => 'El campo :attribute debe de ser único.',
            'telefono.regex' => 'El campo :attribute no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'telefono.numeric' => 'El campo :attribute solo acepta números.',

            'direccion.required' => 'El campo :attribute no puede estar vacío.',
            'direccion.max' => 'El campo :attribute debe contener 100 letras como máximo.',

            'cargo.required'  => 'El campo :attribute no puede estar vacío.',

            'password.required'  => 'El campo :attribute no puede estar vacío.',
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevoUser= new Usuario();


        $nuevoUser->identidad = $request->input('identidad');
        $nuevoUser->nombres = $request->input('nombres');
        $nuevoUser->apellidos = $request->input('apellidos');
        $nuevoUser->telefono = $request->input('telefono');
        $nuevoUser->direccion = $request->input('direccion');
        $nuevoUser->cargo = $request->input('cargo');
        $nuevoUser->password = $request->input('password');

        $creado = $nuevoUser->save();

        if ($creado) {
            if($creado){
                return redirect()->route('listado.clientes')->with('mensaje', 'El usuario fue registrado exitosamente.');
            }else{
            }
            }
    }
}
