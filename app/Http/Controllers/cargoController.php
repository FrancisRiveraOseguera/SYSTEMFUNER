<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cargo;
use App\Models\Empleado;

class cargoController extends Controller
{

    public function index(Request $request)
    {
        $busqueda = trim($request->get('busqueda'));

        $cargo = DB::table('cargos')->orderby('id','DESC' )

            ->where('cargo', 'LIKE', '%'.$busqueda.'%')
            ->orwhere('sueldo', 'LIKE', '%'.$busqueda.'%')
            ->paginate(15)-> withQueryString();

        return view('Cargos/listadoCargos')
            ->with('cargo', $cargo)
            ->with('busqueda', $busqueda);
    }

    public function create(){
        return view('Cargos/nuevoCargo');
    }

    public function store(Request $request)
    {
        $rules=[
            'cargo' => 'required | regex:/^[\pL\s\-]+$/u | max:70 | min:5 | unique:cargos,cargo',
            'sueldo' => 'required | numeric | min:7000|max:25000',
            'detalles_cargo' => 'required | max:1000 | min:25 | unique:cargos,detalles_cargo',
        ];

        $mensaje=[

            'cargo.required' => 'El campo tipo de cargo no puede estar vacío.',
            'cargo.unique' => 'Este tipo de cargo ya existe.',
            'cargo.regex' => 'El campo tipo de cargo solo debe contener letras.',
            'cargo.min' => 'El campo tipo de cargo debe contener como mínimo 5 letras.',

            'sueldo.required' => 'El campo sueldo mensual no puede estar vacío.',
            'sueldo.numeric' => 'El campo sueldo mensual solo acepta números.',
            'sueldo.max'  => 'El campo sueldo mensual no puede ser mayor a 25000 lempiras.',
            'sueldo.min'  => 'El campo sueldo mensual no puede ser menor a 7000 lempiras.',

            'detalles_cargo.required' => 'El campo tareas del cargo no puede estar vacío.',
            'detalles_cargo.unique' => 'Las tareas del cargo ya existen.',
            'detalles_cargo.min' => 'El campo tareas del cargo debe contener como mínimo 25 letras.',
        ];

    $this->validate($request,$rules,$mensaje);

    $nuevoCargo= new Cargo();

    $nuevoCargo->cargo = $request->input('cargo');
    $nuevoCargo->sueldo = $request->input('sueldo');
    $nuevoCargo->detalles_cargo = $request->input('detalles_cargo');

        $creado = $nuevoCargo->save();

    if ($creado) {
        return redirect()->route('listadoCargos.index')
            ->with('mensaje', 'El cargo fue agregado exitosamente!');
    } else {

    }
  }

  //Función para editar los datos
  public function editar($id){
    $cargo = Cargo::findOrFail($id);
    return view('Cargos.editarCargo')
        ->with('cargo', $cargo);
    }

    //Función para guardar los datos actualizados
    public function update(Request $request, $id){
        //Validar campos del formulario editar
        $rules= [
            'cargo' => 'required |regex:/^[\pL\s\-]+$/u|max:50|min:5|unique:cargos,cargo,'.$id,
            'sueldo' => 'required|numeric|min:7000|max:25000',
            'detalles_cargo' => 'required|string|max:1000|min:25|unique:cargos,detalles_cargo,'.$id,
        ] ;

        $mensaje=[
            'cargo.required' => 'El campo tipo de cargo no puede estar vacío.',
            'cargo.unique' => 'Este tipo de cargo ya existe.',
            'cargo.regex' => 'El campo tipo de cargo solo debe contener letras.',
            'cargo.min' => 'El campo tipo de cargo debe contener como mínimo 5 letras.',

            'sueldo.required' => 'El campo sueldo no puede estar vacío.',
            'sueldo.numeric' => 'El campo sueldo mensual solo acepta números.',
            'sueldo.max'  => 'El campo sueldo mensual no puede ser mayor a 25000 lempiras.',
            'sueldo.min'  => 'El campo sueldo mensual no puede ser menor a 7000 lempiras.',

            'detalles_cargo.required' => 'El campo tareas del cargo no puede estar vacío.',
            'detalles_cargo.min' => 'El campo tareas del cargo debe contener como mínimo 25 letras.',
            'detalles_cargo.unique' => 'Las tareas del cargo ya existen.',
        ];

        $this->validate($request,$rules, $mensaje);

        $actualizarCargo = Cargo::findOrFail($id);

        //Recuperación de los datos guardados
        $actualizarCargo->cargo = $request->input('cargo');
        $actualizarCargo -> sueldo = $request->input('sueldo');
        $actualizarCargo -> detalles_cargo = $request->input('detalles_cargo');

        $actualizado = $actualizarCargo-> save();

        //Comprobar si fue actualizado
        if ($actualizado){
            return redirect()->route('listadoCargos.index')->with('mensaje',
                'Los datos del cargo han sido actualizados exitosamente!');
        }
    }

    //función para ver los detalles del cargo
    public function show($id)
    {
        $cargo = Cargo::findOrFail($id);
        return view('Cargos.detallesCargo')->with('cargo', $cargo);
    }

    //Eliminar cargo
    public function destroy($id)
    {
        Cargo::destroy($id);

        return redirect()->route('listadoCargos.index')->with('mensaje', 'El cargo fue eliminado exitosamente!');
    }

}
