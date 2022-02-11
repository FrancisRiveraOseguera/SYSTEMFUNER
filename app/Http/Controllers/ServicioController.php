<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
class ServicioController extends Controller
{

    //función para mostrar la lista de servicios y hacer las búsquedas
    public function ListaServicios(Request $request){
        $busqueda = $request->busqueda;
        $servicios = Servicio::where('type', 'like', '%'.$busqueda.'%')
                                ->orWhere('category', 'like', '%'.$busqueda.'%')
                                ->paginate(7);
        return view('serviciosfunerarios')-> with('servicios', $servicios);
    }//fin de la función

    //función para crear un nuevo servicio
    public function create(){
        return view('nuevoservicio');
    }//fin de la función


    //función para guardar los datos del formulario
    public function store(Request $request){
        //VALIDACION de campos del formulario
        $request->validate( [
            'type' => 'required | string  ',
            'category' => 'required | alpha',
            'price' => 'required | numeric| max:60000| min:13000',
            'description' => 'required | string | max:300 ',
            'cuota' => 'required | numeric |min:200',
            'prima' => 'required | numeric| max:1500| min:500'
        ] );

        //creación de objeto del modelo
        $nuevoServicio = new Servicio();
        //recuperación y asignación de los datos que vienen con la petición
        $nuevoServicio -> type = $request->input('type');
        $nuevoServicio -> category= $request->input('category');
        $nuevoServicio -> price = $request->input('price');
        $nuevoServicio -> description = $request->input('description');
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
        $request->validate( [
            'type' => 'required | string  ',
            'category' => 'required | alpha',
            'price' => 'required | numeric| max:60000| min:13000',
            'description' => 'required | string | max:300 ',
            'cuota' => 'required | numeric |min:200',
            'prima' => 'required | numeric| max:1500| min:500'
        ] );

        $actualizarServicio = Servicio::findOrFail($id);

        //Recuperación de los datos guardados
        $actualizarServicio -> type = $request->input('type');
        $actualizarServicio -> category= $request->input('category');
        $actualizarServicio -> price = $request->input('price');
        $actualizarServicio -> description = $request->input('description');
        $actualizarServicio -> cuota = $request->input('cuota');
        $actualizarServicio -> prima = $request->input('prima');

        $actualizado = $actualizarServicio-> save();

        //Comprobar si fue actualizado
        if ($actualizado){
            return redirect()->route('Servicio.lista')->with('mensaje',
                'Los datos del servicio han sido actualizados exitosamente.');
        }else{
        }
    }





}
