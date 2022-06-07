<?php

namespace App\Http\Controllers;
use App\Models\Servicio;
use App\Models\creditoventa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleServicioController extends Controller
{
    //función para mostrar el listado de ventas de cada tipo de servicio
    public function index($id){
        $servicio = Servicio::findOrFail($id);
        $ventas = Servicio::with('contadoventas')->where('id', $id)->get();
        return view('listadoVentaTipoServicio')
        ->with('ventas', $ventas)
        ->with('servicio', $servicio);

    }//fin de la función//

    //función para mostrar el listado de ventas al crédito de cada tipo de servicio
    public function creditoVentas($id){
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
