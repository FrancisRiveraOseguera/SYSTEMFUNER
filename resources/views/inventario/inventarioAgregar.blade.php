@extends('madre')

@section ('title' , 'Agregar a inventario')

@section('content')

    <div class="emple">
    <h3>Nuevo producto en inventario</h3>
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

    <!--Formulario-->
    <div class="emple"> 
    <form method="post" action="" autocomplete="off">
        @csrf

        <div class="form-group row">
                <label for="tipo" class="col-lg-2 control-label offset-md-1 requerido"><i id="IcNewEmp" class="bi bi-card-list"></i>Tipo de servicio</label>
            <div class="col-sm-8">
                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "text"
                name="tipo" id="tipo"  maxlength = "25" placeholder="Nombre del servicio." class="form-control" 
                value="{{old('tipo', $inventario->tipo ?? '')}}"/>  
            </div>

        </div>
        
        <div class="form-group row">
            <label for="categoria" class="col-lg-2 control-label offset-md-1 requerido"><i id="IcNewEmp" class="bi bi-view-stacked"></i>Categoría</label>
            <div class="col-sm-8">
                <select name="categoria" id="categoria"  class="form-control" value="{{old('categoria', $inventario->categoria ?? '')}}"/>
                    <option selected disabled value="">Seleccione la categoría del producto</option>
                    <option value="Adulto">Adulto</option>
                    <option value="Juvenil">Juvenil</option>
                    <option value="Infantil">Infantil</option>
                </select>    
            </div>
        </div>

        <div class="form-group row">
            <label for="descripcion" class="col-lg-2 control-label offset-md-1 requerido"><i  id="IcNewEmp"class="bi bi-signpost"></i>Descripción</label>
            <div class="col-sm-8">
                <textarea name="descripcion" id="descripcion" maxlength="65" 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                placeholder="Breve descripción del producto."  rows="1" cols="52"
                class="form-control" value="{{old('descripcion', $inventario->descripcion ?? '')}}" ></textarea>
            </div>
        </div>

        <div class="form-group row">
                <label for="responsable" class="col-lg-2 control-label offset-md-1 requerido">
                    <i id="IcNewEmp" class="bi bi-person-fill"></i>Responsable</label>
            <div class="col-sm-8">
                <input type = "text"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                       maxlength = "35" name="responsable" id="responsable"
                       placeholder="Nombre y apellido del responsable." class="form-control"
                value="{{old('responsable', $inventario->responsable ?? '')}}"/>
            </div>
        </div>

        <?php $fecha_actual = date("d-m-Y");?>
        
        <div class="form-group row">
                <label for="fecha_ingreso" class="col-lg-2 control-label offset-md-1 requerido"><i id="IcNewEmp"class="bi bi-calendar-date"></i>Fecha de Ingreso</label>
            <div class="col-sm-8">
                <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" 
                value="{{old('fecha_ingreso', $inventario->fecha_ingreso ?? '')}}"
                min="<?php echo date('Y-m-d',strtotime($fecha_actual."- 0 day"));?>"
                max="<?php echo date('Y-m-d',strtotime($fecha_actual."- 0 day"));?>"/>
            </div>
        </div>
            
        <div class="form-group row">
            <label for="cantidad_anterior" class="col-lg-2 control-label offset-md-1 requerido"><i id="IcNewEmp" class="bi bi-clipboard-check"></i>Cantidad anterior</label>
            <div class="col-sm-8">
            <input type="text" placeholder="Cantidad anterior de  inventario." maxlength="3"
                id="cantidad_anterior" name="cantidad_anterior" class="form-control" 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                value="{{old('cantidad_anterior', $inventario->cantidad_anterior ?? '')}}"/>
            </div>
        </div>


        <div class="form-group row">
            <label for="cantidad_actual" class="col-lg-2 control-label offset-md-1 requerido"><i id="IcNewEmp" class="bi bi-clipboard-check"></i>Nueva cantidad</label>
            <div class="col-sm-8">
            <input type="text" placeholder="Nueva cantidad del inventario." maxlength="3"
                id="cantidad_actual" name="cantidad_actual" class="form-control" 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                value="{{old('cantidad_actual', $inventario->cantidad_actual ?? '')}}"/>
            </div>
        </div>

        <br>

        <!--botones-->
        <a class="btn btn-primary" href="{{route('inventario.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a> 
        <button type="submit" class="btn btn-success" ><i class="bi bi-save"></i>Guardar</button>

                

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


        #IcNewEmp{
        font-size:25px;
        width: 1em;
        height: 1em;
    }

       
    </style>    


@endsection   