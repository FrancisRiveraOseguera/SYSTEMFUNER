<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\empleado;
use App\Models\creditoventa;
use App\Models\Inventario;
use App\Models\cantidad_inventario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class creditoventaController extends Controller
{

    //FUNCIÓN PARA VER EL LISTADO DE LAS VENTAS AL CRÉDITO
    public function index(Request $request){
        abort_if(Gate::denies('Listado_ventas_crédito'),redirect()->route('madre')->with('error','No tiene acceso'));

        $busqueda = trim($request->get('busqueda'));

        $ventas = creditoventa::orderby('creditoventas.id','DESC')

            ->select("creditoventas.id", "creditoventas.created_at","cliente_id","servicio_id","empleado_id", 'estado', 'creditoventas.fecha',
                DB::raw('SUM(cuota) AS cuota'))
            ->join("clientes","cliente_id","=","clientes.id")
            ->leftjoin("pagos","pagos.venta_id","=","creditoventas.id")
            ->where("clientes.nombres","like","%".$busqueda."%")
            ->orwhere("clientes.apellidos","like","%".$busqueda."%")
            ->groupby("creditoventas.id")
            ->paginate(15)-> withQueryString();

        return view('VentasCredito.listadoVentasCredito')
            ->with('ventas', $ventas)
            ->with('busqueda', $busqueda);

    }//FIN DE LA FUNCIÓN

    //FUNCIÓN PARA VER LOS DETALLES DE LA VENTA AL CRÉDITO
    public function show($id)
    {
        abort_if(Gate::denies('Detalles_ventas_crédito'),redirect()->route('madre')->with('error','No tiene acceso'));
        $venta = creditoventa::findOrFail($id);

        if (! is_null(DB::table('cantidad_inventario')->where('cantidad_inventario.servicio_id', '=', $venta->servicio_id)->first())){
            $servicio = DB::table('cantidad_inventario')->where('cantidad_inventario.servicio_id', '=', $venta->servicio_id)->first();
        }else{
            $servicio = 0;
        }

        $serviciosEnInventario = DB::table('cantidad_inventario')
            ->select('cantidad_inventario.servicio_id', 'cantidad_inventario.cantidad', 'servicios.tipo')
            ->join('servicios', 'cantidad_inventario.servicio_id', '=', 'servicios.id')
            ->get();

        $servicioTipo = DB::table('cantidad_inventario')->select('cantidad_inventario.servicio_id', 'servicios.tipo')
            ->join('servicios', 'cantidad_inventario.servicio_id', '=', 'servicios.id')
            ->where('cantidad_inventario.servicio_id', '=', $venta->servicio_id)
            ->first();

        return view('VentasCredito.detallesVentaCredito')
            ->with('venta', $venta)
            ->with('servicio', $servicio)
            ->with('serviciosEnInventario', $serviciosEnInventario)
            ->with('servicioTipo', $servicioTipo);
    }//FIN DE LA FUNCIÓN


    public function pdf($id){
        abort_if(Gate::denies('Pdf_ventas_crédito'),redirect()->route('madre')->with('error','No tiene acceso'));
        $venta = creditoventa::findOrFail($id);
        return view('VentasCredito.crearPDFventaCredito')->with('creditoventa', $venta);
     }

     //FUNCIÓN CREACIÓN DE VENTA AL CRÉDITO
     public function create($ident = null){
        abort_if(Gate::denies('Nueva_venta_crédito'),redirect()->route('madre')->with('error','No tiene acceso'));
        $clientes = Cliente::where('id',$ident)->first();
        return view('VentasCredito.crearVentaCredito')->with('ident',$clientes);;

    }//fin función create

    //FUNCIÓN DE GUARDADO Y VALIDACIÓN DE DATOS DE CREACIÓN NUEVA VENTA AL CRÉDITO
    public function store(Request $request){
        abort_if(Gate::denies('Nueva_venta_crédito'),redirect()->route('madre')->with('error','No tiene acceso'));

        $rules=[
            'cliente_id' =>'required|exists:App\Models\Cliente,id',
            'empleado_id' => 'required|exists:App\Models\Empleado,id',
            'servicio_id' => 'required',
            'beneficiario1' =>'required|regex:/^[\pL\s\-]+$/u|max:50',
            'telefono1' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric',
            'beneficiario2' =>'required|regex:/^[\pL\s\-]+$/u|max:50|min:5',
            'telefono2' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric',
            'beneficiario3' =>'nullable|regex:/^[\pL\s\-]+$/u|max:50|min:5',
            'telefono3' => 'nullable|regex:([2,3,8,9]{1}[0-9]{7})|numeric',
            'beneficiario4' =>'nullable|regex:/^[\pL\s\-]+$/u|max:50|min:5',
            'telefono4' => 'nullable|regex:([2,3,8,9]{1}[0-9]{7})|numeric',
            'fecha' => 'required',

        ];

        $mensaje=[
            'cliente_id.exists' => 'El nombre del cliente no ha sido seleccionado.',
            'cliente_id.required' => 'El nombre del cliente no ha sido seleccionado.',

            'empleado_id.exists' => 'El empleado responsable de la venta no ha sido seleccionado.',


            'servicio_id.required' => 'El tipo de póliza de servicio funerario no ha sido seleccionado.',

            'beneficiario1.required' => 'El beneficiario N° 1 no puede estar vacío.',
            'beneficiario1.regex' => 'El beneficiario N° 1 solo debe contener letras. ',
            'befeficiario1.max' => 'El beneficiario N° 1 debe contener 50 letras como máximo.',
            'befeficiario1.min' => 'El beneficiario N° 1 debe contener 5 letras como mínimo.',


            'telefono1.required' => 'El teléfono  del beneficiario N° 1 no puede estar vacío.',
            'telefono1.regex' => 'El teléfono del beneficiario  N° 1 no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'telefono1.numeric' => 'El teléfono del beneficiario N° 1 solo acepta números.',

            'beneficiario2.required' => 'El beneficiario N° 2 no puede estar vacío.',
            'beneficiario2.regex' => 'El beneficiario N° 2 solo debe contener letras. ',
            'befeficiario2.max' => 'El beneficiario N° 2 debe contener 50 letras como máximo.',
            'befeficiario2.min' => 'El beneficiario N° 2 debe contener 5 letras como mínimo.',


            'telefono2.required' => 'El teléfono del beneficiario N° 2 no puede estar vacío.',
            'telefono2.regex' => 'El teléfono del beneficiario N° 2 no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'telefono2.numeric' => 'El teléfono del beneficiario N° 2 solo acepta números.',

            'beneficiario3.regex' => 'El beneficiario N° 3 solo debe contener letras. ',
            'befeficiario3.max' => 'El beneficiario N° 3 debe contener 50 letras como máximo.',
            'befeficiario3.min' => 'El beneficiario N° 3 debe contener 5 letras como mínimo.',


            'telefono3.regex' => 'El teléfono del beneficiario N° 3 no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'telefono3.numeric' => 'El teléfono del beneficiario N° 3 solo acepta números.',

            'beneficiario4.regex' => 'El beneficiario N° 4 solo debe contener letras. ',
            'befeficiario4.max' => 'El beneficiario N° 4 debe contener 50 letras como máximo.',
            'befeficiario4.min' => 'El beneficiario N° 4 debe contener 5 letras como mínimo.',


            'telefono4.regex' => 'El teléfono del beneficiario N° 4 no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'telefono4.numeric' => 'El teléfono del beneficiario N° 4 solo acepta números.',

            'fecha.required' => 'La fecha de venta no puede estar vacía.',



        ];

        $this->validate($request,$rules,$mensaje);

        $nuevaVentaCredito= new creditoventa();

        $nuevaVentaCredito-> cliente_id = $request->input('cliente_id');
        $nuevaVentaCredito-> empleado_id = $request->input('empleado_id');
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
            return redirect()->route('creditoVenta.pdf', $nuevaVentaCredito->id);

        }//fin if



    }//fin función store

    //Función para marcar servicio usado
    public function marcarServicio($id, $idServicio){

        $marcar = creditoventa::findOrFail($id);

        if (! is_null($restarInventario = Inventario::where('inventario.servicio_id', '=', $idServicio)
            ->where('cantidad_aIngresar', '>', 0)->first())){
            if ($restarInventario -> cantidad_aIngresar > 0){
                $restarInventario -> cantidad_aIngresar -= 1;
                $restarInventario -> save();

                $marcar -> estado = 0;
                $marcar -> save();

                return redirect()->route('ventasCredito.index')
                    ->with('mensaje', 'El servicio se ha sido marcado como usado.');

            }
            else{
                $restarInventario -> cantidad = 0;
            }
        }
    }

    //Función para ver las ventas que han sido marcadas como servicio usado
    public function serviciosUsados(Request $request){
        abort_if(Gate::denies('Servicios_usados'),redirect()->route('madre')->with('error','No tiene acceso'));
        $ventas = creditoventa::orderby('creditoventas.id','DESC')
            ->select("creditoventas.id", "creditoventas.created_at","cliente_id","servicio_id","empleado_id", 'estado',
                DB::raw('SUM(cuota) AS cuota'))
            ->where('estado', '=', 0)
            ->join("clientes","cliente_id","=","clientes.id")
            ->leftjoin("pagos","pagos.venta_id","=","creditoventas.id")
            ->where("creditoventas.estado","=",0)
            ->groupby("creditoventas.id")
            ->paginate(15)-> withQueryString();

        return view('VentasCredito.listadoServiciosUsados')
            ->with('ventas', $ventas);
    }

    //Función para ver las ventas que han sido marcadas como servicio usado con saldo de cero
    public function serviciosUsadosSaldo0(Request $request){
        abort_if(Gate::denies('servicios_usados_saldo_0'),redirect()->route('madre')->with('error','No tiene acceso'));
        $ventas = creditoventa::orderby('creditoventas.id','DESC')
            ->select("creditoventas.id", "creditoventas.created_at","cliente_id","servicio_id","empleado_id", 'estado',
                DB::raw('SUM(cuota) AS cuota'))
            ->where('estado', '=', 0)
            ->join("clientes","cliente_id","=","clientes.id")
            ->leftjoin("pagos","pagos.venta_id","=","creditoventas.id")
            ->where("creditoventas.estado","=",0)
            ->groupby("creditoventas.id")
            ->paginate(15)-> withQueryString();

        return view('VentasCredito.listadoServiciosUsadosSaldo0')
            ->with('ventas', $ventas);
    }

     //FUNCIÓN PARA VER EL LISTADO DE Los clientes deudores
    public function deudor(Request $request){
        abort_if(Gate::denies('Listado_deudores'),redirect()->route('madre')->with('error','No tiene acceso'));

        $busqueda = trim($request->get('busqueda'));

        $ventas = DB::table("clientes_deudores")
            ->orwhere("nombres","like","%".$busqueda."%")
            ->orwhere("apellidos","like","%".$busqueda."%")
            ->orderby('id','DESC')
            ->paginate(15)-> withQueryString();

        return view('clientesDeudores.listadoClientesDeudores')
            ->with('ventas', $ventas)
            ->with('busqueda', $busqueda);

    }//FIN DE LA FUNCIÓN

    //Función para ver el reporte en PDF de los clientes deudores
    public function deudoresPDF(){
        abort_if(Gate::denies('PDF_deudores'),redirect()->route('madre')->with('error','No tiene acceso'));

        $deudores = DB::table("clientes_deudores")
            ->select('*')
            ->orderby('id','DESC')
            ->get();

        return view('clientesDeudores.deudoresPDF')->with('deudores', $deudores);
    }
}
