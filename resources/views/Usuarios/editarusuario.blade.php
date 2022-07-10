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

<div class="formato">
    <h3> Editar datos del usuario</h3>
    <hr>

    <!--Formulario-->
    <div class="formato">
        <form method="post">
            @csrf
            @method('put')
            <div class="form-group row">
                <label for="correo" class="col-lg-3 control-label offset-md-1 requerido">
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
                <label for="empleado_id" class="col-lg-3 control-label offset-md-1 requerido">
                    <i id="IcNewEmp" class="bi bi-person-fill"></i>Nombre del empleado</label>
            <div class="col-sm-8">
                <input type = "text" readonly
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                       maxlength = "35" name="empleado_id" id="empleado_id"
                       placeholder="Nombres del usuario." class="form-control"
                value="{{$usuario->empleados->nombres }}&nbsp;{{ $usuario->empleados->apellidos}}"/>
            </div>
        </div>


        <div class="form-group row">
            <label for="nameUser" class="col-lg-3 control-label offset-md-1 requerido">
                <i  id="IcNewEmp" class="fa fa-user-circle-o"></i>Nombre del usuario</label>
            <div class="col-sm-8">
                <textarea name="nameUser" id="nameUser" maxlength="20" style="resize: none;"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                placeholder="Nombre que utilizará el usuario."  rows="1" cols="52"
                class="form-control">{{$usuario->nameUser}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="roles" class="col-lg-3 control-label offset-md-1 requerido">
                <i class="pl-2 bi bi-person-rolodex "></i>Rol del usuario:
            </label>
            <div class="col-sm-7">
                <div class="form-group">
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <table class="table table-sm w-25">
                                <tbody>
                                @foreach ($roles as $id => $role)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="roles[]"
                                                       value="{{$id}}" {{$usuario->roles->contains($id) ? 'checked' : ''}}>
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

        <br>
        <!--Botones-->
        <div>
            <a class="btn btn-primary" href="{{route('listado.usuario')}}" > <i class="bi bi-box-arrow-left"></i>Regresar</a>
            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i>Guardar Cambios</button>
        </div>
        <br>
    </form>
</div>
<script src="/../js/showPass.js"></script>
@endsection
