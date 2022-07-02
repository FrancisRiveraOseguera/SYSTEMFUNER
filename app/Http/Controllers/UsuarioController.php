<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Empleado;
use App\Models\Cargo;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Gate;
use App\Mail\EmergencyCallReceived;

class UsuarioController extends Controller
{

    public function index(Request $request)
    { 
        $busqueda = trim($request->get('busqueda'));
        $usuarios = usuario::orderby('usuarios.id','DESC')

        ->where('nameUser', 'LIKE', '%'.$busqueda.'%')
        ->orwhere('correo', 'LIKE', '%'.$busqueda.'%')
        ->paginate(15)-> withQueryString();

        return view('Usuarios.listadoUsuarios')
        ->with('usuarios', $usuarios)
        ->with('busqueda', $busqueda);
    }



    public function create($ident = null){
        $empleados = Empleado::where('id',$ident)->first();
        return view ('Usuarios.CrearUsuario')->with('ident', $empleados);
    }

    public function store(Request $request)
    {
        //Validación de los datos
        $rules=[
            'correo' => 'required|max:35|min:8|unique:usuarios,correo|email:filter',
            'empleado_id' => 'required|unique:usuarios,empleado_id|exists:App\Models\Empleado,id',
            'nameUser' => 'required|min:5|max:20|unique:usuarios,nameUser',
            'password' => [
                'required','min:8',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'password_confirmation' => 'min:8|same:password',
        ];
    
        $mensaje=[
            'correo.required' => 'El  :attribute no puede estar vacío.',
            'correo.regex' => 'El :attribute no cumple el formato correcto.',
            'correo.unique' => 'El :attribute debe de ser único.',
            'correo.max' => 'El :attribute debe contener 35 letras como máximo.',
            'correo.min' => 'El :attribute debe contener 8 letras como mínimo.',

            'empleado_id.exists' => 'El nombre del empleado no fue seleccionado.',
            'empleado_id.required' => 'El nombre del empleado no fue seleccionado.',
            'empleado_id.unique' => 'Este empleado ya posee un usuario existente dentro del sistema.',

            'nameUser.required' => 'El nombre de usuario no puede estar vacío.',
            'nameUser.max' => 'El nombre debe tener como máximo 20 caracteres.',
            'nameUser.unique' => 'El nombre de usuario ya está en uso, este campo debe ser único.',
            'nameUser.min' => 'El nombre de usuario debe tener como mínimo 5 caracteres.',

           

            'password.required'  => 'La contraseña no puede estar vacía.',
            'password.min'  => 'La contraseña es insegura, para mayor seguridad debe poseer 8 caracteres como mínimo.',

            'password_confirmation.required' => 'Por favor confirme su contraseña.',
            'password_confirmation.min' => 'La contraseña  debe poseer 8 caracteres como mínimo para confirmarla.',
            'password_confirmation.same' => 'Las contraseñas no coinciden.',
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevoUser= new Usuario();


        $nuevoUser->correo = $request->input('correo');
        $nuevoUser->empleado_id = $request->input('empleado_id');
        $nuevoUser->nameUser = $request->input('nameUser');
        $nuevoUser->password = $request->input('password');
        $nuevoUser->password = bcrypt($request->password);

        $creado = $nuevoUser->save();

        if ($creado) {
            if($creado){

                $call=[
                    'correo' => $nuevoUser->correo,
                    'empleado_id' => $nuevoUser->empleados->nombres." ".$nuevoUser->empleados->apellidos,
                    'nombreUsuario' =>  $nuevoUser->nameUser,
                    
                ];

                Mail::to($nuevoUser->correo)->send(new EmergencyCallReceived($call));
                /*Se debe cambiar la ruta de redirección, la dejé en el listado de clientes porque no existe nada para usuarios */
                return redirect()->route('listado.usuario')->with('mensaje', 'El usuario fue registrado exitosamente.');
            }else{
            }
            }
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('Usuarios/editarusuario')
            ->with('usuario', $usuario);
    }

    //ACTUALIZAR/VALIDAR DATOS DEL USUARIO
    public function update(Request $request, $id)
    {

        $rules=[
            'correo' => 'required|max:35|min:8|email:filter|unique:usuarios,correo,'.$id,
            'nameUser' => 'required|max:20|min:5|unique:usuarios,nameUser,'.$id,


            // validación antigua de cargo, por si se ocupa |regex:/^[\pL\s\-]+$/u|min:5|max:50|unique:usuarios,cargo,'.$id
        
        ];

        $mensaje=[
            'correo.required' => 'El :attribute no puede estar vacío.',
            'correo.regex' => 'El :attribute no cumple el formato correcto.',
            'correo.unique' => 'El :attribute debe de ser único.',
            'correo.max' => 'El  :attribute debe contener 35 letras como máximo.',
            'correo.min' => 'El :attribute debe contener 8 letras como mínimo.',
            
            'nameUser.required' => 'El nombre de usuario no puede estar vacío.',
            'nameUser.max' => 'El nombre debe tener como máximo 20 caracteres.',
            'nameUser.unique' => 'El nombre de usuario ya está en uso, este campo debe ser único.',
            'nameUser.min' => 'El nombre de usuario debe tener como mínimo 5 caracteres.',

      

        

        ];

    $this->validate($request,$rules,$mensaje);

        $actualizarUsuario = Usuario::findOrFail($id);

        
        $actualizarUsuario->correo = $request->input('correo');
        $actualizarUsuario->nameUser = $request->input('nameUser');
        


        $actualizado = $actualizarUsuario->save();

        if ($actualizado){
            return redirect()->route('listado.usuario')
                ->with('mensaje', 'Los datos del usuario han sido actualizados exitosamente');
        }

    }

    //Eliminar usuario
    public function destroy($id)
    {
        Usuario::destroy($id);

        return redirect()->route('listado.usuario')->with('mensaje', 'El usuario fue eliminado exitosamente');
    }
}
