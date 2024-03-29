<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\Turno;
use App\Models\jornadaLaboral;

class TurnoController extends Controller
{
    public function index(Request $request){

        $turnos = DB::table('turnos')->orderBy('id', 'DESC')
            ->paginate(15)
            ->withQueryString();

        return view('turnos/listadoTurnos')
            ->with('turnos', $turnos);
    }

    public function create()
    {
        abort_if(Gate::denies('Nuevo_turno'),redirect()->route('madre')->with('error','No tiene acceso'));
        return view('turnos/crearTurno');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('Nuevo_turno'),redirect()->route('madre')->with('error','No tiene acceso'));

        $rules=[
            'name' => 'required|max:25|min:5|unique:turnos,name|regex:/^[\pL\s\-]+$/u',
            'horario_entrada'=> 'required|max:5',
            'horario_salida'=> 'required|max:5',
        ];

        $mensaje=[
            'name.required' => 'El nombre del turno no puede estar vacío.',
            'name.min' => 'El nombre del turno es muy corto, debe escribir como mínimo 5 letras.',
            'name.unique' => 'El nombre del turno ya existe.',
            'name.regex' => 'El nombre del turno solo debe contener letras.',

            'horario_entrada.required' => 'El horario de entrada no puede estar vacío.',
            'horario_entrada.regex' => 'El nombre del  turno solo debe contener letras.',
            
            'horario_salida.required' => 'El horario de salida no puede estar vacío.',
            'horario_salida.regex' => 'El nombre del turno solo debe contener letras.',
        ];

        $this->validate($request,$rules,$mensaje);

        $turnos = new Turno();

        $turnos->name = $request->input('name');
        $turnos->horario_entrada = $request->input('horario_entrada');
        $turnos->horario_salida = $request->input('horario_salida');

        $turno = $turnos->save();

        if ($turno) {
                return redirect()->route('turnos.index')
                ->with('mensaje', 'El turno fue agregado exitosamente.');
        } else {

        }
    }

    public function editar($id){
        abort_if(Gate::denies('Editar_turno'),redirect()->route('madre')->with('error','No tiene acceso'));
        $turnos = Turno::findOrFail($id);
        return view('turnos/editarturno')
            ->with('turnos', $turnos);
    }

    public function update(Request $request, $id){
        abort_if(Gate::denies('Editar_turno'),redirect()->route('madre')->with('error','No tiene acceso'));
        //Validar campos del formulario editar
        //Validar campos del formulario editar
        $rules= [
            'name' => 'required|max:25|min:5|regex:/^[\pL\s\-]+$/|unique:turnos,name,'.$id,
            'horario_entrada'=> 'required|max:5',
            'horario_salida'=> 'required|max:5',
        ] ;

        $mensaje=[
            'name.required' => 'El nombre del turno no puede estar vacío.',
            'name.min' => 'El nombre del turno es muy corto, debe escribir como mínimo 5 letras.',
            'name.unique' => 'El nombre del turno ya existe.',
            'name.regex' => 'El nombre del turno solo debe contener letras.',

            'horario_entrada.required' => 'El horario de entrada no puede estar vacío.',
            'horario_entrada.regex' => 'El nombre del turno solo debe contener letras.',
            
            'horario_salida.required' => 'El horario de salida no puede estar vacío.',
            'horario_salida.regex' => 'El nombre del turno solo debe contener letras.',
        

        ];

        $this->validate($request,$rules, $mensaje);

        $actualizarTurno = Turno::findOrFail($id);

        //Recuperación de los datos guardados
        $actualizarTurno -> name = $request->input('name');
        $actualizarTurno -> horario_entrada= $request->input('horario_entrada');
        $actualizarTurno -> horario_salida= $request->input('horario_salida');

        $actualizado = $actualizarTurno-> save();

        //Comprobar si fue actualizado
        if ($actualizado){
            return redirect()->route('turnos.index')->with('mensaje',
                'Los datos del turno han sido actualizados exitosamente.');
        }
    }

    public function destroy($id){
        abort_if(Gate::denies('Eliminar_turno'),redirect()->route('madre')->with('error','No tiene acceso'));

        if (is_null($jornada = jornadaLaboral::select("jornada_laborals.id","jornada_laborals.turno_id")
        ->join("turnos","turno_id","=","turnos.id")
        ->where('jornada_laborals.turno_id','=',$id)->first())){
        Turno::destroy($id);

        return redirect()->route('turnos.index')
            ->with('mensaje', 'El turno fue eliminado exitosamente.');
        }else{
            return redirect()->route('turnos.index')
                ->with('errors', 'El turno no puede eliminarse porque se encuentra asignado en una jornada laboral.');
        }

    }
}
