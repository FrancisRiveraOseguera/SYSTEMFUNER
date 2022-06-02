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
            'sueldo' => 'required | numeric | min:1',
            'detalles_cargo' => 'required | max:2000 | min:25 | unique:cargos,detalles_cargo',
        ];

        $mensaje=[
            
            'cargo.required' => 'El campo :attribute no puede estar vacío.',
            'cargo.unique' => 'Este :attribute ya existe.',
            'cargo.regex' => 'El campo :attribute solo debe contener letras.',
            'cargo.min' => 'El campo :attribute debe contener como mínimo 5 letras.',

            'sueldo.required' => 'El campo sueldo no puede estar vacío.',
            'sueldo.numeric' => 'El campo sueldo solo acepta números.',
            'sueldo.min' => 'El campo sueldo no puede ser menor a 1 lempira.',

            'detalles_cargo.required' => 'El campo detalles del cargo no puede estar vacío.',
            'detalles_cargo.unique' => 'Este detalles del cargo ya existe.',
            'detalles_cargo.min' => 'El campo detalles del cargo debe contener como mínimo 25 letras.',
        ];

    $this->validate($request,$rules,$mensaje);

    $nuevoCargo= new Cargo();

    $nuevoCargo->cargo = $request->input('cargo');
    $nuevoCargo->sueldo = $request->input('sueldo');

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
            'cargo' => 'required|regex:/^[\pL\s\-]+$/u|max:70|min:5|unique:cargos,cargo,'.$id,
            'sueldo' => 'required|numeric|min:1',
        ] ;

        $mensaje=[
            'cargo.required' => 'El campo :attribute no puede estar vacío.',
            'cargo.unique' => 'Este :attribute ya existe.',
            'cargo.regex' => 'El campo :attribute solo debe contener letras.',
            'cargo.min' => 'El campo :attribute debe contener como mínimo 5 letras.',

            'sueldo.required' => 'El campo sueldo no puede estar vacío.',
            'sueldo.numeric' => 'El campo sueldo solo acepta números.',
            'sueldo.min'  => 'El campo sueldo no puede ser menor a 1 lempira.',
        ];

        $this->validate($request,$rules, $mensaje);

        $actualizarCargo = Cargo::findOrFail($id);

        //Recuperación de los datos guardados
        $actualizarCargo -> sueldo = $request->input('sueldo');
    

        $actualizado = $actualizarCargo-> save();

        //Comprobar si fue actualizado
        if ($actualizado){
            return redirect()->route('listadoCargos.index')->with('mensaje',
                'Los datos del cargo han sido actualizados exitosamente!');
        }
    }
    //Eliminar cargo
    public function destroy($id)
    {
        Cargo::destroy($id);

        return redirect()->route('listadoCargos.index')->with('mensaje', 'El cargo fue eliminado exitosamente!');
    }

}
