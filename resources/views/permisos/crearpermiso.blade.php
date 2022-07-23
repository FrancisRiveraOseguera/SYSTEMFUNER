@extends('madre')

@section ('title' , 'Nuevo Permiso')

@section('content')


<div class="formato">
    <h3> Nuevo permiso</h3>
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

    <div class="form-group row">
        <label for="name" class="col-lg-3 control-label offset-md-1 requerido">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <i id="IcNewEmp" class="bi bi-card-heading"></i>Nombre del permiso</label>
        <div class="col-sm-7"> 
        <select name="name" id="name"  class="form-control" value="{{old('name')}}" >
                <option selected disabled value="none">Elige el nombre del permiso</option>
                <option value="Listado_cargos">Listado_cargos</option> 
                <option value="Nuevo_cargo">Nuevo_cargo</option> 
                <option value="Editar_cargo">Editar_cargo</option> 
                <option value="Detalles_cargos">Detalles_cargos</option>
                <option value="Listado_clientes">Listado_clientes</option> 
                <option value="Nuevo_cliente">Nuevo_cliente</option> 
                <option value="Editar_clientes">Editar_clientes</option> 
                <option value="Detalles_clientes">Detalles_clientes</option>
                <option value="Listado_ventas">Listado_ventas</option> 
                <option value="Detalles_ventas_contado">Detalles_ventas_contado</option> 
                <option value="Pdf_ventas_contado">Pdf_ventas_contado</option> 
                <option value="Nueva_ventas_contado">Nueva_ventas_contado</option>
                <option value="Principal_ventas">Principal_ventas</option> 
                <option value="Listado_ventas_crédito">Listado_ventas_crédito</option> 
                <option value="Detalles_ventas_crédito">Detalles_ventas_crédito</option> 
                <option value="Nueva_venta_crédito">Nueva_venta_crédito</option>
                <option value="Pdf_ventas_crédito">Pdf_ventas_crédito</option> 
                <option value="Servicios_usados">Servicios_usados</option> 
                <option value="servicios_usados_saldo_0">servicios_usados_saldo_0</option> 
                <option value="Servicio_contado_venta">Servicio_contado_venta</option>
                <option value="Servicio_crédito_venta">Servicio_crédito_venta</option> 
                <option value="Listado_Empleados">Listado_Empleados</option> 
                <option value="Nuevo_empleado">Nuevo_empleado</option> 
                <option value="Editar_empleado">Editar_empleado</option>
                <option value="Detalles_empleados">Detalles_empleados</option> 
                <option value="Desactivar_empleados">Desactivar_empleados</option> 
                <option value="Empleados_desactivados">Empleados_desactivados</option> 
                <option value="Detalles_empleados_desactivados">Detalles_empleados_desactivados</option>
                <option value="Habilitar_empleados">Habilitar_empleados</option> 
                <option value="Pdf_constancia_trabajo">Pdf_constancia_trabajo</option> 
                <option value="Listado_gasto">Listado_gasto</option> 
                <option value="Nuevo_gasto">Nuevo_gasto</option>
                <option value="Pdf_gasto">Pdf_gasto</option> 
                <option value="Detalles_gasto">Detalles_gasto</option> 
                <option value="Listado_inventario">Listado_inventario</option>
                <option value="Nuevo_inventario">Nuevo_inventario</option> 
                <option value="Cantidad_inventario">Cantidad_inventario</option> 
                <option value="Nuevo_pago">Nuevo_pago</option> 
                <option value="Pdf_recibo_pago">Pdf_recibo_pago</option>
                <option value="Historial_pagos">Historial_pagos</option> 
                <option value="Detalles_pagos">Detalles_pagos</option> 
                <option value="Listado_permisos">Listado_permisos</option> 
                <option value="Nuevo_permiso">Nuevo_permiso</option>
                <option value="Editar_permisos">Editar_permisos</option> 
                <option value="Eliminar_permisos">Eliminar_permisos</option>
                <option value="Listado_roles">Listado_roles</option> 
                <option value="Nuevo_roles">Nuevo_roles</option> 
                <option value="Editar_roles">Editar_roles</option> 
                <option value="Eliminar_rol">Eliminar_rol</option>
                <option value="Listado_servicios">Listado_servicios</option> 
                <option value="Nuevo_servicio">Nuevo_servicio</option> 
                <option value="Editar_servicio">Editar_servicio</option> 
                <option value="Detalles_servicios">Detalles_servicios</option>
                <option value="Listado_usuario">Listado_usuario</option> 
                <option value="Nuevo_usuario">Nuevo_usuario</option> 
                <option value="Editar_usuario">Editar_usuario</option> 
                <option value="Eliminar_usuario">Eliminar_usuario</option>
                <option value="Listado_deudores">Listado_deudores</option>
                <option value="Editar_turno">Editar_turno</option>
            </select>     
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
                    placeholder="Ingrese la descripción del permiso." class="form-control">{{old('descripcion')}}</textarea>
        </div>

        </div>
        <br><br>

        <a class="btn btn-primary" href="{{route('permisos.lista')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a> 
        <button type="submit" class="btn btn-success" ><i class="bi bi-save"></i>Guardar</button>

    </form>
</div>


@endsection
