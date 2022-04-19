@extends('madre')
@section('title', 'Editar usuario')

@section('content')

    <br>
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

    <div class="emple">
        <h3> Editar datos del Usuario</h3>
        <hr>

        <!--Formulario-->
        <div class="emple">
            <form method="post">
                @csrf
                @method('put')
                <div class="form-group row">
            <label for="correo" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="fa fa-envelope-o"></i>Correo electrónico</label>
            <div class="col-sm-8">
                <input type="text"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                       maxlength = "35" name="correo" id="correo"
                       placeholder="Ingrese el correo electrónico del usuario, sin guiones ni espacios."
                class="form-control" value="{{$usuario->correo}}"/>
            </div>
        </div>


        <div class="form-group row">
                <label for="nombres" class="col-lg-2 control-label offset-md-1 requerido">
                    <i id="IcNewEmp" class="bi bi-person-fill"></i>Nombres</label>
            <div class="col-sm-8">
                <input type = "text"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                       maxlength = "35" name="nombres" id="nombres"
                       placeholder="Nombres del usuario." class="form-control"
                value="{{$usuario->nombres}}"/>
            </div>
        </div>


        <div class="form-group row">
            <label for="apellidos" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="bi bi-person-fill"></i>Apellidos</label>
            <div class="col-sm-8">
                <input type = "text"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                       maxlength = "35" name="apellidos" id="apellidos"
                       placeholder="Apellidos del usuario." class="form-control"
                value="{{$usuario->apellidos}}"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="nameUser" class="col-lg-2 control-label offset-md-1 requerido">
                <i  id="IcNewEmp" class="fa fa-user-circle-o"></i>Nombre del usuario</label>
            <div class="col-sm-8">
                <textarea name="nameUser" id="nameUser" maxlength="20" style="resize: none;"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                placeholder="Nombre que utilizará el usuario."  rows="1" cols="52"
                class="form-control">{{$usuario->nameUser}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="ocupacion" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="fas fa-user-tie"></i>Cargo</label>
            <div class="col-sm-8">
                <select name="cargo" id="cargo"style=background:white>
                    <option value="{{$usuario->cargo}}">{{$usuario->cargo}}</option>
                    <option value="Gerente">Gerente</option> 
                    <option value="Subgerente">Subgerente</option> 
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-lg-2 control-label offset-md-1 requerido">
                <i  id="IcNewEmp" <i class="bi bi-key"></i>Contraseña</label>
            <div class="col-sm-8">
                <input type="password" style="width: 95%; height: 100%;" placeholder="  Ingresa la contraseña, mínimo 8 letras." id="password" class="masked" name="password" maxlength="20" style="resize: none;"
                placeholder="Contraseña para el usuario." rows="1" cols="52" class="form-control masked"  value="{{$usuario->password}}"></input>
                <i class="fa fa-eye" id="eye"></i>
            </div>
        </div>
        <br>
                <!--Botones-->
                <div>
                    <a class="btn btn-primary" href="{{route('empleado.index')}}" > <i class="bi bi-box-arrow-left"></i>Regresar</a>
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i>Guardar Cambios</button>
                </div><br>
                    
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

                .hijo{
                    font-weight: bold;
                }
                #IcNewEmp{
                     font-size:25px;
                    width: 1em;
                     height: 1em;}

            </style>

@endsection