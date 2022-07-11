<?php

namespace App\Http\Controllers;

use App\Models\contadoVenta;
use App\Models\Servicio;
use App\Models\creditoventa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DetalleServicioController extends Controller
{
    //función para mostrar el listado de ventas al contado de cada tipo de servicio 
    public function index($id){
        abort_if(Gate::denies('Servicio_contado_venta'),redirect()->route('madre')->with('error','No tiene acceso'));
        $servicio = Servicio::findOrFail($id);
        $ventas = contadoVenta::orderby('contado_ventas.id','DESC')
        ->select("contado_ventas.id", "contado_ventas.created_at","cliente_id","servicio_id","empleado_id","cantidad_v")
        ->join("clientes","cliente_id","=","clientes.id")
        ->join("empleados","empleado_id","=","empleados.id")
        ->where('contado_ventas.servicio_id', $servicio->id)
        ->paginate(15)-> withQueryString();

        return view('listadoVentaTipoServicio')
        ->with('ventas', $ventas)
        ->with('servicio', $servicio);

    }//fin de la función//

    //función para mostrar el listado de ventas al crédito de cada tipo de servicio
    public function creditoVentas($id){
        abort_if(Gate::denies('Servicio_crédito_venta'),redirect()->route('madre')->with('error','No tiene acceso'));
        $servicio = Servicio::findOrFail($id);
        $ventas = creditoventa::orderby('creditoventas.id','DESC')
            ->select("creditoventas.id", "creditoventas.created_at","cliente_id","servicio_id","empleado_id",
                DB::raw('SUM(cuota) AS cuota'))
            ->join("clientes","cliente_id","=","clientes.id")
            ->leftjoin("pagos","pagos.venta_id","=","creditoventas.id")
            ->groupby("creditoventas.id")
            ->where('creditoventas.servicio_id', $servicio->id)
            ->paginate(15)-> withQueryString();
        return view('VentasCreditoDelServicio')
            ->with('ventas', $ventas)
            ->with('servicio', $servicio);
    }//fin de la función//
}