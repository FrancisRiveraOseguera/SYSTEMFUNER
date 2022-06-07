<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\contadoventa;
use App\Models\empleado;
use App\Models\creditoventa;
use App\Models\cantidad_inventario;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class contadoVentaController extends Controller
{
    public function  ventas() {
        //mandarlo  a buscar 
        $ventas  = DB::table('todaslasventas')->get();
        return view ('VentasContado/listadoVentas')->with('ContadoVenta',  $ventas);

    }

    //public function sumitas(){
    //   $ventascredito  = DB::select(' SELECT  SUM((select precio from servicios where id = servicio_id)) as Totalventascredito FROM creditoventas
    //WHERE MONTH(created_at)=MONTH(NOW())');
    //return view('VentasContado/listadoVentas')->with('venti',$ventascredito);

    //}


    //función para mostrar  listado de ventas al contado y hacer las búsquedas
    public function index(Request $request){
        $busqueda = trim($request->get('busqueda'));

        $venta = contadoventa::orderby('contado_ventas.id','DESC')

        ->select("contado_ventas.id", "contado_ventas.created_at","cliente_id","servicio_id","empleado_id")
        ->join("clientes","cliente_id","=","clientes.id")
        ->where("clientes.nombres","like","%".$busqueda."%")
        ->orwhere("clientes.apellidos","like","%".$busqueda."%")
        ->join("empleados","empleado_id","=","empleados.id")
        ->orwhere("empleados.nombres","like","%".$busqueda."%")
        ->orwhere("empleados.apellidos","like","%".$busqueda."%")
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

    public function pdftodaslasventas(){
        $ventas  = DB::table('todaslasventas')->get() ;
        return view ('VentasContado/pdflistadoVentas')->with('ContadoVenta', $ventas );
     }

    //FUNCIÓN CREACIÓN DE VENTA AL CONTADO
    public function create($ident = null){
        $clientes = Cliente::where('id',$ident)->first();
        return view('VentasContado.crearVentaContado')->with('ident',$clientes);

    }//fin función create

    //FUNCIÓN DE GUARDADO Y VALIDACIÓN DE DATOS DE CREACIÓN NUEVA VENTA AL CONTADO
    public function store(Request $request){
        $cantidad_inventario = DB::table('cantidad_inventario')
        ->where('servicio_id', $request->input('servicio_id'))->select('cantidad')->first();

        $maximo = 0;

      if($request->input('servicio_id') != ""){
      $maximo = $cantidad_inventario->cantidad;
      }

        $rules=[
            'cliente_id' =>'required|exists:App\Models\Cliente,id',
            'empleado_id' => 'required|exists:App\Models\Empleado,id',
            'servicio_id' => 'required|exists:App\Models\Inventario,servicio_id',
            'cantidad_v' => 'required|numeric|min:1|max: '.$maximo,
            'fecha' => 'required',

        ];

        $mensaje=[
            'cliente_id.exists' => 'El nombre del cliente no ha sido seleccionado.',
            'cliente_id.required' => 'El Nombre del cliente no ha sido seleccionado.',

            'empleado_id.required' => 'El campo "Empleado responsable de la venta" no ha sido seleccionado',
           

            'servicio_id.exists' => 'El campo "Póliza de servicio funerario tipo: " no existe en inventario.',
            'servicio_id.required' => 'El tipo de póliza de servicio funerario no ha sido seleccionado.',

            'fecha.required' => 'El campo "Fecha" no puede estar vacío.',

            'cantidad_v.required'=> 'El campo "Cantidad" no puede estar vacío.',
            'cantidad_v.numeric'=> 'El campo "Cantidad" debe ser un número.',
            'cantidad_v.max'=>'La cantidad a comprar excede la cantidad disponible en inventario.',
            'cantidad_v.min'=> 'La cantidad a comprar debe ser 1 como mínimo.'
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevaVentaContado= new contadoventa();

        $nuevaVentaContado-> cliente_id = $request->input('cliente_id');
        $nuevaVentaContado-> empleado_id = $request->input('empleado_id');
        $nuevaVentaContado-> servicio_id = $request->input('servicio_id');
        $nuevaVentaContado-> fecha = $request->input('fecha');
        $nuevaVentaContado-> cantidad_v= $request->input('cantidad_v');

        $creado = $nuevaVentaContado->save();
        return redirect()->route('contadoVenta.pdf', $nuevaVentaContado->id);



    }//fin función store

    //función home para ver la pantalla principal de ventas
    public function home(Request $request){
        return view('VentasContado.pantallaPrincipalVentas');
    }//fin función home
}
