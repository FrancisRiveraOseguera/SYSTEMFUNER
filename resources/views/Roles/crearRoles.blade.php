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
    <form method="post" action="{{route('roles.store')}}" autocomplete="off">
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
                <textarea name="descripcion" id="descripcion" maxlength="70" minlenght="10"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                placeholder="Ingrese la descripción del rol, sea breve y específico."  rows="4" 
                class="form-control">{{old('descripcion')}}</textarea>
            </div>
        </div>

        <!--Lista de permisos ya creados mejorado-->
        <div class="form-group row">
            <label for="permisos" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i  id="IcNewEmp" class="fa fa-shield"></i>Permisos:</label>
            <div class="col-sm-7">
                <table class="table">
                    <tbody>
                    <input type="button" class="btn btn-primary" style="margin-right: 10%; height: 33px;" onclick='selectAll()' value="Seleccionar todos los permisos"/>
                    <input type="button" class="btn btn-info" style="height: 33px; margin-bottom: 5px" onclick='UnSelectAll()' value="Quitar todos los permisos"/>
                    @foreach ($permissions as $id => $permission)
                    <tr>
                        <td>
                            <div class="form-check row">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$id}}">
                                <span class="form-check-sign">
                                   <span class="check"></span>
                                </span>
                            </div>
                        </td>                 
                        <td style="width: 100%; text-align: left;" class="permisos" id="permisos">
                            {{$permission}}
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script type="text/javascript">
        function selectAll(){
            var subjects=document.getElementsByName('permissions[]');
            for(var i=0; i<subjects.length; i++){
            if(subjects[i].type=='checkbox')
                subjects[i].checked=true;
            }
        }
        
        function UnSelectAll(){
            var subjects=document.getElementsByName('permissions[]');
            for(var i=0; i<subjects.length; i++){
            if(subjects[i].type=='checkbox')
                subjects[i].checked=false;
            }
        }      
        </script>
        
        <!--botones-->
        <a class="btn btn-primary" href="{{route('roles.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a>
        <button type="submit" class="btn btn-success" ><i class="bi bi-save"></i>Guardar</button>
    </form>
</div>
@endsection