<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\jornadaLaboral;

class jornadaLaboralController extends Controller
{

    public function index(Request $request){

    abort_if(Gate::denies('Listado_jornadaLaboral'),redirect()->route('madre')->with('error','No tiene acceso'));
        $busqueda = trim($request->get('busqueda'));

        $jornada = jornadaLaboral::orderby('jornada_laborals.id','DESC')

        ->select("jornada_laborals.id","jornada_laborals.turno_id",'jornada_laborals.empleado_id',"jornada_laborals.fecha_inicio",
        "jornada_laborals.fecha_fin","jornada_laborals.duracion","jornada_laborals.descripcion", 'empleados.nombres', 'empleados.apellidos')
        ->join("empleados","empleado_id","=","empleados.id")
        ->where('fecha_inicio', 'LIKE', '%'.$busqueda.'%')
        ->orwhere('fecha_fin', 'LIKE', '%'.$busqueda.'%')
        ->join("turnos","turno_id","=","turnos.id")
        ->orWhere('turnos.name', 'LIKE', '%'.$busqueda.'%')
        ->orWhere('empleados.nombres', 'LIKE', '%'.$busqueda.'%')
        ->orWhere('empleados.apellidos', 'LIKE', '%'.$busqueda.'%')
        
        
        ->paginate(15)
        ->withQueryString();

        return view('jornadalaboral/listadoJornadaLaboral')
            ->with('jornada', $jornada)
            ->with('busqueda', $busqueda);
    }


    public function create()
    {
        abort_if(Gate::denies('Nueva_jornadalaboral'),redirect()->route('madre')->with('error','No tiene acceso'));
        return view('/jornadalaboral/nuevajornadalaboral');
    }

    public function store(Request $request)


    {
       abort_if(Gate::denies('Nueva_jornadalaboral'),redirect()->route('madre')->with('error','No tiene acceso'));
        $rules=[
            'empleado_id' => 'required|numeric|exists:App\Models\Empleado,id',
            'turno_id' => 'required|exists:App\Models\Turno,id',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'duracion' => 'numeric',
            'descripcion' => 'required|max:70|min:10|regex:/^[\pL\s\-]+$/u',


        ];

    $mensaje=[
           'empleado_id.exists' => 'El empleado no ha sido seleccionado.',
            'empleado_id.required' => 'El empleado no ha sido seleccionado',

            'turno_id.exists' => 'El turno no ha sido seleccionado.',
            'turno_id.required' => 'El turno no ha sido seleccionado.',

             'duracion.numeric' => 'La duración de la jornada laboral no puede estar vacía',
            

            'descripcion.regex' => 'La descripción solo puede contener letras',
            'descripcion.required' => 'La descripción  no puede estar vacía.',
            'descripcion.min' => 'La descripción es muy corta, debe escribir como mínimo 10 letras.',

            'fecha_inicio.required' => 'La fecha de inicio no puede estar vacía.',
            'fecha_fin.required' => 'La fecha de finalización no puede estar vacía.',




        ];

        $this->validate($request,$rules, $mensaje);

        $nuevaJornadaLaboral = new jornadaLaboral();

        $nuevaJornadaLaboral -> turno_id = $request->input('turno_id');
        $nuevaJornadaLaboral -> empleado_id = $request->input('empleado_id');
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

    //FUNCIÓN PARA VER INFORMACIÓN DE LA JORNADA LABORAL
    public function show($id)
    {
       abort_if(Gate::denies('Detalles_jornadaLaboral'),redirect()->route('madre')->with('error','No tiene acceso'));

        $jornadalaboral = jornadalaboral::findOrFail($id);
        return view('jornadalaboral.detallesJornadaLaboral')->with('jornadalaboral', $jornadalaboral);
    }

    public function editar($id){
        abort_if(Gate::denies('Editar_jornadaLaboral'),redirect()->route('madre')->with('error','No tiene acceso'));
        $jornadas = jornadaLaboral::findOrFail($id);
        return view('jornadalaboral/editarJornadaLaboral')
            ->with('jornadas', $jornadas);
    }

    public function update(Request $request, $id){
    abort_if(Gate::denies('Editar_jornadaLaboral'),redirect()->route('madre')->with('error','No tiene acceso'));
        //Validar campos del formulario editar

        $rules= [
            'turno_id' => 'required|exists:App\Models\Turno,id',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'duracion' => 'required',
            'descripcion' => 'required|max:70|min:10|regex:/^[\pL\s\,\.-]+$/u',
        ] ;

        $mensaje=[

            'turno_id.exists' => 'El turno no ha sido seleccionado.',
            'turno_id.required' => 'El turno no ha sido seleccionado.',

            'duracion.numeric' => 'La duración de la jornada laboral no puede estar vacía',
            

            'descripcion.regex' => 'La descripción solo puede contener letras y signos de puntuación',
            'descripcion.required' => 'La descripción  no puede estar vacía.',
            'descripcion.min' => 'La descripción es muy corta, debe escribir como mínimo 10 letras.',

            'fecha_inicio.required' => 'La fecha de inicio no puede estar vacía.',
            'fecha_fin.required' => 'La fecha de finalización no puede estar vacía.',


        ];

        $this->validate($request,$rules, $mensaje);

        $actualizarJornada = jornadaLaboral::findOrFail($id);

        //Recuperación de los datos guardados
        $actualizarJornada -> turno_id = $request->input('turno_id');
        $actualizarJornada -> fecha_inicio = $request->input('fecha_inicio');
        $actualizarJornada -> fecha_fin = $request->input('fecha_fin');
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
