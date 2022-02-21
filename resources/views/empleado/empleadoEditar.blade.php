@extends('madre')
@section('title', 'Editar empleado')

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
        <h3> Editar datos del empleado</h3>
        <hr>

        <!--Formulario-->
        <div class="emple">
            <form method="post">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label for="identidad" class="col-lg-2 control-label offset-md-1 requerido hijo"> <i id="IcNewEmp" class="bi bi-credit-card-2-front"></i> Identidad</label>
                    <div class="col-sm-8">
                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               type = "number"
                               maxlength = "13" name="identidad" id="DNI_empleado" maxlength="13" placeholder="Escriba el número de identidad del empleado, sin guiones."
                               class="form-control" value="{{$empleado->identidad}}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nombres" class="col-lg-2 control-label offset-md-1 requerido hijo"><i id="IcNewEmp" class="bi bi-person-fill"></i>Nombres</label>
                    <div class="col-sm-8">
                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        type="text"  maxlength = "35"name="nombres" id="nombres" placeholder="Nombres del empleado" class="form-control" value="{{old('nombres', $empleado->nombres ?? '')}}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="apellidos" class="col-lg-2 control-label offset-md-1 requerido hijo"><i id="IcNewEmp" class="bi bi-person-fill"></i>Apellidos</label>
                    <div class="col-sm-8">
                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        type="text" maxlength = "35" name="apellidos" id="apellidos" placeholder="Apellidos del apellido." class="form-control" value="{{old('apellidos', $empleado->apellidos ?? '')}}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="genero" class="col-lg-2 control-label offset-md-1 requerido hijo">
                        <i id="IcNewEmp" class="bi bi-gender-ambiguous"></i>Género</label>
                    <div class="col-sm-8">
                        <select name="genero" id="genero" class="form-control"/>
                            <option value="{{$empleado->genero}}">{{$empleado->genero}}</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>    
                    </div>
                </div>

                <?php $fecha_actual = date("d-m-Y");?>

                <div class="form-group row">
                    <label for="fecha_ingreso" class="col-lg-2 control-label offset-md-1 requerido hijo"><i  id="IcNewEmp"class="bi bi-calendar-date"></i>Fecha de Ingreso</label>
                    <div class="col-sm-8">
                        <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control"
                               value="{{old('fecha_ingreso', $empleado->fecha_ingreso ?? '')}}"
                               max="<?php echo date('Y-m-d',strtotime($fecha_actual));?>"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fecha_de_nacimiento" class="col-lg-2 control-label offset-md-1 requerido hijo"><i  id="IcNewEmp"class="bi bi-calendar-month"></i>Fecha Nacimiento</label>
                    <div class="col-sm-8">
                        <input type="date" name="fecha_de_nacimiento" id="fecha_de_nacimiento" class="form-control"
                               value="{{old('fecha_de_nacimiento', $empleado->fecha_de_nacimiento ?? '')}}"
                               min="<?php echo date('Y-m-d',strtotime($fecha_actual."- 60 year"));?>"
                               max="<?php echo date('Y-m-d',strtotime($fecha_actual."- 18 year"));?>"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telefono" class="col-lg-2 control-label offset-md-1 requerido hijo"><i id="IcNewEmp" class="bi bi-telephone-forward"></i>Tel. Empleado</label>
                    <div class="col-sm-8">
                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               type = "number"
                               maxlength = "8" name="telefono" maxlength="8" placeholder="Ingrese un número de teléfono válido que contenga 8 números e inicie con 2, 3, 7, 8 o 9." id="telefono" class="form-control" value="{{old('telefono', $empleado->telefono ?? '')}}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="contacto_de_emergencia" class="col-lg-2 control-label offset-md-1 requerido hijo"><i id="IcNewEmp" class="bi bi-telephone-forward"></i>Contacto de emergencia</label>
                    <div class="col-sm-8">
                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               type = "number"
                               maxlength = "8" name="contacto_de_emergencia" maxlength="8" placeholder="Ingrese un número de teléfono válido que contenga 8 números e inicie con 2, 3, 7, 8 o 9." id="contacto_de_emergencia" class="form-control" value="{{old('contacto_de_emergencia', $empleado->contacto_de_emergencia ?? '')}}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 control-label offset-md-1 requerido hijo" for="direccion"><i id="IcNewServ" class="bi bi-pencil-square"></i>Direccion</label>
                    
                    <div class="col-sm-8">
                        <textarea oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="text" maxlength = "100" name="direccion" id="direccion" placeholder="Dirección de domicilio." class="form-control" cols="52" rows="1" value="{{old('direccion', $empleado->direccion ?? '')}}">{{$empleado->direccion}}</textarea>
                    </div>
                </div>
                <br>

                <!--Botones-->
                <a class="btn btn-warning" href="{{route('empleado.index')}}">Regresar</a>
                <button type="submit" class="btn btn-success" >Actualizar</button>
                <a class="btn btn-danger" href="{{route('empleado.index')}}">Cancelar</a>

          </form>

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
