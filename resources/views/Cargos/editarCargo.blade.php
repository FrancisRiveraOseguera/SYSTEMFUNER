@extends('madre')

@section ('title' , 'Editar cargo')

@section('content')

<div class="formato">
    <h3> Editar cargo</h3>
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

<!--Formulario-->
    <div class="formato">
    <form method="post" >
        @csrf
        @method('put')

        <div class="form-group row">
                <label for="cargo" class="col-lg-2 control-label offset-md-1 requerido">
                    <i id="IcNewEmp" class="bi bi-card-heading"></i>Tipo de cargo</label>
            <div class="col-sm-8">
                <input type = "text" 
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength = "50" name="cargo" id="cargo"
                    placeholder="Nombre del cargo" class="form-control"
                    value="{{$cargo->cargo}}"/>
            </div>
        </div>


        <div class="form-group row">
            <label for="sueldo" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="bi bi-cash-coin"></i>Sueldo mensual</label>
            <div class="col-sm-8">
                <input type = "text"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    name="sueldo" id="sueldo"  maxlength = "5"
                    placeholder="Sueldo que será pagado al empleado con este cargo" class="form-control"
                    value="{{$cargo->sueldo}}"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="detalles_cargo" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="fas fa-tasks"></i>Tareas del cargo</label>
            <div class="col-sm-8">
                <textarea rows="10" cols="52" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    name="detalles_cargo" id="detalles_cargo"  maxlength = "1000" minlenght = "25"
                    placeholder="Descripción de tareas a realizar en este cargo." class="form-control">{{$cargo->detalles_cargo}}</textarea>
            </div>
        </div>
        <br>

        <a class="btn btn-primary" href="/listadoCargos"><i class="bi bi-box-arrow-left"></i>Regresar</a> 
        <button type="submit" class="btn btn-success" ><i class="bi bi-save"></i>Guardar</button>

    </form>
</div>

@endsection