@extends('madre')
@section ('title' , 'Crear roles')
@section('content')

<div class="emple">
    <h3>Nuevo rol</h3>
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

    <div class="emple">
    <form method="post" action="" autocomplete="off">
        @csrf

    <div class="form-group row">
            <label for="name" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i id="IcNewEmp" class="fa fa-id-card"></i>Nombre del rol:</label>
            <div class="col-sm-7">
                <input type="text"
                    maxlength = "50" minlenght="5" name="name" id="name" placeholder="Ingrese el nombre del rol."
                    class="form-control" value="{{old('name')}}"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="descripcion" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i  id="IcNewEmp" class="bi bi-info-square"></i>Descripción:</label>
            <div class="col-sm-7">
                <textarea name="descripcion" id="descripcion" maxlength="100" minlenght="10"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                placeholder="Ingrese la descripción del rol."  rows="4" 
                class="form-control">{{old('descripcion')}}</textarea>
            </div>
        </div>

        <!--Lista de permisos ya creados-->
        <div class="form-group row">
                    <label for="permisos" style="margin-left: 12%;" class="col-lg-3 control-label offset-md-1 requerido"><i  id="IcNewEmp" class="fa fa-shield"></i>Permisos</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <table class="table">
                                        <tbody>
                                            @foreach ($permissions as $id => $permission)
                                            <tr>
                                                <td>
                                                    <div class="form-check row">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$id}}">
                                                            <span class="form-check-sign">
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td style="width: 20%; float:left" id="permisos">
                                                    {{$permission}}
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
        <a class="btn btn-primary" href="{{route('roles.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a>
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