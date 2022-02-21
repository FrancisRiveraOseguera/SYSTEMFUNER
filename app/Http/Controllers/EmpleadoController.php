<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = trim($request->get('busqueda'));

        $empleado = DB::table('empleados')

            ->where('identidad', 'LIKE', '%'.$busqueda.'%')
            ->orwhere('nombres', 'LIKE', '%'.$busqueda.'%')
            ->paginate(5)-> withQueryString();

            return view('empleado/indice')
            ->with('empleado', $empleado)
            ->with('busqueda', $busqueda);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/empleado/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'identidad' => 'required|regex:([0,1]{1}[0-9]{12})|numeric|unique:empleados,identidad',
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u|max:35',
            'apellidos' => 'required|regex:/^[\pL\s\-]+$/u|max:35',
            'genero' => 'required',
            'fecha_ingreso' => 'required',
            'fecha_de_nacimiento' => 'required',
            'telefono' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric||unique:empleados,telefono',
            'contacto_de_emergencia' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric|unique:empleados,contacto_de_emergencia',
            'direccion' => 'required|max:100',
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
        
        'genero.required' => 'El campo género no puede estar vacío.',

        'fecha_ingreso.required' => 'El campo :attribute no puede estar vacío.',

        'fecha_de_nacimiento.required' => 'El campo :attribute no puede estar vacío.',
    
        'telefono.required' => 'El campo teléfono no puede estar vacío.',
        'telefono.unique' => 'El campo teléfono debe de ser único.',
        'telefono.regex' => 'El campo teléfono no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
        'telefono.numeric' => 'El campo teléfono solo acepta números.',
        'telefono.unique' => 'El campo teléfono debe de ser único.',

        'contacto_de_emergencia.required' => 'El campo teléfono de emergencia no puede estar vacío.',
        'contacto_de_emergencia.regex' => 'El campo teléfono de emergencia no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
        'contacto_de_emergencia.numeric' => 'El campo teléfono de emergencia solo acepta números.',
        'contacto_de_emergencia.unique' => 'El campo teléfono de emergencia debe de ser único.',

        'direccion.required' => 'El campo dirección  no puede estar vacío.',
        'direccion.max' => 'El campo dirección debe contener 100 letras como máximo.',


    ];

    $this->validate($request,$rules,$mensaje);

    $nuevoEmpleado= new Empleado();
    $nuevoEmpleado->identidad = $request->input('identidad');
    $nuevoEmpleado->nombres = $request->input('nombres');
    $nuevoEmpleado->apellidos = $request->input('apellidos');
    $nuevoEmpleado->genero = $request->input('genero');
    $nuevoEmpleado->direccion= $request->input('direccion'); 
    $nuevoEmpleado->fecha_ingreso = $request->input('fecha_ingreso');
    $nuevoEmpleado->fecha_de_nacimiento = $request->input('fecha_de_nacimiento');
    $nuevoEmpleado->telefono= $request->input('telefono');
    $nuevoEmpleado->contacto_de_emergencia= $request->input('contacto_de_emergencia');
    
    

        $creado = $nuevoEmpleado->save();

    if ($creado) {
        return redirect()->route('empleado.index')
            ->with('mensaje', 'El empleado fue agregado exitosamente!');
    } else {

    }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */

     //FUNCIÓN PARA VER INFORMACIÓN DEL EMPLEADO
    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleado/empleadoVer')->with('empleado', $empleado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */

    //FUNCIÓN EDITAR INFORMACIÓN DEL EMPLEADO
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleado/empleadoEditar')
            ->with('empleado', $empleado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    
    //ACTUALIZAR/VALIDAR DATOS DEL EMPLEADO
    public function update(Request $request, $id)
    {
        $rules=[
            'identidad' => 'required|regex:([0,1]{1}[0-9]{12})|numeric',
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u|max:35',
            'apellidos' => 'required|regex:/^[\pL\s\-]+$/u|max:35',
            'genero' => 'required',
            'fecha_ingreso' => 'required',
            'fecha_de_nacimiento' => 'required',
            'telefono' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric',
            'contacto_de_emergencia' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric',
            'direccion' => 'required|max:100'
        ];
    
        $mensaje=[
            'identidad.required' => 'El campo :attribute no puede estar vacío.',
            'identidad.regex' => 'El campo :attribute no cumple el formato correcto, debe de iniciar con 0 o 1 y contener 13 números.',
            'identidad.numeric' => 'El campo :attribute solo acepta números.',
            'identidad.unique' => 'El campo :attribute debe de ser único.',

            'nombres.required' => 'El campo :attribute no puede estar vacío.',
            'nombres.regex' => 'El campo :attribute solo debe contener letras.',
            'nombres.max' => 'El campo :attribute debe contener 35 letras como máximo.',

            'apellidos.required' => 'El campo :attribute no puede estar vacío.',
            'apellidos.regex' => 'El campo :attribute solo debe contener letras.',
            'apellidos.max' => 'El campo :attribute debe contener 35 letras como máximo.',
            
            'genero.required' => 'El campo género no puede estar vacío.',

            'fecha_ingreso.required' => 'El campo :attribute no puede estar vacío.',

            'fecha_de_nacimiento.required' => 'El campo :attribute no puede estar vacío.',
        
            'telefono.required' => 'El campo teléfono no puede estar vacío.',
            'telefono.unique' => 'El campo teléfono debe de ser único.',
            'telefono.regex' => 'El campo teléfono no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'telefono.numeric' => 'El campo teléfono solo acepta números.',
            'telefono.unique' => 'El campo teléfono debe de ser único.',

            'contacto_de_emergencia.required' => 'El campo teléfono de emergencia no puede estar vacío.',
            'contacto_de_emergencia.regex' => 'El campo teléfono de emergencia no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'contacto_de_emergencia.numeric' => 'El campo teléfono de emergencia solo acepta números.',
            'contacto_de_emergencia.unique' => 'El campo teléfono de emergencia debe de ser único.',

            'direccion.required' => 'El campo dirección  no puede estar vacío.',
            'direccion.max' => 'El campo dirección debe contener 100 letras como máximo.',

        ];

    $this->validate($request,$rules,$mensaje);

        $actualizar = Empleado::findOrFail($id);

        $actualizar -> identidad = $request->input('identidad');
        $actualizar -> nombres = $request->input('nombres');
        $actualizar -> apellidos = $request->input('apellidos');
        $actualizar -> genero = $request->input('genero');
        $actualizar -> fecha_ingreso = $request->input('fecha_ingreso');
        $actualizar -> fecha_de_nacimiento = $request->input('fecha_de_nacimiento');
        $actualizar -> telefono = $request->input('telefono');
        $actualizar -> contacto_de_emergencia = $request->input('contacto_de_emergencia');
        $actualizar -> direccion = $request->input('direccion');

        $actualizado = $actualizar->save();

        if ($actualizado){
            return redirect()->route('empleado.index')
                ->with('mensaje', 'Los datos del empleado han sido actualizados exitosamente');
        }else{

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy (Empleado $empleado)
    {
        //
    }
}
