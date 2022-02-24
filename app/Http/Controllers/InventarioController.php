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

            ->where('tipo', 'LIKE', '%'.$busqueda.'%')
            ->orwhere('categoria', 'LIKE', '%'.$busqueda.'%')
            ->paginate(5)-> withQueryString();

        return view('inventario/listadoProductos')
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
            'tipo' => 'required|regex:/^[\pL\s\-]+$/u|max:25|unique:inventario,tipo',
            'categoria' => 'required',
            'descripcion' => 'required|regex:/^[\pL\s\-]+$/u|max:65',
            'responsable' => 'required|regex:/^[\pL\s\-]+$/u|max:35|min:10',
            'fecha_ingreso' => 'required',
            'cantidad' => 'required|numeric|min:1|max:500'
            
        ];

    $mensaje=[

            'tipo.required' => 'El campo tipo de servicio no puede estar vacío.',
            'tipo.regex' => 'El campo tipo de servicio solo debe contener letras. ',
            'tipo.max' => 'El campo tipo de servicio debe contener 25 letras como máximo.',

            'categoria.required' => 'El campo categoría no puede estar vacío.',

            'descripcion.required'  =>'El campo :attribute no puede estar vacío.',
            'descripcion.max'  =>'El campo :attribute no puede contener mas de 65 letras.',

            'responsable.required' => 'El campo :attribute no puede estar vacío.',
            'responsable.regex' => 'El campo :attribute solo debe contener letras. ',
            'responsable.max' => 'El campo :attribute debe contener 35 letras como máximo.',
            'responsable.min' => 'El campo :attribute debe contener 10 letras como mínimo.',

            'fecha_ingreso.required' => 'El campo :attribute no puede estar vacío.',
    
            'cantidad.required'  =>'El campo :attribute no puede estar vacío.',
            'cantidad.numeric'  =>'El campo :attribute no puede contener letras.',
            'cantidad.min'  =>'El campo :attribute no puede ser menor a 1 unidad',
            'cantidad.max'  =>'El campo :attribute no puede ser mayor a 500 unidades',


           
        ];
        
        $this->validate($request,$rules, $mensaje);
        
        $nuevoInventario = new Inventario();
        
        $nuevoInventario -> tipo = $request->input('tipo');
        $nuevoInventario -> descripcion = $request->input('descripcion');
        $nuevoInventario -> cantidad = $request->input('cantidad');
        $nuevoInventario -> responsable = $request->input('responsable');
        $nuevoInventario -> categoria = $request->input('categoria');
        $nuevoInventario -> fecha_ingreso = $request->input('fecha_ingreso');

        $creado = $nuevoInventario-> save();
       
        if ($creado){
          return redirect()->route('inventario.index')->with('mensaje', 'El producto fue agregado al inventario con éxito.');
        }else{

       }

    }

    //función para mostrar los detalles de productos en inventario
    public function show($id){
        $Inventario = Inventario::findOrFail($id);
        return view('inventario/detallesInventario')->with('Inventario', $Inventario);
    }

}