<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\contadoventa;
use App\Models\cantidad_inventario;
use App\Models\Cliente;
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
            'responsable' =>'required|regex:/^[\pL\s\-]+$/u|max:50',
            'servicio_id' => 'required|exists:App\Models\Inventario,servicio_id',
            'cantidad_v' => 'required|numeric|min:1|max: '.$maximo,
            'fecha' => 'required',

        ];

        $mensaje=[
            'cliente_id.exists' => 'El nombre del cliente no ha sido seleccionado.',
            'cliente_id.required' => 'El Nombre del cliente  no puede estar vacío.',

            'responsable.required' => 'El campo "Empleado responsable de la venta" no puede estar vacío.',
            'responsable.regex' => 'El campo "Empleado responsable de la venta" solo puede contener letras.',
            'responsable.max' => 'El campo "Empleado responsable de la venta" debe contener 50 letras como máximo.',

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

    //función home para ver la pantalla principal de ventas
    public function home(Request $request){
        return view('VentasContado.pantallaPrincipalVentas');
    }//fin función home
}
