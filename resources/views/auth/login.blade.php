@extends('layouts.app')

@section('formulario')
<form method="POST" action="{{ route('login') }}" autocomplete="off">
    @csrf
    <div class="login__form">
        <div class="login__row">
            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
            </svg>
            <input type="correo" name="correo" class="login__input name @error('correo') is-invalid @enderror" placeholder="Correo electrónico"/>
            @error('correo')
                <span class="invalid-feedback" role="alert" style="font-size: 13px;color:red">
                    @if ($message == 'El campo correo es obligatorio.')
                    El campo correo electrónico es obligatorio.
                    @else
                    {{$message}}
                    @endif
                </span>
            @enderror
        </div>
        <br><br>
        <div class="login__row">
            <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
            </svg>
            <input type="password" name="password"  class="login__input pass @error('password') is-invalid @enderror" placeholder="Contraseña"/>
            @error('password')
                <span class="invalid-feedback" role="alert" style="font-size: 14px;color:red">
                    @if ($message == 'El campo password es obligatorio.')
                        El campo contraseña es obligatorio.
                    @endif
                    
                </span>
            @enderror
        </div>
        <button type="submit" class="login__submit">Iniciar Sesión</button>
    </div>
</form>
@endsection
