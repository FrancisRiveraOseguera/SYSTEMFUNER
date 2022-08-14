<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class InventarioController extends Controller
{
    public function home(Request $request){
        abort_if(Gate::denies('Listado_inventario'),redirect()->route('madre')->with('error','No tiene acceso'));
        return view('inventario/inventarioIndex');
    }

    public function index(Request $request){
        abort_if(Gate::denies('Listado_inventario'),redirect()->route('madre')->with('error','No tiene acceso'));
        $busqueda = trim($request->get('busqueda'));

        $producto = DB::table('historial_inventarios')->orderby('id','DESC' )
            ->select('historial_inventarios.id','historial_inventarios.servicio_id', 'historial_inventarios.empleado_id',
                'historial_inventarios.cantidad_aIngresar', 'historial_inventarios.fecha_ingreso', 'empleados.nombres', 'empleados.apellidos')
            ->join("empleados","empleado_id","=","empleados.id")
            ->where('servicio_id', 'LIKE', '%'.$busqueda.'%')
            ->orwhere('empleados.nombres', 'LIKE', '%'.$busqueda.'%')
            ->orwhere("empleados.apellidos","LIKE","%".$busqueda."%")
            ->paginate(15)-> withQueryString();

        return view('inventario/HistorialInventario')
        ->with('producto', $producto)
        ->with('busqueda', $busqueda);
    }
    public function create()
    {
        abort_if(Gate::denies('Nuevo_inventario'),redirect()->route('madre')->with('error','No tiene acceso'));
        return view('/inventario/inventarioAgregar');
    }

    public function store(Request $request)


    {
        abort_if(Gate::denies('Nuevo_inventario'),redirect()->route('madre')->with('error','No tiene acceso'));
        $rules=[
            'servicio_id' => 'required|numeric|exists:App\Models\Servicio,id',
            'empleado_id' => 'required|exists:App\Models\Empleado,id',
            'fecha_ingreso' => 'required',
            'cantidad_aIngresar' => 'required|numeric|min:1|max:25'

        ];

    $mensaje=[
           'servicio_id.exists' => 'El producto no ha sido seleccionado.',
            'servicio_id.required' => 'El número de producto no puede estar vacío.',
            'servicio_id.numeric' => 'El número de producto solo debe contener números. ',

            'empleado_id.required' => 'El empleado responsable de la venta no ha sido seleccionado.',

            'fecha_ingreso.required' => 'La fecha de ingreso no puede estar vacía.',

            'cantidad_aIngresar.required'  =>'La cantidad a ingresar no puede estar vacía.',
            'cantidad_aIngresar.numeric'  =>'La cantidad a ingresar no puede contener letras.',
            'cantidad_aIngresar.min'  =>'La cantidad a ingresar no puede ser menor a 1 unidad',
            'cantidad_aIngresar.max'  =>'La cantidad a ingresar no puede ser mayor a 25 unidades',



        ];

        $this->validate($request,$rules, $mensaje);

        $nuevoInventario = new Inventario();

        $nuevoInventario -> servicio_id = $request->input('servicio_id');
        $nuevoInventario -> cantidad_aIngresar= $request->input('cantidad_aIngresar');
        $nuevoInventario -> empleado_id = $request->input('empleado_id');
        $nuevoInventario -> fecha_ingreso = $request->input('fecha_ingreso');

        $creado = $nuevoInventario-> save();

        if ($creado){
          return redirect()->route('historialinventario.index')->with('mensaje', 'El producto fue agregado al inventario exitosamente.');
        }else{

       }

    }

    //función para actualizar productos

    public function  verProductosEnInventario() {
        //mandarlo  a buscar
        abort_if(Gate::denies('Cantidad_inventario'),redirect()->route('madre')->with('error','No tiene acceso'));
        $inventario  = DB::table('cantidad_inventario')->get();
        return view ('inventario/listadoProductos')->with('inventario', $inventario );

    }




}
