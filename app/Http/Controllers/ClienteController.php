<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ContadoVenta;
use App\Models\Cliente;
use Illuminate\Support\Facades\Gate;

class ClienteController extends Controller
{
    //Función para ver el listado de clientes
    public function index(Request $request)
    {
        abort_if(Gate::denies('Listado_clientes'),redirect()->route('madre')->with('error','No tiene acceso'));
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
        abort_if(Gate::denies('Nuevo_cliente'),redirect()->route('madre')->with('error','No tiene acceso'));
        return view('cliente.nuevoCliente')->with('cliente',$cliente);
    }

    //Función para guardar los datos de un nuevo cliente
    public function store(Request $request,$cliente=null)
    {
        abort_if(Gate::denies('Nuevo_cliente'),redirect()->route('madre')->with('error','No tiene acceso'));

        //Validación de los datos
        $rules=[
            'identidad' => 'required|regex:([0,1]{1}[0-9]{12})|numeric|unique:clientes,identidad',
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u||min:3|max:35',
            'apellidos' => 'required|regex:/^[\pL\s\-]+$/u||min:3|max:35',
            'fecha_de_nacimiento' => 'required',
            'telefono' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric|unique:clientes,telefono',
            'direccion' => 'required|min:5|max:100',
            'ocupacion' => 'required|regex:/^[\pL\s\-]+$/u|min:5|max:50',
        ];

        $mensaje=[
            'identidad.required' => 'La :attribute no puede estar vacía.',
            'identidad.regex' => 'La :attribute no cumple el formato correcto, debe de iniciar con 0 o 1 y contener 13 números.',
            'identidad.numeric' => 'La :attribute solo acepta números.',
            'identidad.unique' => 'La :attribute debe de ser única.',

            'nombres.required' => 'Los :attribute no pueden estar vacíos.',
            'nombres.regex' => 'Los :attribute solo deben contener letras. ',
            'nombres.max' => 'Los :attribute deben contener 35 letras como máximo.',
            'nombres.min' => 'El nombre es muy corto, debe contener 3 letras como mínimo.',

            'apellidos.required' => 'Los :attribute no pueden estar vacío.',
            'apellidos.regex' => 'Los :attribute solo deben contener letras. ',
            'apellidos.max' => 'Los :attribute deben contener 35 letras como máximo.',
            'apellidos.min' => 'El apellido es muy corto, debe contener 3 letras como mínimo.',

            'fecha_de_nacimiento.required' => 'La fecha de nacimiento no puede estar vacía.',

            'telefono.required' => 'El teléfono no puede estar vacío.',
            'telefono.unique' => 'El teléfono debe de ser único.',
            'telefono.regex' => 'El teléfono no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'telefono.numeric' => 'El teléfono solo acepta números.',

            'direccion.required' => 'La dirección  no puede estar vacía.',
            'direccion.max' => 'La dirección debe contener 100 letras como máximo.',
            'direccion.min' => 'La dirección es muy corta, debe contener 5 letras como mínimo.',

            'ocupacion.required'  => 'La ocupación no puede estar vacía.',
            'ocupacion.regex'  =>'La ocupación no puede contener números.',
            'ocupacion.min'  =>'La ocupación debe tener al menos de 5 letras.',
            'ocupacion.max'  =>'La ocupación no debe tener mas de 50 letras.',
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
            if($cliente == -1){
  //              return redirect()->route('VentaContado.nueva',['ident'=>$nuevoCliente->id])
                return redirect()->route('ventaCredito.nueva',['ident'=>$nuevoCliente->id])
                ->with('mensaje', 'El cliente fue registrado exitosamente.');}//fin if


                    if($cliente == 0){
                         return redirect()->route('VentaContado.nueva',['ident'=>$nuevoCliente->id])
                         ->with('mensaje', 'El cliente fue registrado exitosamente.');

                        }//fin if

                        if($cliente == -2){
                             return redirect()->route('listado.clientes')
                          ->with('mensaje', 'El cliente fue registrado exitosamente.');

                        }//fin else








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
        abort_if(Gate::denies('Detalles_clientes'),redirect()->route('madre')->with('error','No tiene acceso'));

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
        abort_if(Gate::denies('Editar_clientes'),redirect()->route('madre')->with('error','No tiene acceso'));

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
        abort_if(Gate::denies('Editar_clientes'),redirect()->route('madre')->with('error','No tiene acceso'));

        $rules=[
            'identidad' => 'required|regex:([0,1]{1}[0-9]{12})|numeric|unique:clientes,identidad,'.$id,
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u||min:3|max:35',
            'apellidos' => 'required|regex:/^[\pL\s\-]+$/u||min:3|max:35',
            'fecha_de_nacimiento' => 'required',
            'telefono' => 'required|regex:([2,3,8,9]{1}[0-9]{7})|numeric|unique:clientes,telefono,'.$id,
            'direccion' => 'required|min:5|max:100',
            'ocupacion' => 'required|regex:/^[\pL\s\-]+$/u|min:5|max:50',

        ];

        $mensaje=[
            'identidad.required' => 'La :attribute no puede estar vacía.',
            'identidad.regex' => 'La :attribute no cumple el formato correcto, debe de iniciar con 0 o 1 y contener 13 números.',
            'identidad.numeric' => 'La :attribute solo acepta números.',
            'identidad.unique' => 'La :attribute debe de ser única.',


            'nombres.required' => 'Los :attribute no pueden estar vacíos.',
            'nombres.regex' => 'Los :attribute solo deben contener letras. ',
            'nombres.max' => 'Los :attribute deben contener 35 letras como máximo.',
            'nombres.min' => 'El nombre es muy corto, debe contener 3 letras como mínimo.',

            'apellidos.required' => 'Los :attribute no pueden estar vacíos.',
            'apellidos.regex' => 'Los :attribute solo deben contener letras. ',
            'apellidos.max' => 'Los :attribute deben contener 35 letras como máximo.',
            'apellidos.min' => 'El apellido es muy corto, debe contener 3 letras como mínimo.',

            'fecha_de_nacimiento.required' => 'La fecha de nacimiento no puede estar vacía.',

            'telefono.required' => 'El teléfono no puede estar vacío.',
            'telefono.regex' => 'El teléfono no cumple el formato correcto, debe de iniciar con 2,3,8 o 9 y contener 8 números.',
            'telefono.numeric' => 'El teléfono solo acepta números.',
            'telefono.unique' => 'El teléfono debe de ser único.',

            'direccion.required' => 'La dirección  no puede estar vacía.',
            'direccion.max' => 'La dirección debe contener 100 letras como máximo.',
            'direccion.min' => 'La dirección es muy corta, debe contener 5 letras como mínimo.',

            'ocupacion.required'  => 'La ocupación no puede estar vacía.',
            'ocupacion.regex'  =>'La ocupación no puede contener números.',
            'ocupacion.min'  =>'La ocupación debe tener al menos de 5 letras.',
            'ocupacion.max'  =>'La ocupación no debe tener mas de 50 letras.',

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
