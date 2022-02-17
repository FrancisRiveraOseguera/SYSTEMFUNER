<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Facades\DB;
class ServicioController extends Controller
{

    //función para mostrar la lista de servicios y hacer las búsquedas
    public function ListaServicios(Request $request){
        $busqueda = trim($request->get('busqueda'));

        $servicio = DB::table('servicios')

            ->where('tipo', 'LIKE', '%'.$busqueda.'%')
            ->orwhere('categoria', 'LIKE', '%'.$busqueda.'%')
            ->paginate(5);

            return view('serviciosfunerarios')
            ->with('servicio', $servicio)
            ->with('busqueda', $busqueda);

    }//fin de la función

    //función para crear un nuevo servicio
    public function create(){
        return view('nuevoservicio');
    }//fin de la función


    //función para guardar los datos del formulario
    public function store(Request $request){
        //VALIDACION de campos del formulario
        $rules= [
            'tipo' => 'required |regex:/^[\pL\s\-]+$/u|unique:servicios,tipo|min:5|max:25',
            'categoria' => 'required | alpha',
            'precio' => 'required | numeric| max:200000| min:13000',
            'detalles' => 'required | string | max:300 ',
            'cuota' => 'required | numeric |min:200|max:1500',
            'prima' => 'required | numeric| max:10000| min:500'
        ] ;

        $mensaje=[
            'tipo.required'  => 'El campo :attribute no puede estar vacío.',
            'tipo.regex'  =>'El campo :attribute no puede contener números.',
            'tipo.unique'  =>'El campo :attribute debe ser único.',
            'tipo.min'  =>'El campo :attribute debe tener al menos de 5 letras.',
            'tipo.max'  =>'El campo :attribute no debe tener mas de 25 letras.',

            'categoria.required' =>'El campo :attribute no puede estar vacío.',
            'categoria.alpha'  =>'El campo :attribute debe ser: Adultos, Juvenil o Infantil.',

            'precio.required'  =>'El campo :attribute no puede estar vacío.',
            'precio.numeric'  =>'El campo :attribute debe contener únicamente números.',
            'precio.max'  =>'El campo :attribute no debe exceder los L.200000',
            'precio.min'  =>'El campo :attribute debe ser mayor a  L.13000',


            'detalles.required'  =>'El campo :attribute del servicio no puede estar vacío.',
            'detalles.max'  =>'El campo :attribute no puede contener mas de 300 letras.',

            'cuota.required'  =>'El campo :attribute no puede estar vacío.',
            'cuota.numeric'  =>'El campo :attribute no puede contener letras.',
            'cuota.min'  =>'El campo :attribute no puede ser menor a L.200',
            'cuota.max'  =>'El campo :attribute no puede ser mayor a L.1500',

            'prima.required'  =>'El campo :attribute no puede estar vacío.',
            'prima.numeric'  =>'El campo :attribute no puede contener letras.',
            'prima.min'  =>'El campo :attribute no puede ser menor a L.500',
            'prima.max'  =>'El campo :attribute no puede ser mayor a L.10000',

        ];

        $this->validate($request,$rules, $mensaje);
        //creación de objeto del modelo
        $nuevoServicio = new Servicio();
        //recuperación y asignación de los datos que vienen con la petición
        $nuevoServicio -> tipo = $request->input('tipo');
        $nuevoServicio -> categoria= $request->input('categoria');
        $nuevoServicio -> precio = $request->input('precio');
        $nuevoServicio -> detalles = $request->input('detalles');
        $nuevoServicio -> cuota = $request->input('cuota');
        $nuevoServicio -> prima = $request->input('prima');

        $creado = $nuevoServicio-> save();
       //comprobar si fue creado
       if ($creado){
         return redirect()->route('Servicio.lista')->with('mensaje', 'El servicio fue agregado con éxito.');
       }else{

       }

    }//fin funcion store


    //Función para encontrar los datos del cliente a editar
    public function editar($id){
        $Servicio = Servicio::findOrFail($id);
        return view('editarServicio')
            ->with('Servicio', $Servicio);
    }

    //Función para guardar los datos actualizados
    public function update(Request $request, $id){
        //Validar campos del formulario editar
        //Validar campos del formulario editar
        $rules= [
            'tipo' => 'required |regex:/^[\pL\s\-]+$/u|min:5',
            'categoria' => 'required | alpha',
            'precio' => 'required | numeric| max:200000| min:13000',
            'detalles' => 'required | string | max:300 ',
            'cuota' => 'required | numeric |min:200|max:1500',
            'prima' => 'required | numeric| max:10000| min:500'
        ] ;

        $mensaje=[
            'tipo.required'  => 'El campo :attribute no puede estar vacío.',
            'tipo.regex'  =>'El campo :attribute no puede contener números.',
            'tipo.min'  =>'El campo :attribute debe tener al menos de 5 letras.',

            'categoria.required' =>'El campo :attribute no puede estar vacío.',
            'categoria.alpha'  =>'El campo :attribute debe ser: Adultos, Juvenil o Infantil.',

            'precio.required'  =>'El campo :attribute no puede estar vacío.',
            'precio.numeric'  =>'El campo :attribute debe contener únicamente números.',
            'precio.max'  =>'El campo :attribute no debe exceder los L.200000.',
            'precio.min'  =>'El campo :attribute debe ser mayor a  L.13000.',

            'detalles.required'  =>'El campo :attribute del servicio no puede estar vacío.',
            'detalles.max'  =>'El campo :attribute no puede contener mas de 300 letras.',

            'cuota.required'  =>'El campo :attribute no puede estar vacío.',
            'cuota.numeric'  =>'El campo :attribute no puede contener letras.',
            'cuota.min'  =>'El campo :attribute no puede ser menor a L.200.',
            'cuota.max'  =>'El campo :attribute no puede ser mayor a L.1500.',

            'prima.required'  =>'El campo :attribute no puede estar vacío.',
            'prima.numeric'  =>'El campo :attribute no puede contener letras.',
            'prima.min'  =>'El campo :attribute no puede ser menor a L.500.',
            'prima.max'  =>'El campo :attribute no puede ser mayor a L.10000.',

        ];

        $this->validate($request,$rules, $mensaje);

        $actualizarServicio = Servicio::findOrFail($id);

        //Recuperación de los datos guardados
        $actualizarServicio -> tipo = $request->input('tipo');
        $actualizarServicio -> categoria= $request->input('categoria');
        $actualizarServicio -> precio = $request->input('precio');
        $actualizarServicio -> detalles = $request->input('detalles');
        $actualizarServicio -> cuota = $request->input('cuota');
        $actualizarServicio -> prima = $request->input('prima');

        $actualizado = $actualizarServicio-> save();

        //Comprobar si fue actualizado
        if ($actualizado){
            return redirect()->route('Servicio.lista')->with('mensaje',
                'Los datos del servicio han sido actualizados exitosamente.');
        }
    }

    //Función para ver los datos de un servicio
    public function show($id){
        $Servicio = Servicio::findOrFail($id);
        return view('detallesServicio')->with('Servicio', $Servicio);
    }


}
