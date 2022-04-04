<?php

namespace App\Http\Controllers;

use App\Models\Pagos;
use App\Models\creditoventa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // función para crear un nuevo pago 
    public function create($id)
    {
        $venta = creditoventa::select("creditoventas.id", "creditoventas.created_at","cliente_id","servicio_id","responsable",
        DB::raw('SUM(cuota) AS cuota'))
        ->leftjoin("pagos","pagos.venta_id","=","creditoventas.id")
        ->groupby("creditoventas.id")
        ->findOrFail($id);
        
        return view('pagos.nuevoPago')->with('venta',$venta);
    }
    //fin de la función crear un nuevo pago
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function pdf($id){
        $pago = Pagos::findOrFail($id);

        $total = Pagos::select(DB::raw('servicios.precio -  SUM(pagos.cuota) - servicios.prima as total'))
        ->join('creditoventas','pagos.venta_id','creditoventas.id')
        ->join('servicios','servicios.id', 'creditoventas.servicio_id')
        ->where('pagos.venta_id', $pago->venta_id)
        ->groupby('venta_id')
        ->first();

        return view('pagos.recibodepagoPDF')->with('Pagos', $pago)->with('total', $total);
     }

     //función de las validaciones de nuevo pago 
    public function store(Request $request, $id)
    {
        $venta = creditoventa::select("creditoventas.id", "creditoventas.created_at","cliente_id","servicio_id","responsable",
        DB::raw('SUM(cuota) AS cuota'))
        ->leftjoin("pagos","pagos.venta_id","=","creditoventas.id")
        ->groupby("creditoventas.id")
        ->findOrFail($id);

        $valor = $venta->servicios->precio - $venta->servicios->prima - $venta->cuota;

        if($valor<$venta->servicios->cuota){
            $rules= [
                'pago' => 'required|min:1|numeric|max:'.$valor,
            ];
    
            $mensaje=[
                'pago.required'=>'El campo cantidad a pagar no puede estar vacío.',
                'pago.min'=>'El campo cantidad a pagar debe ser mayor a 0.',
                'pago.max'=>'El campo cantidad a pagar debe ser inferior a '.number_format($valor,2).'.',
                'pago.numeric'=>'El campo cantidad a pagar debe de ser numérico.',
            ];
        }else{
            $rules= [
                'pago' => 'required|min:'.$venta->servicios->cuota.'|numeric|max:'.$valor,
            ];
    
            $mensaje=[
                'pago.required'=>'El campo cantidad a pagar no puede estar vacío.',
                'pago.min'=>'El campo cantidad a pagar debe ser mayor o igual a '.number_format($venta->servicios->cuota,2).'.',
                'pago.max'=>'El campo cantidad a pagar debe ser inferior a '.number_format($valor,2).'.',
                'pago.numeric'=>'El campo cantidad a pagar debe de ser numérico.',
            ];
        }

        $this->validate($request,$rules,$mensaje);

        $nuevopago = new Pagos();

        $nuevopago->venta_id = $id;
        $nuevopago->cuota = $request->input('pago');

        $creado = $nuevopago-> save();
       //comprobar si fue creado
       if ($creado){
         return redirect()->route('pagodecuota.pdf', $nuevopago->id);
       }
    }
    //fin de la función de validaciones de nuevo pago 

    public function historialPagos(){

        $cuotas = Pagos::orderby('id','DESC' )
            ->paginate(15)-> withQueryString();

        return view('pagos.historialPagos')
        ->with('cuotas', $cuotas);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */

    public function pagoDetalles($id){

        $pagos = creditoventa::findOrFail($id);
        $cuotas = Pagos::where('venta_id', $id)->get();
        return view('pagos.detallesCuotas')
        ->with('pagos',$pagos)->with('cuotas',$cuotas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagos $pagos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagos $pagos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagos $pagos)
    {
        //
    }
}
