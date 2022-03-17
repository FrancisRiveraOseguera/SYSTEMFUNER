<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InventarioController extends Controller
{
    public function home(Request $request){
        return view('inventario/inventarioIndex');
    }

    public function index(Request $request){

        $busqueda = trim($request->get('busqueda'));

        $producto = DB::table('inventario')->orderby('id','DESC' )

            ->where('servicio_id', 'LIKE', '%'.$busqueda.'%')
            ->orwhere('responsable', 'LIKE', '%'.$busqueda.'%')
            ->paginate(15)-> withQueryString();

        return view('inventario/HistorialInventario')
        ->with('producto', $producto)
        ->with('busqueda', $busqueda);
    }
    public function create()
    {
        return view('/inventario/inventarioAgregar');
    }

    public function store(Request $request)

 
    {
        $rules=[
            'servicio_id' => 'required|numeric|exists:App\Models\Servicio,id',
            'responsable' => 'required|regex:/^[\pL\s\-]+$/u|max:35|min:5',
            'fecha_ingreso' => 'required',
            'cantidad_aIngresar' => 'required|numeric|min:1|max:25'
            
        ];

    $mensaje=[
           'servicio_id.exists' => 'El campo número de producto no existe.',
            'servicio_id.required' => 'El campo número de producto no puede estar vacío.',
            'servicio_id.numeric' => 'El campo número de producto solo debe contener números. ',
           
            
            'responsable.required' => 'El campo :attribute no puede estar vacío.',
            'responsable.regex' => 'El campo :attribute solo debe contener letras. ',
            'responsable.max' => 'El campo :attribute debe contener 35 letras como máximo.',
            'responsable.min' => 'El campo :attribute debe contener 5 letras como mínimo.',

            'fecha_ingreso.required' => 'El campo :attribute no puede estar vacío.',
    
                    
            'cantidad_aIngresar.required'  =>'El campo :attribute no puede estar vacío.',
            'cantidad_aIngresar.numeric'  =>'El campo :attribute no puede contener letras.',
            'cantidad_aIngresar.min'  =>'El campo :attribute no puede ser menor a 1 unidad',
            'cantidad_aIngresar.max'  =>'El campo :attribute no puede ser mayor a 25 unidades',


           
        ];
        
        $this->validate($request,$rules, $mensaje);
        
        $nuevoInventario = new Inventario();
        
        $nuevoInventario -> servicio_id = $request->input('servicio_id');
        $nuevoInventario -> cantidad_aIngresar= $request->input('cantidad_aIngresar');
        $nuevoInventario -> responsable = $request->input('responsable');
        $nuevoInventario -> fecha_ingreso = $request->input('fecha_ingreso');

        $creado = $nuevoInventario-> save();
       
        if ($creado){
          return redirect()->route('historialinventario.index')->with('mensaje', 'El producto fue agregado al inventario con éxito.');
        }else{

       }

    }

    //función para actualizar productos
   
    public function  verProductosEnInventario() {
        //mandarlo  a buscar 
        $inventario  = DB::table('cantidad_inventario')->get();
        return view ('inventario/listadoProductos')->with('inventario', $inventario );

    }

    
    

}