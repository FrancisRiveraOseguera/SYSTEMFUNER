<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\jornadaLaboral;

class jornadaLaboralController extends Controller
{
    public function create()
    {
        //abort_if(Gate::denies('Nueva_jornadalaboral'),redirect()->route('madre')->with('error','No tiene acceso'));
        return view('/jornadalaboral/nuevajornadalaboral');
    }

    public function store(Request $request)


    {
       // abort_if(Gate::denies('Nueva_jornadalaboral'),redirect()->route('madre')->with('error','No tiene acceso'));
        $rules=[
            'cargo_id' => 'required|numeric|exists:App\Models\Cargo,id',
            'turno_id' => 'required|exists:App\Models\Turno,id',
            'duracion' => 'required|max:15|min:5|string',
            'descripcion' => 'required|max:70|min:10|regex:/^[\pL\s\-]+$/u',
            

        ];

    $mensaje=[
           'cargo_id.exists' => 'El cargo no ha sido seleccionado.',
            'cargo_id.required' => 'El cargo no puede estar vacío.',

            'turno_id.exists' => 'El turno no ha sido seleccionado.',
            'turno_id.required' => 'El turno no puede estar vacío.',

             'duracion.string' => 'La duración de la jornada laboral puede contener letras y números',
            'duracion.required' => 'La duración de la jornada laboral no puede estar vacía.',
            'duracion.min' => 'La duración de la jornada laboral es muy corta, debe escribir como mínimo 5 letras.',

            'descripcion.regex' => 'La descripción solo puede contener letras',
            'descripcion.required' => 'La descripción  no puede estar vacía.',
            'descripcion.min' => 'La descripción es muy corta, debe escribir como mínimo 10 letras.',

            
           
            


        ];

        $this->validate($request,$rules, $mensaje);

        $nuevaJornadaLaboral = new jornadaLaboral();

        $nuevaJornadaLaboral -> turno_id = $request->input('turno_id');
        $nuevaJornadaLaboral -> cargo_id = $request->input('cargo_id');
        $nuevaJornadaLaboral -> descripcion = $request->input('descripcion');
        $nuevaJornadaLaboral -> duracion = $request->input('duracion');

        $creado = $nuevaJornadaLaboral-> save();

        if ($creado){
          return redirect()->route('')->with('mensaje', 'La jornada laboral fue agregada exitosamente.');
        }else{

       }

    }
    
}
