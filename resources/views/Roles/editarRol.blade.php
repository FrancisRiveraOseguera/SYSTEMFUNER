@extends('madre')
@section ('title' , 'Editar rol')
@section('content')

<div class="formato">
    <h3>Editar rol</h3>
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
</div><br>

<div class="formato">
    <form method="post" action="{{route('rol.update', ['id'=> $role->id])}}" autocomplete="off">
        @csrf
        @method('put')
        <div class="form-group row">
            <label for="name" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i id="IcNewEmp" class="fa fa-id-card"></i>Nombre del rol:</label>
            <div class="col-sm-7">
                <input type="text"
                    maxlength = "15" minlenght="5" name="name" id="name" placeholder="Ingrese el nombre del rol."
                    class="form-control" value="{{old('name', $role->name)}}"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="descripcion" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i  id="IcNewEmp" class="bi bi-info-square"></i>Descripción:</label>
            <div class="col-sm-7">
                <textarea name="descripcion" id="descripcion" maxlength="100" minlenght="10"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                placeholder="Ingrese la descripción del rol, sea breve y específico."  rows="4"
                class="form-control">{{old('descripcion', $role->descripcion)}}</textarea>
            </div>
        </div>

        <!--Lista de permisos ya creados-->
        <div class="form-group row">
            <label for="permisos" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i id="IcNewEmp" class="fa fa-shield"></i>Permisos
            </label>
            <div class="col-sm-7">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
                    Ver lista de permisos
                </button>

                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fa fa-shield" id="exampleModalLabel"> Asignar permisos al rol</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!--Modal body-->
                            <div class="modal-body" style="padding: 2em;">
                                <div>
                                    <input type="text"  name="buscador" id="buscador" placeholder="Buscar permiso" style="width: 37%; height: 35px; margin-bottom: 20px;">
                                    <input type="button" class="btn btn-primary" style="margin-left: 15px; margin-right: 5px;" onclick='selectAll()' value="Seleccionar todos los permisos"/>
                                    <input type="button" class="btn btn-info" style="" onclick='UnSelectAll()' value="Quitar todos los permisos"/>
                                    @foreach ($permissions as $id => $permission)
                                    <tr>
                                        <td>
                                            <div class="form-check row">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" style="margin-left: 2px;"
                                                       value="{{$id}}" {{$role->permissions->contains($id) ? 'checked' : ''}}>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </div>
                                            <ul style="width: 100%; text-align: left;" class="permisos" id="permisos">
                                            {{$permission}}<hr>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @if($permissions->last())
                                        <tr>
                                            <td>
                                                <div class="form-check row">
                                                    <input class="form-check-input" type="text" disabled style="background: white; border: none;" name="permissions[]" style="margin-left: 2px;" value="">
                                                </div>

                                                <ul type="text" style="font-size: 15px; text-align: center; margin-bottom: -10px; color: black;">
                                                    No existen más permisos que coincidan con su búsqueda.
                                                </ul>
                                            </td>
                                        </tr>
                                    @endif
                                </div>
                            </div>
                            <!--Modal footer-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
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
@endsection
