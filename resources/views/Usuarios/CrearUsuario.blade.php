@extends('madre')
@section ('title' , 'Crear usuarios')
@section('content')

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
            <label for="identidad" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="bi bi-credit-card-2-front"></i>Identidad</label>
            <div class="col-sm-8">
                <input type="text"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                       maxlength = "13" name="identidad" id="identidad"
                       placeholder="Escriba el número de identidad del usuario, sin guiones ni espacios."
                class="form-control" value="{{old('identidad', $usuario->identidad ?? '')}}"/>
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
                value="{{old('nombres', $usuario->nombres ?? '')}}"/>
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
                value="{{old('apellidos', $usuario->apellidos ?? '')}}"/>
            </div>
        </div>


        <div class="form-group row">
            <label for="telefono" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="bi bi-telephone-forward"></i>Teléfono del usuario</label>
            <div class="col-sm-8">
            <input type="text" placeholder="Número de teléfono del usuario."
                id="telefono" name="telefono" maxlength="8" class="form-control"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                value="{{old('telefono', $usuario->telefono ?? '')}}"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="direccion" class="col-lg-2 control-label offset-md-1 requerido">
                <i  id="IcNewEmp" class="bi bi-signpost"></i>Dirección</label>
            <div class="col-sm-8">
                <textarea name="direccion" id="direccion" maxlength="100" style="resize: none;"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                placeholder="Dirección de domicilio del usuario."  rows="1" cols="52"
                class="form-control">{{old('direccion', $usuario->direccion ?? '')}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="ocupacion" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="fas fa-user-tie"></i>Cargo</label>
            <div class="col-sm-8">
                <select name="cargo" id="cargo"style=background:white>
                    <option selected disabled value="0" >Cargo del usuario dentro de la compañía</option>
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
                placeholder="Contraseña para el usuario." rows="1" cols="52" class="form-control masked">{{old('password', $usuario->password ?? '')}}</input>
                <i class="fa fa-eye" id="eye"></i>
            </div>
        </div>
        <br>

        <!--botones-->
        <a class="btn btn-primary" href=""><i class="bi bi-box-arrow-left"></i>Regresar</a>
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


    </style>


@endsection
