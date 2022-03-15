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
            ->orwhere('empleado_id', 'LIKE', '%'.$busqueda.'%')
            ->paginate(15)-> withQueryString();

            return view('VentasContado/listadoVentasContado')
            ->with('venta', $venta)
            ->with('busqueda', $busqueda);

    }//fin de la función

    public function show($id)
     {
        $venta = contadoventa::findOrFail($id);
        return view('VentasContado.detallesVentaContado')->with('contadoventa', $venta);
     }
    
    public function pdf($id){
        $venta = contadoventa::findOrFail($id);
        return view('VentasContado.crearPDF')->with('contadoventa', $venta);
    }


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
            return redirect()->route('listadoVentas.index')
                ->with('mensaje', 'La venta se realizó correctamente.');
        }//fin if

    }//fin función store

    //función home para ver la pantalla principal de ventas
    public function home(Request $request){
        return view('VentasContado.pantallaPrincipalVentas');
    }
}
