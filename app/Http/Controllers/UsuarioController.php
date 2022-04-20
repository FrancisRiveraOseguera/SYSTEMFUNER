<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Crypt;

class UsuarioController extends Controller
{

    public function index(Request $request)
    { 
        $busqueda = trim($request->get('busqueda'));
        $usuarios = DB::table('usuarios')

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
            'empleado_id' => 'required|exists:App\Models\Empleado,id',
            'nameUser' => 'required|max:20|unique:usuarios,nameUser',
            'cargo' => 'required',
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
            'correo.required' => 'El campo :attribute no puede estar vacío.',
            'correo.regex' => 'El campo :attribute no cumple el formato correcto.',
            'correo.unique' => 'El campo :attribute debe de ser único.',

            'empleado_id.exists' => 'El campo nombre del empleado no fue seleccionado.',
            'empleado_id.required' => 'El campo nombre del empleado no fue seleccionado.',

            'nameUser.required' => 'El campo nombre de usuario no puede estar vacío.',

            'cargo.required'  => 'El campo :attribute no puede estar vacío.',

            'password.required'  => 'El campo contraseña no puede estar vacío.',
            'password.min'  => 'La contraseña es insegura, para mayor seguridad debe poseer 8 caracteres como mínimo.',
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevoUser= new Usuario();


        $nuevoUser->correo = $request->input('correo');
        $nuevoUser->empleado_id = $request->input('empleado_id');
        $nuevoUser->nameUser = $request->input('nameUser');
        $nuevoUser->cargo = $request->input('cargo');
        $nuevoUser->password = $request->input('password');
        $nuevoUser->password = bcrypt($request->password);

        $creado = $nuevoUser->save();

        if ($creado) {
            if($creado){
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
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u|max:35',
            'apellidos' => 'required|regex:/^[\pL\s\-]+$/u|max:35',
            'nameUser' => 'required|max:20|unique:usuarios,nameUser,'.$id,
            'cargo' => 'required|regex:/^[\pL\s\-]+$/u|min:5|max:50|unique:usuarios,cargo,'.$id,
            'password' => [
                'required', 'max:30',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'password_confirmation' => 'min:8|max:50|same:password',
        ];

        $mensaje=[
            'correo.required' => 'El campo :attribute no puede estar vacío.',
            'correo.regex' => 'El campo :attribute no cumple el formato correcto.',
            'correo.unique' => 'El campo :attribute debe de ser único.',

            'nombres.required' => 'El campo :attribute no puede estar vacío.',
            'nombres.regex' => 'El campo :attribute solo debe contener letras. ',
            'nombres.max' => 'El campo :attribute debe contener 35 letras como máximo.',

            'apellidos.required' => 'El campo :attribute no puede estar vacío.',
            'apellidos.regex' => 'El campo :attribute solo debe contener letras. ',
            'apellidos.max' => 'El campo :attribute debe contener 35 letras como máximo.',

            'correo.required' => 'El campo :attribute no puede estar vacío.',
            'correo.max' => 'El campo :attribute debe contener 35 letras como máximo.',
            'correo.min' => 'El campo :attribute debe contener 8 letras como mínimo.',

            'cargo.required'  => 'El campo :attribute no puede estar vacío.',

            'password.required'  => 'El campo Contraseña no puede estar vacío.',
            'password.alpha_num'  => 'El campo Contraseña debe tener letras y números',
        ];

    $this->validate($request,$rules,$mensaje);

        $actualizarUsuario = Usuario::findOrFail($id);

        
        $actualizarUsuario->correo = $request->input('correo');
        $actualizarUsuario->nombres = $request->input('nombres');
        $actualizarUsuario->apellidos = $request->input('apellidos');
        $actualizarUsuario->nameUser = $request->input('nameUser');
        $actualizarUsuario->cargo = $request->input('cargo');
        $actualizarUsuario->password = $request->input('password');


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
