@extends('madre')

@section ('title' , 'Nuevo Cargo')

@section('content')

<div class="emple">
    <h3> Nuevo Cargo</h3>
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

    <div class="emple">
    <form method="post" action="" autocomplete="off">
        @csrf
    
        <div class="form-group row">
                <label for="cargo" class="col-lg-2 control-label offset-md-1 requerido">
                    <i id="IcNewEmp" class="bi bi-card-heading"></i>Tipo de cargo</label>
            <div class="col-sm-8">
                <input type = "text"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength = "70" name="cargo" id="cargo"
                    placeholder="Nombre del cargo" class="form-control"
                    value="{{old('cargo', $cargos->cargo ?? '')}}"/>
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
                    value="{{old('sueldo', $cargos->sueldo ?? '')}}"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="detalles_cargo" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="fas fa-tasks"></i>Tareas del cargo</label>
            <div class="col-sm-8">
                <textarea rows="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    name="detalles_cargo" id="detalles_cargo"  maxlength = "2000" minlenght = "25"
                    placeholder="Descripción de tareas a realizar en este cargo." class="form-control"
                    value="{{old('detalles_cargo', $cargos->detalles_cargo ?? '')}}"></textarea>
            </div>
        </div>
        <br>

        <a class="btn btn-primary" href="/listadoCargos"><i class="bi bi-box-arrow-left"></i>Regresar</a> 
        <button type="submit" class="btn btn-success" ><i class="bi bi-save"></i>Guardar</button>

    </form>
</div>

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
