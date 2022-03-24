<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\creditoventa;
use Illuminate\Support\Facades\DB;

class creditoventaController extends Controller
{
     //FUNCIÓN CREACIÓN DE VENTA AL CRÉDITO
     public function create(){
        return view('VentasCredito.crearVentaCredito');

    }//fin función create

    //FUNCIÓN DE GUARDADO Y VALIDACIÓN DE DATOS DE CREACIÓN NUEVA VENTA AL CRÉDITO
    public function store(Request $request){
        

        $rules=[
            'cliente_id' =>'required|exists:App\Models\Cliente,id',
            'responsable' =>'required|regex:/^[\pL\s\-]+$/u|max:50',
            'servicio_id' => 'required',
            'beneficiario1' =>'required|regex:/^[\pL\s\-]+$/u|max:50',
            'telefono1' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric',
            'beneficiario2' =>'required|regex:/^[\pL\s\-]+$/u|max:50',
            'telefono2' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric',
            'beneficiario3' =>'regex:/^[\pL\s\-]+$/u|max:50',
            'telefono3' => 'regex:([2,3,8,9]{1}[0-9]{7})|numeric',
            'beneficiario4' =>'regex:/^[\pL\s\-]+$/u|max:50',
            'telefono4' => 'regex:([2,3,8,9]{1}[0-9]{7})|numeric',
            'fecha' => 'required',
            'fechaCobro' => 'required',

        ];

        $mensaje=[
            'cliente_id.exists' => 'El nombre del cliente no ha sido seleccionado.',
            'cliente_id.required' => 'El Nombre del cliente no ha sido seleccionado.',

            'responsable.required' => 'El campo "Empleado responsable de la venta" no puede estar vacío.',
            'responsable.regex' => 'El campo "Empleado responsable de la venta" solo puede contener letras.',
            'responsable.max' => 'El campo "Empleado responsable de la venta" debe contener 50 letras como máximo.',

            
            'servicio_id.required' => 'El tipo de póliza de servicio funerario no ha sido seleccionado.',

            'beneficiario1.required' => 'El campo :attribute no puede estar vacío.',
            'beneficiario1.regex' => 'El campo :attribute solo debe contener letras. ',
            'befeficiario1.max' => 'El campo :attribute debe contener 50 letras como máximo.',

            'telefono1.required' => 'El campo teléfono  del beneficiario 1 no puede estar vacío.',
            'telefono1.regex' => 'El campo teléfono del beneficiario 1 no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'telefono1.numeric' => 'El campo teléfono del beneficiario 1 solo acepta números.',

            'beneficiario2.required' => 'El campo :attribute no puede estar vacío.',
            'beneficiario2.regex' => 'El campo :attribute solo debe contener letras. ',
            'befeficiario2.max' => 'El campo :attribute debe contener 50 letras como máximo.',

            'telefono2.required' => 'El campo teléfono  del beneficiario 2 no puede estar vacío.',
            'telefono2.regex' => 'El campo teléfono del beneficiario 2 no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'telefono2.numeric' => 'El campo teléfono del beneficiario 2 solo acepta números.',

            'beneficiario3.regex' => 'El campo :attribute solo debe contener letras. ',
            'befeficiario3.max' => 'El campo :attribute debe contener 50 letras como máximo.',

            'telefono3.regex' => 'El campo teléfono del beneficiario 3 no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'telefono3.numeric' => 'El campo teléfono del beneficiario 3 solo acepta números.',

            'beneficiario4.regex' => 'El campo :attribute solo debe contener letras. ',
            'befeficiario4.max' => 'El campo :attribute debe contener 50 letras como máximo.',

            'telefono4.regex' => 'El campo teléfono del beneficiario 4 no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'telefono4.numeric' => 'El campo teléfono del beneficiario 4 solo acepta números.',

            'fecha.required' => 'El campo "Fecha" no puede estar vacío.',

            'fechaCobro.required' => 'El campo "Fecha de cobro" no puede estar vacío.',

        ];

        $this->validate($request,$rules,$mensaje);

        $nuevaVentaCredito= new creditoventa();

        $nuevaVentaCredito-> cliente_id = $request->input('cliente_id');
        $nuevaVentaCredito-> responsable = $request->input('responsable');
        $nuevaVentaCredito-> servicio_id = $request->input('servicio_id');
        $nuevaVentaCredito-> beneficiario1 = $request->input('beneficiario1');
        $nuevaVentaCredito-> telefono1 = $request->input('telefono1');
        $nuevaVentaCredito-> beneficiario2 = $request->input('beneficiario2');
        $nuevaVentaCredito-> telefono2 = $request->input('telefono2');
        $nuevaVentaCredito-> beneficiario3 = $request->input('beneficiario3');
        $nuevaVentaCredito-> telefono3 = $request->input('telefono3');
        $nuevaVentaCredito-> beneficiario4 = $request->input('beneficiario4');
        $nuevaVentaCredito-> telefono4 = $request->input('telefono4');
        $nuevaVentaCredito-> fecha = $request->input('fecha');
        $nuevaVentaCredito-> fechaCobro = $request->input('fechaCobro');

        $creado = $nuevaVentaCredito->save();
    
        if ($creado) {
            return redirect()->route('ListadoVentasCredito.VentasCredito')
                ->with('mensaje', 'La venta al crédito se realizó correctamente.');
        }//fin if



    }//fin función store
}
