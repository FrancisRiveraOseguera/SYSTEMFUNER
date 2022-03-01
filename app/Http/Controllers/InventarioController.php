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

        $producto = DB::table('inventario')

            ->where('servicio_id', 'LIKE', '%'.$busqueda.'%')
            ->orwhere('responsable', 'LIKE', '%'.$busqueda.'%')
            ->paginate(5)-> withQueryString();

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
            'responsable' => 'required|regex:/^[\pL\s\-]+$/u|max:35|min:10',
            'fecha_ingreso' => 'required',
            'cantidad_aIngresar' => 'required|numeric|min:1|max:100'
            
        ];

    $mensaje=[
           'servicio_id.exists' => 'El  servicio debe ser un servicio válido',
            'servicio_id.required' => 'El campo tipo de servicio no puede estar vacío.',
            'servicio_id.numeric' => 'El campo tipo de servicio solo debe contener números. ',
           

            'responsable.required' => 'El campo :attribute no puede estar vacío.',
            'responsable.regex' => 'El campo :attribute solo debe contener letras. ',
            'responsable.max' => 'El campo :attribute debe contener 35 letras como máximo.',
            'responsable.min' => 'El campo :attribute debe contener 10 letras como mínimo.',

            'fecha_ingreso.required' => 'El campo :attribute no puede estar vacío.',
    
                    
            'cantidad_aIngresar.required'  =>'El campo :attribute no puede estar vacío.',
            'cantidad_aIngresar.numeric'  =>'El campo :attribute no puede contener letras.',
            'cantidad_aIngresarl.min'  =>'El campo :attribute no puede ser menor a 0 unidad',
            


           
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

<<<<<<< HEAD


=======


>>>>>>> 52aa7cea7f06f390433cd1643cefff418deae5b1
    //función para actualizar productos

   
    public function  verProductosEnInventario() {
        //mandarlo  a buscar 
        $inventario  = Inventario::select('servicio_id','categoria','precio', 'tipo',DB::raw('sum(cantidad_aIngresar) as cantidad'))
        ->join('servicios','servicios.id', '=', 'servicio_id')->groupby('servicio_id')->get();
        return view ('inventario/listadoProductos')->with('inventario', $inventario );
    }

    
    

}