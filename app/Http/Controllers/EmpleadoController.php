<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\empleados_desactivados;
use Illuminate\Http\Request;
use App\Models\contadoventa;
use App\Models\creditoventa;
use App\Models\Cargo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('Listado_Empleados'),redirect()->route('madre')->with('error','No tiene acceso'));
        $busqueda = trim($request->get('busqueda'));

        $empleado = DB::table('empleados')

            ->where('identidad', 'LIKE', '%'.$busqueda.'%')
            ->orwhere('nombres', 'LIKE', '%'.$busqueda.'%')
            ->orderBy('nombres','asc')
            ->paginate(15)-> withQueryString();

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
        abort_if(Gate::denies('Nuevo_empleado'),redirect()->route('madre')->with('error','No tiene acceso'));
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
        abort_if(Gate::denies('Nuevo_empleado'),redirect()->route('madre')->with('error','No tiene acceso'));
        $rules=[
            'identidad' => 'required|regex:([0,1]{1}[0-9]{12})|numeric|unique:empleados,identidad',
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:35',
            'apellidos' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:35',
            'genero' => 'required',
            'fecha_ingreso' => 'required',
            'cargo_id' => 'required',
            'fecha_de_nacimiento' => 'required',
            'telefono' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric||unique:empleados,telefono',
            'contacto_de_emergencia' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric|unique:empleados,contacto_de_emergencia',
            'direccion' => 'required|min:5|max:100',
        ];

    $mensaje=[
        'identidad.required' => 'La :attribute no puede estar vacía.',
        'identidad.regex' => 'La :attribute no cumple el formato correcto, debe de iniciar con 0 o 1 y contener 13 números.',
        'identidad.numeric' => 'La :attribute solo acepta números.',
        'identidad.unique' => 'La :attribute debe de ser único.',

        'nombres.required' => 'Los nombres no pueden estar vacíos.',
        'nombres.regex' => 'Los nombres solo deben contener letras. ',
        'nombres.max' => 'Los nombres deben contener 35 letras como máximo.',
        'nombres.min' => 'El nombre es muy corto, debe contener 3 letras como mínimo.',

        'apellidos.required' => 'Los :attribute no pueden estar vacíos.',
        'apellidos.regex' => 'Los :attribute solo deben contener letras. ',
        'apellidos.max' => 'Los :attribute deben contener 35 letras como máximo.',
        'apellidos.min' => 'El apellido es muy corto, debe contener 3 letras como mínimo.',


        'genero.required' => 'El género no puede estar vacío.',

        'fecha_ingreso.required' => 'La fecha de ingreso no puede estar vacía.',
        'cargo_id.required' => 'El cargo no ha sido seleccionado',

        'fecha_de_nacimiento.required' => 'La fecha de nacimiento no puede estar vacía.',

        'telefono.required' => 'El teléfono no puede estar vacío.',
        'telefono.unique' => 'El teléfono debe de ser único.',
        'telefono.regex' => 'El teléfono no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
        'telefono.numeric' => 'El teléfono solo acepta números.',
        'telefono.unique' => 'El teléfono debe de ser único.',

        'contacto_de_emergencia.required' => 'El teléfono de emergencia no puede estar vacío.',
        'contacto_de_emergencia.regex' => 'El teléfono de emergencia no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
        'contacto_de_emergencia.numeric' => 'El teléfono de emergencia solo acepta números.',
        'contacto_de_emergencia.unique' => 'El teléfono de emergencia debe de ser único.',

        'direccion.required' => 'La dirección  no puede estar vacía.',
        'direccion.max' => 'La dirección debe contener 100 letras como máximo.',
        'direccion.min' => 'La dirección es muy corta, debe contener 5 letras como mínimo.',


    ];

    $this->validate($request,$rules,$mensaje);

    $nuevoEmpleado= new Empleado();
    $nuevoEmpleado->identidad = $request->input('identidad');
    $nuevoEmpleado->nombres = $request->input('nombres');
    $nuevoEmpleado->apellidos = $request->input('apellidos');
    $nuevoEmpleado->genero = $request->input('genero');
    $nuevoEmpleado->direccion= $request->input('direccion');
    $nuevoEmpleado->fecha_ingreso = $request->input('fecha_ingreso');
    $nuevoEmpleado->cargo_id = $request->input('cargo_id');
    $nuevoEmpleado->fecha_de_nacimiento = $request->input('fecha_de_nacimiento');
    $nuevoEmpleado->telefono= $request->input('telefono');
    $nuevoEmpleado->contacto_de_emergencia= $request->input('contacto_de_emergencia');



        $creado = $nuevoEmpleado->save();

    if ($creado) {
        return redirect()->route('empleado.index')
            ->with('mensaje', 'El empleado fue agregado exitosamente.');
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
        abort_if(Gate::denies('Detalles_empleados'),redirect()->route('madre')->with('error','No tiene acceso'));
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
        abort_if(Gate::denies('Editar_empleado'),redirect()->route('madre')->with('error','No tiene acceso'));
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
        abort_if(Gate::denies('Editar_empleado'),redirect()->route('madre')->with('error','No tiene acceso'));
        $rules=[
            'identidad' => 'required|regex:([0,1]{1}[0-9]{12})|numeric|unique:empleados,identidad,'.$id,
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:35',
            'apellidos' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:35',
            'genero' => 'required',
            'fecha_ingreso' => 'required',
            'cargo_id' => 'required',
            'fecha_de_nacimiento' => 'required',
            'telefono' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric|unique:empleados,telefono,'.$id,
            'contacto_de_emergencia' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric|unique:empleados,contacto_de_emergencia,'.$id,
            'direccion' => 'required|max:100'
        ];

        $mensaje=[
            'identidad.required' => 'La :attribute no puede estar vacía.',
            'identidad.regex' => 'La :attribute no cumple el formato correcto, debe de iniciar con 0 o 1 y contener 13 números.',
            'identidad.numeric' => 'La :attribute solo acepta números.',
            'identidad.unique' => 'La :attribute debe de ser única.',

            'nombres.required' => 'Los nombres no pueden estar vacíos.',
            'nombres.regex' => 'Los nombres solo deben contener letras.',
            'nombres.max' => 'Los nombres deben contener 35 letras como máximo.',
            'nombres.min' => 'El nombre es muy corto, debe contener 3 letras como mínimo.',

            'apellidos.required' => 'Los :attribute no pueden estar vacíos.',
            'apellidos.regex' => 'Los :attribute solo deben contener letras.',
            'apellidos.max' => 'Los :attribute deben contener 35 letras como máximo.',
            'apellidos.min' => 'El apellido es muy corto, debe contener 3 letras como mínimo.',

            'genero.required' => 'El género no puede estar vacío.',

            'fecha_ingreso.required' => 'La fecha de ingreso no puede estar vacía.',
            'cargo_id.required' => 'El cargo no ha sido seleccionado',

            'fecha_de_nacimiento.required' => 'La fecha de nacimiento no puede estar vacía.',

            'telefono.required' => 'El teléfono no puede estar vacío.',
            'telefono.unique' => 'El teléfono debe de ser único.',
            'telefono.regex' => 'El teléfono no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'telefono.numeric' => 'El teléfono solo acepta números.',
            'telefono.unique' => 'El teléfono debe de ser único.',

            'contacto_de_emergencia.required' => 'El teléfono de emergencia no puede estar vacío.',
            'contacto_de_emergencia.regex' => 'El teléfono de emergencia no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'contacto_de_emergencia.numeric' => 'El teléfono de emergencia solo acepta números.',
            'contacto_de_emergencia.unique' => 'El teléfono de emergencia debe de ser único.',

            'direccion.required' => 'La dirección  no puede estar vacía.',
            'direccion.max' => 'La dirección debe contener 100 letras como máximo.',

        ];

    $this->validate($request,$rules,$mensaje);

        $actualizar = Empleado::findOrFail($id);

        $actualizar -> identidad = $request->input('identidad');
        $actualizar -> nombres = $request->input('nombres');
        $actualizar -> apellidos = $request->input('apellidos');
        $actualizar -> genero = $request->input('genero');
        $actualizar -> fecha_ingreso = $request->input('fecha_ingreso');
        $actualizar -> cargo_id = $request->input('cargo_id');
        $actualizar -> fecha_de_nacimiento = $request->input('fecha_de_nacimiento');
        $actualizar -> telefono = $request->input('telefono');
        $actualizar -> contacto_de_emergencia = $request->input('contacto_de_emergencia');
        $actualizar -> direccion = $request->input('direccion');

        $actualizado = $actualizar->save();

        if ($actualizado){
            return redirect()->route('empleado.index')
                ->with('mensaje', 'Los datos del empleado han sido actualizados exitosamente.');
        }else{

        }
    }


    //FUNCIÓN PARA DESACTIVAR A UN EMPLEADO
    public function desactivar ($id)
    {
        abort_if(Gate::denies('Desactivar_empleados'),redirect()->route('madre')->with('error','No tiene acceso'));
        $empleado = Empleado::findOrFail($id);

        $empleado->estado = 0;

        $estado = $empleado->save();

        if ($estado) {
            return redirect()->route('empleado.index')
                ->with('mensaje', 'El empleado ha sido desactivado exitosamente.');
        }
    }

    //FUNCION PARA VER EL LISTADO DE LOS CLIENTES DESACTIVADOS
    public function listadoEmpleadosDesactivados(Request $request)
    {
        abort_if(Gate::denies('Empleados_desactivados'),redirect()->route('madre')->with('error','No tiene acceso'));
        $busqueda = trim($request->get('busqueda'));

        $empleados1 = DB::table('empleados')
            ->select('*')
            ->where("estado", "=", 0);

        $empleados2 = $empleados1
            ->where('nombres', 'LIKE', '%'.$busqueda.'%')
            ->orWhere('identidad', 'LIKE', '%'.$busqueda.'%');

        $empleados = $empleados2
            ->where("estado", "=", 0)
            ->orderBy('nombres','asc')
            ->paginate(15)-> withQueryString();

        return view('empleado.listadoEmpleadosDesactivados')
            ->with('empleados', $empleados)
            ->with('busqueda', $busqueda);
    }

    //FUNCIÓN PARA VER LA INFORMACIÓN DEL EMPLEADO DESACTIVADO
    public function verEmpleadoDesactivado($id){
        abort_if(Gate::denies('Detalles_empleados_desactivados'),redirect()->route('madre')->with('error','No tiene acceso'));
        $empleado = Empleado::findOrFail($id);
        return view('empleado.verEmpleadoDesactivado')->with('empleado', $empleado);
    }

    //FUNCIÓN PARA HABILITAR UN EMPLEADO DESACTIVADO
    public function habilitarEmpleadoDesactivado($id)
    {
        abort_if(Gate::denies('Habilitar_empleados'),redirect()->route('madre')->with('error','No tiene acceso'));
        $empleado = Empleado::findOrFail($id);

        $empleado->estado = 1;

        $estado = $empleado->save();

        if ($estado) {
            return redirect()->route('listado.empleados.desactivados')
                ->with('mensaje', 'El empleado ha sido habilitado exitosamente.');
        }
    }

    //funcion para crear constancia de trabajo
    public function pdfConstancia($id){
        abort_if(Gate::denies('Pdf_constancia_trabajo'),redirect()->route('madre')->with('error','No tiene acceso'));
        $empleado = Empleado::findOrFail($id);
        return view('empleado.PDFconstanciaTrabajo')->with('empleado', $empleado);
    }

}