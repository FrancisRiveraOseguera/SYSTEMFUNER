@extends('madre')
@section('title', 'Editar empleado')

@section('content')

    <br>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" data-auto-dismiss="3000">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i>El Formulario Contiene Errores</h5>
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
                    <label for="DNI_empleado" class="col-lg-2 control-label offset-md-1 requerido hijo">Identidad</label>
                    <div class="col-sm-8">
                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               type = "number"
                               maxlength = "13" name="DNI_empleado" id="DNI_empleado" maxlength="13" placeholder="Escriba el número de identidad del empleado, sin guiones."
                               class="form-control" value="{{$empleado->DNI_empleado}}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nombres" class="col-lg-2 control-label offset-md-1 requerido hijo">Nombres</label>
                    <div class="col-sm-8">
                        <input type="text" name="nombres" id="nombres" placeholder="Nombres del empleado" class="form-control" value="{{old('nombres', $empleado->nombres ?? '')}}" required/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="apellidos" class="col-lg-2 control-label offset-md-1 requerido hijo">Apellidos</label>
                    <div class="col-sm-8">
                        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del apellido." class="form-control" value="{{old('apellidos', $empleado->apellidos ?? '')}}" required/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="genero" class="col-lg-2 control-label offset-md-1 requerido hijo">
                        <i id="IcNewEmp" class="bi bi-gender-ambiguous"></i>Género</label>
                    <div class="col-sm-8">
                        <select name="genero" id="genero" class="form-control" required/>
                            <option value="{{$empleado->genero}}">{{$empleado->genero}}</option>
                            <option value="Maculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>    
                    </div>
                </div>

                <div class="form-group row">
                    <label for="apellidos" class="col-lg-2 control-label offset-md-1 requerido hijo">Dirección</label>
                    <div class="col-sm-8">
                        <input type="text" name="direccion" id="direccion" placeholder="Dirección de domicilio." class="form-control" value="{{old('direccion', $empleado->direccion ?? '')}}" required/>
                    </div>
                </div>

                <?php $fecha_actual = date("d-m-Y");?>

                <div class="form-group row">
                    <label for="fecha_ingreso" class="col-lg-2 control-label offset-md-1 requerido hijo">Fecha de Ingreso</label>
                    <div class="col-sm-8">
                        <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control"
                               value="{{old('fecha_ingreso', $empleado->fecha_ingreso ?? '')}}" required
                               max="<?php echo date('Y-m-d',strtotime($fecha_actual));?>"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fecha_de_nacimiento" class="col-lg-2 control-label offset-md-1 requerido hijo">Fecha Nacimiento</label>
                    <div class="col-sm-8">
                        <input type="date" name="fecha_de_nacimiento" id="fecha_de_nacimiento" class="form-control"
                               value="{{old('fecha_de_nacimiento', $empleado->fecha_de_nacimiento ?? '')}}" required
                               min="<?php echo date('Y-m-d',strtotime($fecha_actual."- 60 year"));?>"
                               max="<?php echo date('Y-m-d',strtotime($fecha_actual."- 18 year"));?>"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telefono" class="col-lg-2 control-label offset-md-1 requerido hijo">Teléfono de Empleado</label>
                    <div class="col-sm-8">
                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               type = "number"
                               maxlength = "8" name="telefono" maxlength="8" placeholder="Número de teléfono del empleado." id="telefono" class="form-control" value="{{old('telefono', $empleado->telefono ?? '')}}" required/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="contacto_de_emergencia" class="col-lg-2 control-label offset-md-1 requerido hijo">Contacto de emergencia</label>
                    <div class="col-sm-8">
                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               type = "number"
                               maxlength = "8" name="contacto_de_emergencia" maxlength="8" placeholder="Número de emergencia del empleado." id="contacto_de_emergencia" class="form-control" value="{{old('contacto_de_emergencia', $empleado->contacto_de_emergencia ?? '')}}" required/>
                    </div>
                </div><br>

                <!--Botones-->
                <a class="btn btn-primary" href="/empleado">Regresar</a>
                <button type="submit" class="btn btn-success" >Guardar</button>

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

            </style>

@endsection
