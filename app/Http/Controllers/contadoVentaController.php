<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\contadoventa;

class contadoVentaController extends Controller
{

    //FUNCIÓN CREACIÓN DE VENTA AL CONTADO
    public function create(){
        return view('VentasContado.crearVentaContado');
    }//fin función create

    //FUNCIÓN DE GUARDADO Y VALIDACIÓN DE DATOS DE CREACIÓN NUEVA VENTA AL CONTADO
    public function store(Request $request){
        $rules=[
            'cliente_id' =>'required|exists:App\Models\Cliente,id',
            'empleado_id' =>'required|exists:App\Models\Empleado,id',
            'servicio_id' => 'required|exists:App\Models\Servicio,id',
            'fecha' => 'required',
        ];

        $mensaje=[
            'cliente_id.exists' => 'El campo "Nombre del cliente que adquirirá la póliza de servicio funerario:" no ha sido seleccionado.',
            'cliente_id.required' => 'El Nombre del comprador de la póliza  no puede estar vacío.',

            'empleado_id.exists' => 'El campo "Empleado responsable de la venta de la póliza: " no ha sido seleccionado.',
            'empleado_id.required' => 'El campo Encargado de la venta de la póliza no puede estar vacío.',

            'servicio_id.exists' => 'El campo "Póliza de servicio funerario tipo: " no ha sido seleccionado.',
            'servicio_id.required' => 'El campo Póliza de servicio funerario  no puede estar vacío.',

            'fecha.required' => 'El campo "Fecha" no puede estar vacío.',
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevaVentaContado= new contadoventa();

        $nuevaVentaContado-> cliente_id = $request->input('cliente_id');
        $nuevaVentaContado-> empleado_id = $request->input('empleado_id');
        $nuevaVentaContado-> servicio_id = $request->input('servicio_id');
        $nuevaVentaContado-> fecha = $request->input('fecha');
       
        $creado = $nuevaVentaContado->save();

        if ($creado) {
            return redirect()->route('ListadoVentasContado.VentasContado')
                ->with('mensaje', 'La venta se realizó correctamente.');
        }//fin if

    }//fin función store
}
