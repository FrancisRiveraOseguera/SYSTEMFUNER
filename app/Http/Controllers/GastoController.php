<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\App;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('Listado_gasto'),redirect()->route('madre')->with('error','No tiene acceso'));
        $fecha = Gasto::select(DB::raw('min(fecha) as inicio,max(fecha) as final'))->first();

        $busqueda = trim($request->get('busqueda'));
        $inicio = $request->get('inicio');
        $final = $request->get('final');

        if ($inicio == "") {
            $inicio = $fecha->inicio;
        }

        if ($final == "") {
            $final = $fecha->final;
        }


        $gasto = Gasto::select("gastos.id", "gastos.fecha","tipo_gasto","detalles_gasto","cantidad","empleado_id")
        ->orderby('id','DESC')
        ->join("empleados","empleado_id","=","empleados.id")
        ->whereBetween('fecha', [$inicio, $final])
        ->where(function ($query) use ($busqueda){
            $query->where('tipo_gasto', 'LIKE', '%'.$busqueda.'%')
            ->orwhere("empleados.nombres","like","%".$busqueda."%")
            ->orwhere("empleados.apellidos","like","%".$busqueda."%");
        })
        ->orderBy('fecha', 'asc')
        ->paginate(15)-> withQueryString();
        
        $suma = Gasto::select(DB::raw("sum(cantidad) as total"))
        ->join("empleados","empleado_id","=","empleados.id")
        ->whereBetween('fecha', [$inicio, $final])
        ->where(function ($query) use ($busqueda){
            $query->where('tipo_gasto', 'LIKE', '%'.$busqueda.'%')
            ->orwhere("empleados.nombres","like","%".$busqueda."%")
            ->orwhere("empleados.apellidos","like","%".$busqueda."%");
        })
        ->first();

        return view('gastos/listadoGastos')
            ->with('gasto', $gasto)
            ->with('busqueda', $busqueda)
            ->with('fecha', $fecha)
            ->with('inicio', $inicio)
            ->with('final', $final)
            ->with('suma', $suma);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('Nuevo_gasto'),redirect()->route('madre')->with('error','No tiene acceso'));
        return view('gastos/nuevoGasto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('Nuevo_gasto'),redirect()->route('madre')->with('error','No tiene acceso'));
        $rules=[
            'tipo_gasto' => 'required|regex:/^[\pL\s\-]+$/u|max:70|min:5',
            'detalles_gasto' => 'required|max:1000|min:5',
            'cantidad' => 'required|numeric|min:1|max:15000',
            'empleado_id' => 'required|exists:App\Models\Empleado,id',
            
        ];

        $mensaje=[

            'tipo_gasto.required' => 'El  tipo de gasto no puede estar vacío.',
            'tipo_gasto.regex' => 'El tipo de gasto solo debe contener letras.',
            'tipo_gasto.min' => 'El tipo de gasto debe contener al menos 5 letras.',


            'detalles_gasto.required' => 'La descripción no puede estar vacía.',
            'detalles_gasto.min' => 'La descripción debe contener al menos 5 letras.',

            'cantidad.required' => 'La cantidad total gastada no puede estar vacía.',
            'cantidad.numeric' => 'La cantidad total gastada solo acepta números.',
            'cantidad.min'  => 'La cantidad total gastada no puede ser menor a 1 lempira.',
            'cantidad.max'  => 'La cantidad total gastada no puede ser mayor a 15,000 lempiras.',

            'empleado_id.exists' => 'El responsable no ha sido seleccionado',
            'empleado_id.required' => 'El responsable no ha sido seleccionado.',

        ];

    $this->validate($request,$rules,$mensaje);

    $nuevoGasto= new Gasto();

    $nuevoGasto->tipo_gasto = $request->input('tipo_gasto');
    $nuevoGasto->detalles_gasto = $request->input('detalles_gasto');
    $nuevoGasto->cantidad = $request->input('cantidad');
    $nuevoGasto-> empleado_id = $request->input('empleado_id');
    $nuevoGasto-> fecha = $request->input('fecha');

        $creado = $nuevoGasto->save();

    if ($creado) {
        return redirect()->route('listadoGastos.index')
            ->with('mensaje', 'El gasto fue agregado exitosamente.');
    } else {

    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('Detalles_gasto'),redirect()->route('madre')->with('error','No tiene acceso'));
        $gasto = Gasto::findOrFail($id);
        return view('gastos/detallesGasto')->with('gasto', $gasto);
    }

    public function gastosPDF()
    {
        abort_if(Gate::denies('Pdf_gasto'),redirect()->route('madre')->with('error','No tiene acceso'));
        
        $gasto = Gasto::select("gastos.id", "gastos.fecha","tipo_gasto","detalles_gasto","cantidad","empleado_id")
        ->join("empleados","empleado_id","=","empleados.id")
        ->orderBy('fecha', 'asc')
        ->where('fecha', '>=', \Carbon\Carbon::now()->startOfMonth())
        -> get();

        return view ('gastos/gastosPDF')
        ->with('gasto', $gasto);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function edit(Gasto $gasto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gasto $gasto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gasto $gasto)
    {
        //
    }
}