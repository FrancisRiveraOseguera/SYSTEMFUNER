@extends('madre')

@section ('title' , 'Editar Permiso')

@section('content')

<div class="formato">
    <h3> Editar permiso</h3>
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
    <form method="post" action="" autocomplete="off">
        @csrf
        @method('put')
        <div class="form-group row">
                <label for="name" class="col-lg-3 control-label offset-md-1 requerido">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i id="IcNewEmp" class="bi bi-card-heading"></i>Nombre del permiso</label>
                    <div class="col-sm-7">
                <input type = "text"  
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength = "32" name="name" id="name"  minlenght="5"
                    placeholder="Ingrese el nombre del permiso" class="form-control"
                    value="{{$permisos->name}}"/>
        </div>
    </div>

        <div class="form-group row">
            <label for="descripcion" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i id="IcNewEmp" class="fas fa-tasks"></i>Descripción del permiso</label>
                <div class="col-sm-7">
                <textarea type = "text" rows="2" cols="52"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength = "84" name="descripcion" id="descripcion"
                    placeholder="Ingrese la descripción del permiso." class="form-control">{{$permisos->descripcion}}</textarea>
         </div>

        </div>

        <a class="btn btn-primary" href="{{route('permisos.lista')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a> 
        <button type="submit" class="btn btn-success" ><i class="bi bi-save"></i>Guardar</button>

    </form>
</div>


@endsection
