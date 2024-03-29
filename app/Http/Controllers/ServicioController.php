<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
class ServicioController extends Controller
{

    //función para mostrar la lista de servicios y hacer las búsquedas
    public function ListaServicios(Request $request){
        abort_if(Gate::denies('Listado_servicios'),redirect()->route('madre')->with('error','No tiene acceso'));
        $busqueda = trim($request->get('busqueda'));

        $servicio = DB::table('servicios')

            ->where('tipo', 'LIKE', '%'.$busqueda.'%')
            ->orwhere('categoria', 'LIKE', '%'.$busqueda.'%')
            ->paginate(15)-> withQueryString();

            return view('serviciosfunerarios')
            ->with('servicio', $servicio)
            ->with('busqueda', $busqueda);

    }//fin de la función

    //función para crear un nuevo servicio
    public function create(){
        abort_if(Gate::denies('Nuevo_servicio'),redirect()->route('madre')->with('error','No tiene acceso'));
        return view('nuevoservicio');
    }//fin de la función


    //función para guardar los datos del formulario
    public function store(Request $request){
        abort_if(Gate::denies('Nuevo_servicio'),redirect()->route('madre')->with('error','No tiene acceso'));
        //VALIDACION de campos del formulario
        $rules= [
            'tipo' => 'required |regex:/^[\pL\s\-]+$/u|unique:servicios,tipo|min:5|max:25',
            'categoria' => 'required | alpha',
            'precio' => 'required | numeric| max:200000| min:13000',
            'detalles' => 'required | string | max:300 |min:5',
            'cuota' => 'required | numeric |min:200|max:1500',
            'prima' => 'required | numeric| max:10000|min:500'
        ] ;

        $mensaje=[
            'tipo.required'  => 'El tipo de servicio no puede estar vacío.',
            'tipo.regex'  =>'El tipo de servicio no puede contener números.',
            'tipo.unique'  =>'El tipo de servicio debe ser único.',
            'tipo.min'  =>'El tipo de servicio debe tener al menos 5 letras.',
            'tipo.max'  =>'El tipo de servicio no debe tener mas de 25 letras.',

            'categoria.required' =>'La categoría no puede estar vacía.',
            'categoria.alpha'  =>'La categoría debe ser: Adultos, Juvenil o Infantil.',

            'precio.required'  =>'El precio no puede estar vacío.',
            'precio.numeric'  =>'El precio debe contener únicamente números.',
            'precio.max'  =>'El precio no debe exceder los L.200000',
            'precio.min'  =>'El precio debe ser mayor a  L.13000',


            'detalles.required'  =>'Los detalles del servicio no pueden estar vacíos.',
            'detalles.max'  =>'Los detalles del servicio no puede contener mas de 300 letras.',
            'detalles.min'  =>'Los detalles del servicio debe tener al menos 5 letras.',

            'cuota.required'  =>'La cuota no puede estar vacía.',
            'cuota.numeric'  =>'La cuota debe contener únicamente números.',
            'cuota.min'  =>'La cuota no puede ser menor a L.200',
            'cuota.max'  =>'La cuota no puede ser mayor a L.1500',

            'prima.required'  =>'La prima no puede estar vacía.',
            'prima.numeric'  =>'La prima debe contener únicamente números.',
            'prima.min'  =>'La prima  no puede ser menor a L.500',
            'prima.max'  =>'La prima  no puede ser mayor a L.10000',

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
        return redirect()->route('Servicio.lista')->with('mensaje', 'El servicio fue agregado exitosamente.');
    }else{

    }

    }//fin funcion store


    //Función para encontrar los datos del cliente a editar
    public function editar($id){
        abort_if(Gate::denies('Editar_servicio'),redirect()->route('madre')->with('error','No tiene acceso'));
        $Servicio = Servicio::findOrFail($id);
        return view('editarServicio')
            ->with('Servicio', $Servicio);
    }

    //Función para guardar los datos actualizados
    public function update(Request $request, $id){
        abort_if(Gate::denies('Editar_servicio'),redirect()->route('madre')->with('error','No tiene acceso'));
        //Validar campos del formulario editar
        //Validar campos del formulario editar
        $rules= [
            'tipo' => 'required |regex:/^[\pL\s\-]+$/u|min:5|unique:servicios,tipo,'.$id,
            'categoria' => 'required | alpha',
            'precio' => 'required | numeric| max:200000| min:13000',
            'detalles' => 'required | string | max:300|min:5 ',
            'cuota' => 'required | numeric |min:200|max:1500',
            'prima' => 'required | numeric| max:10000| min:500'
        ] ;

        $mensaje=[
            'tipo.required'  => 'El tipo de servicio no puede estar vacío.',
            'tipo.regex'  =>'El tipo de servicio no puede contener números.',
            'tipo.min'  =>'El tipo de servicio debe tener al menos 5 letras.',
            'tipo.unique'  =>'El tipo de servicio debe ser único.',

            'categoria.required' =>'La categoría no puede estar vacía.',
            'categoria.alpha'  =>'La categoría debe ser: Adultos, Juvenil o Infantil.',

            'precio.required'  =>'El precio no puede estar vacío.',
            'precio.numeric'  =>'El precio debe contener únicamente números.',
            'precio.max'  =>'El precio no debe exceder los L.200,000.00.',
            'precio.min'  =>'El precio debe ser mayor a  L.13,000.00.',

            'detalles.required'  =>'Los :attribute del servicio no pueden estar vacíos.',
            'detalles.max'  =>'Los :attribute no pueden contener mas de 300 letras.',
            'detalles.min'  =>'Los detalles del servicio debe tener al menos 5 letras.',

            'cuota.required'  =>'La :attribute no puede estar vacía.',
            'cuota.numeric'  =>'La :attribute debe contener únicamente números.',
            'cuota.min'  =>'La :attribute no puede ser menor a L.200.',
            'cuota.max'  =>'La :attribute no puede ser mayor a L.1500.',

            'prima.required'  =>'La :attribute no puede estar vacío.',
            'prima.numeric'  =>'La :attribute debe contener únicamente números.',
            'prima.min'  =>'La :attribute no puede ser menor a L.500.00.',
            'prima.max'  =>'La :attribute no puede ser mayor a L.10,000.00.',

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
        abort_if(Gate::denies('Detalles_servicios'),redirect()->route('madre')->with('error','No tiene acceso'));
        $Servicio = Servicio::findOrFail($id);
        return view('detallesServicio')->with('Servicio', $Servicio);
    }


}
