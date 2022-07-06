@extends('madre')
@section ('title' , 'Crear usuarios')
@section('content')

<?php
    include 'conexion.php';
    $query=mysqli_query($mysqli,"SELECT id, nombres, apellidos FROM empleados");

    if(isset($_POST['empleado_id']))
    {
        $empleado_id=$_POST['empleado_id'];
        echo $empleado_id;
    }

?>

<div class="emple">
    <h3> Nuevo Usuario</h3>
    <hr>
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible" data-auto-dismiss="3000">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i>El formulario contiene errores</h5>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

</div> <br>

    <!--Formulario para ingresar los datos del usuario-->
    <div class="emple">
    <form method="post" action="" autocomplete="off">
        @csrf

        <div class="form-group row">
                <label for="nombres" class="col-lg-3 control-label offset-md-1 requerido">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i id="IcNewEmp" class="bi bi-person-fill"></i>Nombre del empleado:</label>
            <div class="col-sm-7">
                <select name="empleado_id" style="width: 94%; height: 100%;"class=" form-control">
                    @if (isset($ident))
                        <option style="display: none" value="{{$ident->id}}">{{$ident->nombres}} {{$ident->apellidos}}</option>
                    @else
                        <option selected disabled value="0">Seleccione el nombre del empleado que será dueño de este usuario.</option>
                    @endif
                    <?php
                    while($datos = mysqli_fetch_array($query))
                    {?>
                    <option value="<?php echo $datos['id']?>"> <?php echo $datos['nombres' ].' '.$datos['apellidos' ]?> </option>
                    <?php
                    }?>
                </select>
            </div>
        </div>


        <div>
        <script src='../../js/select2.min.js'></script>
        <script type="text/javascript">
            $(document).ready(function(){
            $('empleado_id').select2();
            });
        </script>
    </div>

    <div class="form-group row">
            <label for="correo" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i id="IcNewEmp" class="fa fa-envelope-o"></i>Correo electrónico:</label>
            <div class="col-sm-7">
                <input type="text"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength = "35" name="correo" id="correo" style="width: 94%; height: 100%;"
                    placeholder="Ingrese el correo electrónico del usuario, sin guiones ni espacios."
                class="form-control" value="{{old('correo', $usuario->correo ?? '')}}"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="nameUser" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i  id="IcNewEmp" class="fa fa-user-circle-o"></i>Nombre del usuario:</label>
            <div class="col-sm-7">
                <textarea name="nameUser" id="nameUser" style="width: 94%; height: 100%;" maxlength="20" style="resize: none;"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                placeholder="Ingrese el nombre que utilizará el usuario."  rows="1" cols="52"
                class="form-control">{{old('nameUser', $usuario->nameUser ?? '')}}</textarea>
            </div>
        </div>


        <div class="form-group row">
            <label for="pass1" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i  id="IcNewEmp" class="bi bi-key"></i>Contraseña:</label>
            <div class="col-sm-7">
                <input type="password" style="width: 94%; height: 100%;" placeholder="  Ingrese la contraseña, mínimo 8 letras." id="pass1" class="masked" name="password" maxlength="20" style="resize: none;"
                placeholder="Contraseña para el usuario." rows="1" cols="52" class="form-control masked">{{old('password', $usuario->password ?? '')}}</input>
                <i class="fa fa-eye" id="eye"></i>
            </div>
        </div>

        <div class="form-group row">
            <label for="pass2" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i  id="IcNewEmp" class="bi bi-key"></i>Confirme contraseña:</label>
            <div class="col-sm-7">
                <input type="password" style="width: 94%; height: 100%;" placeholder="  Confirme la contraseña." id="pass2"
                       class="masked" name="password_confirmation" maxlength="20" style="resize: none;"
                       placeholder="Contraseña para el usuario." rows="1" cols="52" class="form-control masked">
            </div>
            <div id="error2"></div> <i id="G"></i>
        </div>


        <div class="form-group row ml-4">
            <label for="roles" class="col-lg-3 control-label offset-md-1 requerido">
                <i class="pl-2 bi bi-person-rolodex "></i>Rol del usuario:
            </label>
            <div class="col-sm-7">
                <div class="form-group">
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <table class="table w-50">
                                <tbody>
                                @foreach ($roles as $id => $role)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="roles[]" value="{{$id}}">
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            {{$role}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--botones-->
        <a class="btn btn-primary" href="{{route('listado.usuario')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a>
        <button type="submit" class="btn btn-success" ><i class="bi bi-save"></i>Guardar</button>
    </form>
</div>

<script src="/../js/showPass.js"></script>

<style>
        .emple {
            border-top: 1px solid #E6E6E6 ;
            border-left: 1px solid #E6E6E6 ;
            border-right: 1px solid #E6E6E6;
            border-bottom: 1px solid #E6E6E6 ;
            padding: 20px;
            background-color: #E0F8F7;
            position:relative;
        }

        .emple{
            font-style: bold;
            font-family: 'Times New Roman', Times, serif;
        }


        #IcNewEmp{
        font-size:25px;
        width: 1em;
        height: 1em;
    }

    #G{
        margin-left: 35%;
    }

    #error2{
        margin-left: 45px;
        margin-top: -8px;
    }

    </style>


@endsection
