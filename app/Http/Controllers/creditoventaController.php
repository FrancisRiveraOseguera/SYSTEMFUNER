<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\empleado;
use App\Models\creditoventa;
use Illuminate\Support\Facades\DB;

class creditoventaController extends Controller
{

    //FUNCIÓN PARA VER EL LISTADO DE LAS VENTAS AL CRÉDITO
    public function index(Request $request){
        $busqueda = trim($request->get('busqueda'));

        $ventas = creditoventa::orderby('creditoventas.id','DESC')

            ->select("creditoventas.id", "creditoventas.created_at","cliente_id","servicio_id","empleado_id", 'estado',
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
        $venta = creditoventa::findOrFail($id);
        return view('VentasCredito.detallesVentaCredito')->with('venta', $venta);
    }//FIN DE LA FUNCIÓN


    public function pdf($id){
        $venta = creditoventa::findOrFail($id);
        return view('VentasCredito.crearPDFventaCredito')->with('creditoventa', $venta);
     }

     //FUNCIÓN CREACIÓN DE VENTA AL CRÉDITO
     public function create($ident = null){
        $clientes = Cliente::where('id',$ident)->first();
        return view('VentasCredito.crearVentaCredito')->with('ident',$clientes);;

    }//fin función create

    //FUNCIÓN DE GUARDADO Y VALIDACIÓN DE DATOS DE CREACIÓN NUEVA VENTA AL CRÉDITO
    public function store(Request $request){


        $rules=[
            'cliente_id' =>'required|exists:App\Models\Cliente,id',
            'empleado_id' => 'required|exists:App\Models\Empleado,id',
            'servicio_id' => 'required',
            'beneficiario1' =>'required|regex:/^[\pL\s\-]+$/u|max:50',
            'telefono1' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric',
            'beneficiario2' =>'required|regex:/^[\pL\s\-]+$/u|max:50',
            'telefono2' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric',
            'beneficiario3' =>'nullable|regex:/^[\pL\s\-]+$/u|max:50',
            'telefono3' => 'nullable|regex:([2,3,8,9]{1}[0-9]{7})|numeric',
            'beneficiario4' =>'nullable|regex:/^[\pL\s\-]+$/u|max:50',
            'telefono4' => 'nullable|regex:([2,3,8,9]{1}[0-9]{7})|numeric',
            'fecha' => 'required',

        ];

        $mensaje=[
            'cliente_id.exists' => 'El nombre del cliente no ha sido seleccionado.',
            'cliente_id.required' => 'El Nombre del cliente no ha sido seleccionado.',

            'empleado_id.required' => 'El campo Empleado responsable de la venta no ha sido seleccionado.',


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

            'telefono2.required' => 'El campo teléfono del beneficiario 2 no puede estar vacío.',
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

            'fecha.required' => 'El campo Fecha de venta no puede estar vacío.',



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
    public function marcarServicio($id){

        $marcar = creditoventa::findOrFail($id);
        $marcar -> estado = 0;
        $marcar ->save();

        if ($marcar) {
            return redirect()->route('ventasCredito.index')
                ->with('mensaje', 'El servicio se ha sido marcado como usado.');
        }
    }

    //Función para ver las ventas que han sido marcadas como servicio usado
    public function serviciosUsados(Request $request){
        $busqueda = trim($request->get('busqueda'));

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
            ->with('ventas', $ventas)
            ->with('busqueda', $busqueda);
    }
}
