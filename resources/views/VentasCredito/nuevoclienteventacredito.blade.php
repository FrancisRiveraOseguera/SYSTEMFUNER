@extends('madre')

@section ('title' , 'Nuevo Cliente')

@section('content')

    <div class="emple">
    <h3> Nuevo cliente</h3>
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

    <!--Formulario para ingresar los datos del cliente-->
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
                       placeholder="Escriba el número de identidad del cliente, sin guiones ni espacios."
                class="form-control" value="{{old('identidad', $cliente->identidad ?? '')}}"/>
            </div>
        </div>


        <div class="form-group row">
                <label for="nombres" class="col-lg-2 control-label offset-md-1 requerido">
                    <i id="IcNewEmp" class="bi bi-person-fill"></i>Nombres</label>
            <div class="col-sm-8">
                <input type = "text"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                       maxlength = "35" name="nombres" id="nombres"
                       placeholder="Nombres del cliente." class="form-control"
                value="{{old('nombres', $cliente->nombres ?? '')}}"/>
            </div>
        </div>


        <div class="form-group row">
            <label for="apellidos" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="bi bi-person-fill"></i>Apellidos</label>
            <div class="col-sm-8">
                <input type = "text"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                       maxlength = "35" name="apellidos" id="apellidos"
                       placeholder="Apellidos del cliente." class="form-control"
                value="{{old('apellidos', $cliente->apellidos ?? '')}}"/>
            </div>
        </div>


        <?php $fecha_actual = date("d-m-Y");?>
        <div class="form-group row">
            <label for="fecha_de_nacimiento" class="col-lg-2 control-label offset-md-1 requerido">
                <i  id="IcNewEmp" class="bi bi-calendar-month"></i>Fecha Nacimiento</label>
            <div class="col-sm-8">
                <input type="date" name="fecha_de_nacimiento" id="fecha_de_nacimiento" class="form-control"
                value="{{old('fecha_de_nacimiento', $cliente->fecha_de_nacimiento ?? '')}}"
                min="<?php echo date('Y-m-d',strtotime($fecha_actual."- 100 year"));?>"
                max="<?php echo date('Y-m-d',strtotime($fecha_actual."- 18 year"));?>"/>
            </div>
        </div>


        <div class="form-group row">
            <label for="telefono" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="bi bi-telephone-forward"></i>Teléfono del Cliente</label>
            <div class="col-sm-8">
            <input type="text" placeholder="Número de teléfono del cliente."
                id="telefono" name="telefono" maxlength="8" class="form-control"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                value="{{old('telefono', $cliente->telefono ?? '')}}"/>
            </div>
        </div>


        <div class="form-group row">
            <label for="direccion" class="col-lg-2 control-label offset-md-1 requerido">
                <i  id="IcNewEmp" class="bi bi-signpost"></i>Dirección</label>
            <div class="col-sm-8">
                <textarea name="direccion" id="direccion" maxlength="100"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                placeholder="Dirección de domicilio del cliente."  rows="1" cols="52"
                class="form-control">{{old('direccion', $cliente->direccion ?? '')}}</textarea>
            </div>
        </div>


        <div class="form-group row">
            <label for="ocupacion" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="fas fa-user-tie"></i>Ocupación</label>
            <div class="col-sm-8">
                <input type = "text"
                       oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                       maxlength = "50" name="ocupacion" id="ocupacion"
                       placeholder="Profesión u oficio del cliente." class="form-control"
                       value="{{old('ocupacion', $cliente->ocupacion ?? '')}}"/>
            </div>
        </div>
        <br>

        <!--botones-->
        <a class="btn btn-primary" href="{{route('listado.clientes')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a>
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