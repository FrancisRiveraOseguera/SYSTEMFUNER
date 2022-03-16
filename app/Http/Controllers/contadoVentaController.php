<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\contadoventa;
use Illuminate\Support\Facades\DB;

class contadoVentaController extends Controller
{
    //función para mostrar la listado de ventas al contado y hacer las búsquedas
    public function index(Request $request){
        $busqueda = trim($request->get('busqueda'));

        $venta = contadoventa::orderby('id','DESC')

            ->where('cliente_id', 'LIKE', '%'.$busqueda.'%')
            ->orwhere('responsable', 'LIKE', '%'.$busqueda.'%')
            ->paginate(15)-> withQueryString();

            return view('VentasContado/listadoVentasContado')
            ->with('venta', $venta)
            ->with('busqueda', $busqueda);

    }//fin de la función

    //FUNCIÓN CREACIÓN DE VENTA AL CONTADO
    public function create(){
        
        return view('VentasContado.crearVentaContado');
    }//fin función create

    //FUNCIÓN DE GUARDADO Y VALIDACIÓN DE DATOS DE CREACIÓN NUEVA VENTA AL CONTADO
    public function store(Request $request){
        $rules=[
            'cliente_id' =>'required|exists:App\Models\Cliente,id',
            'responsable' =>'required|regex:/^[\pL\s\-]+$/u|max:50',
            'servicio_id' => 'required|exists:App\Models\Servicio,id',
            'cantidad_v' => 'required|numeric|min:1|max:10',
            'fecha' => 'required',
            
        ];

        $mensaje=[
            'cliente_id.exists' => 'El campo "Nombre del cliente que adquirirá la póliza de servicio funerario:" no ha sido seleccionado.',
            'cliente_id.required' => 'El Nombre del comprador de la póliza  no puede estar vacío.',

            'responsable.required' => 'El campo "Empleado responsable de la venta de la póliza: " no puede estar vacío.',
            'responsable.regex' => 'El campo "Empleado responsable de la venta de la póliza" solo puede contener letras.',
            'responsable.max' => 'El campo "Empleado responsable de la venta de la póliza" debe contener 50 letras como máximo.',

            'servicio_id.exists' => 'El campo "Póliza de servicio funerario tipo: " no ha sido seleccionado.',
            'servicio_id.required' => 'El campo Póliza de servicio funerario  no puede estar vacío.',

            'fecha.required' => 'El campo "Fecha" no puede estar vacío.',

            'cantidad_v.required'=> 'El campo "Cantidad" no puede estar vacío.',
            'cantidad_v.numeric'=> 'El campo "Cantidad debe ser un número."',
            'cantidad_v.min'=>'El campo "Cantidad" debe ser 1 como mínimo.',
            'cantidad_v.max'=>'El campo "Cantidad" debe ser 10 como máximo.',
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevaVentaContado= new contadoventa();

        $nuevaVentaContado-> cliente_id = $request->input('cliente_id');
        $nuevaVentaContado-> responsable = $request->input('responsable');
        $nuevaVentaContado-> servicio_id = $request->input('servicio_id');
        $nuevaVentaContado-> fecha = $request->input('fecha');
        $nuevaVentaContado-> cantidad_v= $request->input('cantidad_v');
        
        $creado = $nuevaVentaContado->save();

        if ($creado) {
            return redirect()->route('listadoVentas.index')
                ->with('mensaje', 'La venta se realizó correctamente.');
        }//fin if

    }//fin función store
}
