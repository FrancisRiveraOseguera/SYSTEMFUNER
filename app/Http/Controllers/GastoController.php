<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = trim($request->get('busqueda'));

        $gasto = Gasto::orderby('gastos.id','DESC')
            ->where('tipo_gasto', 'LIKE', '%'.$busqueda.'%')
            ->orwhere('fecha', 'LIKE', '%'.$busqueda.'%')
            ->paginate(15)-> withQueryString();

        return view('gastos/listadoGastos')
            ->with('gasto', $gasto)
            ->with('busqueda', $busqueda);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $rules=[
            'tipo_gasto' => 'required|regex:/^[\pL\s\-]+$/u|max:70',
            'detalles_gasto' => 'required|max:1000',
            'cantidad' => 'required|numeric|min:1',
            'empleado_id' => 'required|exists:App\Models\Empleado,id',
            
        ];

        $mensaje=[

            'tipo_gasto.required' => 'El campo tipo de gasto no puede estar vacío.',
            'tipo_gasto.regex' => 'El campo tipo de gasto solo debe contener letras.',


            'detalles_gasto.required' => 'El campo descripción del gasto no puede estar vacío.',

            'cantidad.required' => 'El campo cantidad no puede estar vacío.',
            'cantidad.numeric' => 'El campo cantidad solo acepta números.',
            'cantidad.min'  => 'El campo cantidad no puede ser menor a 1.',

            'empleado_id.exists' => 'El campo responsable no ha sido seleccionado',
            'empleado_id.required' => 'El campo responsable no ha sido seleccionado.',

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
            ->with('mensaje', 'El gasto fue agregado exitosamente!');
    } else {

    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function show(Gasto $gasto)
    {
        //
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
