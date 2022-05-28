<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cargo;

class cargoController extends Controller
{

    public function index(Request $request)
    {
        $busqueda = trim($request->get('busqueda'));

        $cargo = DB::table('cargos')

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
            'cargo' => 'required|regex:/^[\pL\s\-]+$/u|max:70|min:5|unique:cargos,cargo',
            'sueldo' => 'required|numeric'
        ];

        $mensaje=[
            
            'cargo.required' => 'El campo :attribute no puede estar vacío.',
            'cargo.unique' => 'Este :attribute ya existe.',
            'cargo.regex' => 'El campo :attribute solo debe contener letras.',
            'cargo.min' => 'El campo :attribute debe contener como mínimo 5 letras.',

            'sueldo.required' => 'El campo sueldo no puede estar vacío.',
            'sueldo.numeric' => 'El campo sueldo solo acepta números.',
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
}
