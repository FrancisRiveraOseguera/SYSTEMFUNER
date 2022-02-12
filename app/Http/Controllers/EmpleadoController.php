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

            ->where('DNI_empleado', 'LIKE', '%'.$busqueda.'%')
            ->orwhere('nombres', 'LIKE', '%'.$busqueda.'%')
            ->paginate(5);

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
        'DNI_empleado' => 'required|max:13|min:13|unique:empleados,DNI_empleado',
        'nombres' => 'required|max:35',
        'apellidos' => 'required|max:35',
        'direccion' => 'required',
        'fecha_ingreso' => 'required',
        'fecha_de_nacimiento' => 'required',
        'telefono' => 'required|max:8|min:8|unique:empleados,contacto_de_emergencia',
        'contacto_de_emergencia' => 'required|max:8|min:8|unique:empleados,contacto_de_emergencia',
        
    ];
    
    
    $this->validate($request,$rules);

    $nuevoEmpleado= new Empleado();
    $nuevoEmpleado->DNI_empleado = $request->input('DNI_empleado');
    $nuevoEmpleado->nombres = $request->input('nombres');
    $nuevoEmpleado->apellidos = $request->input('apellidos');
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
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
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
