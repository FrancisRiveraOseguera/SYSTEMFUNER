<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\jornadaLaboral;

class jornadaLaboralController extends Controller
{

    public function index(Request $request){

        $busqueda = trim($request->get('busqueda'));

        $jornada = jornadaLaboral::orderby('jornada_laborals.id','DESC')
        ->select("jornada_laborals.id","turno_id","cargo_id","duracion","descripcion")
        ->join("turnos","turno_id","=","turnos.id")
        ->orWhere('turnos.name', 'LIKE', '%'.$busqueda.'%')
        ->join("cargos","cargo_id","=","cargos.id")
        ->orWhere('cargos.cargo', 'LIKE', '%'.$busqueda.'%')
        ->paginate(15)
        ->withQueryString();

        return view('jornadalaboral/listadoJornadaLaboral')
            ->with('jornada', $jornada)
            ->with('busqueda', $busqueda);
    }


    public function create()
    {
        //abort_if(Gate::denies('Nueva_jornadalaboral'),redirect()->route('madre')->with('error','No tiene acceso'));
        return view('/jornadalaboral/nuevajornadalaboral');
    }

    public function store(Request $request)


    {
       // abort_if(Gate::denies('Nueva_jornadalaboral'),redirect()->route('madre')->with('error','No tiene acceso'));
        $rules=[
            'empleado_id' => 'required|numeric|exists:App\Models\Empleado,id',
            'turno_id' => 'required|exists:App\Models\Turno,id',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'duracion' => 'required|max:15|min:5|string',
            'descripcion' => 'required|max:70|min:10|regex:/^[\pL\s\-]+$/u',


        ];

    $mensaje=[
           'empleado_id.exists' => 'El cargo no ha sido seleccionado.',
            'empleado_id.required' => 'El cargo no puede estar vacío.',

            'turno_id.exists' => 'El turno no ha sido seleccionado.',
            'turno_id.required' => 'El turno no puede estar vacío.',

             'duracion.string' => 'La duración de la jornada laboral puede contener letras y números',
            'duracion.required' => 'La duración de la jornada laboral no puede estar vacía.',
            'duracion.min' => 'La duración de la jornada laboral es muy corta, debe escribir como mínimo 5 letras.',

            'descripcion.regex' => 'La descripción solo puede contener letras',
            'descripcion.required' => 'La descripción  no puede estar vacía.',
            'descripcion.min' => 'La descripción es muy corta, debe escribir como mínimo 10 letras.',

            'fecha_inicio.required' => 'La fecha de inicio no puede estar vacía.',
            'fecha_fin.required' => 'La fecha de finalización no puede estar vacía.',




        ];

        $this->validate($request,$rules, $mensaje);

        $nuevaJornadaLaboral = new jornadaLaboral();

        $nuevaJornadaLaboral -> turno_id = $request->input('turno_id');
        $nuevaJornadaLaboral -> cargo_id = $request->input('empleado_id');
        $nuevaJornadaLaboral -> duracion = $request->input('duracion');
        $nuevaJornadaLaboral -> fecha_inicio = $request->input('fecha_inicio');
        $nuevaJornadaLaboral -> fecha_fin = $request->input('fecha_fin');
        $nuevaJornadaLaboral -> descripcion = $request->input('descripcion');
        
        $creado = $nuevaJornadaLaboral-> save();

        if ($creado){
          return redirect()->route('ListadoJornadaLaboral.index')->with('mensaje', 'La jornada laboral fue agregada exitosamente.');
        }else{

       }

    }

    public function editar($id){
        //abort_if(Gate::denies('Editar_jornada'),redirect()->route('madre')->with('error','No tiene acceso'));
        $jornadas = jornadaLaboral::findOrFail($id);
        return view('jornadalaboral/editarJornadaLaboral')
            ->with('jornadas', $jornadas);
    }

    public function update(Request $request, $id){
       // abort_if(Gate::denies('Editar_jornadaLaboral'),redirect()->route('madre')->with('error','No tiene acceso'));
        //Validar campos del formulario editar

        $rules= [
            'cargo_id' => 'required|numeric|exists:App\Models\Cargo,id',
            'turno_id' => 'required|exists:App\Models\Turno,id',
            'duracion' => 'required|max:15|min:1|string',
            'descripcion' => 'required|max:70|min:10|regex:/^[\pL\s\-]+$/u',
        ] ;

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

        $actualizarJornada = jornadaLaboral::findOrFail($id);

        //Recuperación de los datos guardados
        $actualizarJornada -> turno_id = $request->input('turno_id');
        $actualizarJornada -> cargo_id = $request->input('cargo_id');
        $actualizarJornada -> descripcion = $request->input('descripcion');
        $actualizarJornada -> duracion = $request->input('duracion');


        $actualizado = $actualizarJornada-> save();

        //Comprobar si fue actualizado
        if ($actualizado){
            return redirect()->route('ListadoJornadaLaboral.index')->with('mensaje',
                'Los datos de la jornada laboral han sido actualizados exitosamente.');
        }
    }


    //función para eliminar la jornada laboral
    public function destroy($id){
        abort_if(Gate::denies('Eliminar_jornadaLaboral'),redirect()->route('madre')->with('error','No tiene acceso'));
        jornadaLaboral::destroy($id);

        return redirect()->route('ListadoJornadaLaboral.index')
            ->with('mensaje', 'La jornada laboral fue eliminada exitosamente.');
    }
}
