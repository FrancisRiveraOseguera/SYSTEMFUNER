<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;

class ClienteController extends Controller
{
    //Función para ver el listado de clientes
    public function index(Request $request)
    {
        $busqueda = trim($request->get('busqueda'));

        $cliente = DB::table('clientes')

            ->where('identidad', 'LIKE', '%'.$busqueda.'%')
            ->orwhere('nombres', 'LIKE', '%'.$busqueda.'%')
            ->paginate(15)-> withQueryString();

        return view('cliente.listadoClientes')
            ->with('cliente', $cliente)
            ->with('busqueda', $busqueda);

    }

    //Función para abrir el formulario de nuevo cliente
    public function create($cliente=null)
    {
        return view('cliente.nuevoCliente')->with('cliente',$cliente);
    }

    //Función para guardar los datos de un nuevo cliente
    public function store(Request $request,$cliente=null)
    {
        //Validación de los datos
        $rules=[
            'identidad' => 'required|regex:([0,1]{1}[0-9]{12})|numeric|unique:clientes,identidad',
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u|max:35',
            'apellidos' => 'required|regex:/^[\pL\s\-]+$/u|max:35',
            'fecha_de_nacimiento' => 'required',
            'telefono' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric|unique:clientes,telefono',
            'direccion' => 'required|max:100',
            'ocupacion' => 'required|regex:/^[\pL\s\-]+$/u|min:5|max:50',
        ];

        $mensaje=[
            'identidad.required' => 'El campo :attribute no puede estar vacío.',
            'identidad.regex' => 'El campo :attribute no cumple el formato correcto, debe de iniciar con 0 o 1 y contener 13 números.',
            'identidad.numeric' => 'El campo :attribute solo acepta números.',
            'identidad.unique' => 'El campo :attribute debe de ser único.',

            'nombres.required' => 'El campo :attribute no puede estar vacío.',
            'nombres.regex' => 'El campo :attribute solo debe contener letras. ',
            'nombres.max' => 'El campo :attribute debe contener 35 letras como máximo.',

            'apellidos.required' => 'El campo :attribute no puede estar vacío.',
            'apellidos.regex' => 'El campo :attribute solo debe contener letras. ',
            'apellidos.max' => 'El campo :attribute debe contener 35 letras como máximo.',

            'fecha_de_nacimiento.required' => 'El campo :attribute no puede estar vacío.',

            'telefono.required' => 'El campo teléfono no puede estar vacío.',
            'telefono.unique' => 'El campo teléfono debe de ser único.',
            'telefono.regex' => 'El campo teléfono no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'telefono.numeric' => 'El campo teléfono solo acepta números.',

            'direccion.required' => 'El campo dirección  no puede estar vacío.',
            'direccion.max' => 'El campo dirección debe contener 100 letras como máximo.',

            'ocupacion.required'  => 'El campo ocupación no puede estar vacío.',
            'ocupacion.regex'  =>'El campo ocupación no puede contener números.',
            'ocupacion.min'  =>'El campo ocupación debe tener al menos de 5 letras.',
            'ocupacion.max'  =>'El campo ocupación no debe tener mas de 50 letras.',
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevoCliente= new Cliente();


        $nuevoCliente->identidad = $request->input('identidad');
        $nuevoCliente->nombres = $request->input('nombres');
        $nuevoCliente->apellidos = $request->input('apellidos');
        $nuevoCliente->fecha_de_nacimiento = $request->input('fecha_de_nacimiento');
        $nuevoCliente->telefono= $request->input('telefono');
        $nuevoCliente->direccion= $request->input('direccion');
        $nuevoCliente->ocupacion= $request->input('ocupacion');

        $creado = $nuevoCliente->save();

        if ($creado) {
            if($cliente == 0){
  //              return redirect()->route('VentaContado.nueva',['ident'=>$nuevoCliente->id])
                return redirect()->route('ventaCredito.nueva',['ident'=>$nuevoCliente->id])
                ->with('mensaje', 'El cliente fue registrado exitosamente.');
            }else{
                return redirect()->route('listado.clientes')
                ->with('mensaje', 'El cliente fue registrado exitosamente.');
            }
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente $cliente
     * @return \Illuminate\Http\Response
     */

     //FUNCIÓN PARA VER INFORMACIÓN DEL Cliente
     public function show($id)
     {
         $cliente = Cliente::findOrFail($id);
         return view('cliente.detallesCliente')->with('cliente', $cliente);
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Cliente  $cliente
      * @return \Illuminate\Http\Response
      */

     //FUNCIÓN EDITAR INFORMACIÓN DEL CLIENTE
     public function edit($id)
     {
         $cliente = Cliente::findOrFail($id);
         return view('cliente.editarClientes')
             ->with('cliente', $cliente);
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Cliente  $cliente
      * @return \Illuminate\Http\Response
      */

     //ACTUALIZAR/VALIDAR DATOS DEL CLIENTE
    public function update(Request $request, $id)
    {
        $rules=[
            'identidad' => 'required|regex:([0,1]{1}[0-9]{12})|numeric|unique:clientes,identidad,'.$id,
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u|max:35',
            'apellidos' => 'required|regex:/^[\pL\s\-]+$/u|max:35',
            'fecha_de_nacimiento' => 'required',
            'telefono' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric|unique:clientes,telefono,'.$id,
            'direccion' => 'required|max:100',
            'ocupacion' => 'required|regex:/^[\pL\s\-]+$/u|min:5|max:50',

        ];

        $mensaje=[
            'identidad.required' => 'El campo :attribute no puede estar vacío.',
            'identidad.regex' => 'El campo :attribute no cumple el formato correcto, debe de iniciar con 0 o 1 y contener 13 números.',
            'identidad.numeric' => 'El campo :attribute solo acepta números.',
            'identidad.unique' => 'El campo :attribute debe de ser único.',


            'nombres.required' => 'El campo :attribute no puede estar vacío.',
            'nombres.regex' => 'El campo :attribute solo debe contener letras. ',
            'nombres.max' => 'El campo :attribute debe contener 35 letras como máximo.',

            'apellidos.required' => 'El campo :attribute no puede estar vacío.',
            'apellidos.regex' => 'El campo :attribute solo debe contener letras. ',
            'apellidos.max' => 'El campo :attribute debe contener 35 letras como máximo.',

            'fecha_de_nacimiento.required' => 'El campo :attribute no puede estar vacío.',

            'telefono.required' => 'El campo teléfono no puede estar vacío.',
            'telefono.regex' => 'El campo teléfono no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'telefono.numeric' => 'El campo teléfono solo acepta números.',
            'telefono.unique' => 'El campo teléfono debe de ser único.',

            'direccion.required' => 'El campo dirección  no puede estar vacío.',
            'direccion.max' => 'El campo dirección debe contener 100 letras como máximo.',

            'ocupacion.required'  => 'El campo ocupación no puede estar vacío.',
            'ocupacion.regex'  =>'El campo ocupación no puede contener números.',
            'ocupacion.min'  =>'El campo ocupación debe tener al menos de 5 letras.',
            'ocupacion.max'  =>'El campo ocupación no debe tener mas de 50 letras.',

        ];


    $this->validate($request,$rules,$mensaje);

        $actualizar = Cliente::findOrFail($id);



        $actualizar->nombres = $request->input('nombres');
        $actualizar->identidad = $request->input('identidad');
        $actualizar->apellidos = $request->input('apellidos');
        $actualizar->fecha_de_nacimiento = $request->input('fecha_de_nacimiento');
        $actualizar->telefono= $request->input('telefono');
        $actualizar->direccion= $request->input('direccion');
        $actualizar->ocupacion= $request->input('ocupacion');
        
        $actualizado = $actualizar->save();

        if ($actualizado){
            return redirect()->route('listado.clientes')
                ->with('mensaje', 'Los datos del cliente han sido actualizados exitosamente');
        }else{

        }
    }

    /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\Cliente  $cliente
      * @return \Illuminate\Http\Response
      */
    public function destroy (Cliente $cliente)
    {
         //
    }

}
