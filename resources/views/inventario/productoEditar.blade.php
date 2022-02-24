@extends('madre')

@section ('title' , 'Actualizar inventario')

@section('content')

    <div class="emple">
    <h3>Actualizar inventario de  {{$producto->tipo}} </h3>
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
        @method('put')
        <div class="row mb-4">
         <div class="col">
        <div class="form-outline">
                <label for="responsable" class="form-label">
                    <i id="IcNewEmp" class="bi bi-person-fill"></i>Responsable</label>
                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "text"
                name="responsable" id="responsable"  maxlength = "35" placeholder="Nombre y apellido del responsable." class="form-control" 
                value="{{$producto->responsable}}"/> 

        </div>
        </div>   

        <div class="col">
        <div class="form-outline">
                <label for="tipo"  class="form-label"><i id="IcNewEmp" class="bi bi-card-list"></i>Tipo de servicio</label>
                <div class="col-sm-15 m-2" style="background-color:white; border:5px solid white; ">
                        {{$producto->tipo}}
                    </div>
        </div>
        </div>
        </div>  
        
  
        
     <div class="row mb-4">
      <div class="col">
        <?php $fecha_actual = date("d-m-Y");?>  
        <div class="form-outline">
                <label for="fecha_ingreso" class="form-label"><i id="IcNewEmp"class="bi bi-calendar-date"></i>Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" 
                value="{{$producto->fecha_ingreso}}"
                min="<?php echo date('Y-m-d',strtotime($fecha_actual."- 0 day"));?>"
                max="<?php echo date('Y-m-d',strtotime($fecha_actual."- 0 day"));?>"/>
        </div>
        </div>   

     <div class="col">
        <div class="form-outline">
                <label for="descripcion" class="form-label"><i  id="IcNewEmp"class="bi bi-signpost"></i>Descripción</label>
                <div class="col-sm-8">
                        <textarea  name="descripcion"  id="descripcion" disabled
                                   cols="65" rows="1" >{{$producto->descripcion}}
                        </textarea>
                    </div>
        </div>
        </div>
        </div>

        <div class="row mb-4">
         <div class="col">
        <div class="form-outline">
            <label for="cantidad_anterior" class="form-label"><i id="IcNewEmp" class="bi bi-clipboard-check"></i>Cantidad anterior</label>
            <input readonly="readonly" type="text" placeholder="Cantidad anterior del inventario." maxlength="3"
                id="cantidad_anterior" name="cantidad_anterior" class="form-control" 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                value="{{$producto->cantidad_actual}}"/>
            
        </div>
        </div>   

        <div class="col">
        <div class="form-outline">
            <label class="form-label "  for="categoria"><i  id="IcNewServ" class="bi bi-list-stars"></i>Categoría</label>
            <br>
            <div class="col-sm-15 mt-2" style="background-color:white; border:5px solid white; margin-rigth:5px;">
                        {{$producto->categoria}}
                    </div>
        </div>
        </div>
        </div>

        <div class="row mb-4">
        <div class="col">
        <div class="form-outline">
            <label for="cantidad_actual" class="form-label"><i id="IcNewEmp" class="bi bi-clipboard-check"></i>Cantidad actual</label>
            <input type="text" placeholder="Cantidad actual inventario." maxlength="3"
                id="cantidad_actual" name="cantidad_actual" class="form-control" 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                />
            
        </div>
        </div> 
        <div class="col"> </div>
        </div>  



        <br>

        <!--botones-->
        <div>
        <a class="btn btn-primary" href="{{route('inventario.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a> 
        <button type="submit" class="btn btn-success" ><i class="bi bi-save"></i>Guardar</button></div>

                

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