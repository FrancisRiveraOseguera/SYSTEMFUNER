@extends('madre')
@section ('title' , 'Nuevo Turno')
@section('content')

<div class="emple">
    <h3> Nuevo turno</h3>
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
</div><br>
@endif

<div class="emple">
    <form method="post" action="" autocomplete="off">
        @csrf
		<p style="background: rgba(227,223,168,0.4); padding: 5px; font-size: 13px; font-weight: bold; color: green; border-radius: 10px">Nota: Para evitar confusiones al ingresar los horarios, se trabaja con el sistema militar de 24 horas (Ejemplo: 1:00pm es igual a 13:00).</p>
		<div class="form-group row">
				<label for="name" class="col-lg-3 control-label offset-md-1 requerido">
					<i id="IcNewEmp" class="bi bi-card-heading"></i>Nombre del turno</label>
			<div class="col-sm-8" name="name">
				<input type = "text" style="margin-left: -13%"
					oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
					maxlength="25" min="5" name="name" id="name" placeholder="Nombre de turno" class="form-control"
					value="{{old('name', $turnos->name ?? '')}}"
				/>
			</div>
		</div>

		<div class="form-group row">
			<label for="horario_entrada" class="col-lg-3 control-label offset-md-1 requerido">
			<i id="IcNewEmp" class="bi bi-clock"></i>Hora de entrada</label>
			<div class="col-sm-8" name="horario">
				<input type = "time" style="margin-left: -13%"
					oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
					name="horario_entrada" id="horario_entrada"  maxlength = "5"
					placeholder="Horario de entrada que tendrá el empleado con este horario" class="form-control"
					value="{{old('horario_entrada', $turnos->horario_entrada ?? '')}}"
				/>
			</div>
		</div>

		<div class="form-group row">
			<label for="horario_salida" class="col-lg-2 control-label offset-md-1 requerido">
			<i id="IcNewEmp" class="bi bi-clock-fill"></i>Hora de salida</label>
			<div class="col-sm-8">
				<input type = "time"
					oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
					name="horario_salida" id="horario_salida"  maxlength = "5"
					placeholder="Horario de salida que tendrá el empleado con este horario" class="form-control"
					value="{{old('horario_salida', $turnos->horario_salida ?? '')}}"/>
			</div>
		</div><br>

		<a class="btn btn-primary" href="/turnos"><i class="bi bi-box-arrow-left"></i>Regresar</a> 
		<button type="submit" class="btn btn-success" ><i class="bi bi-save"></i>Guardar</button>

    </form>
</div>
@endsection
