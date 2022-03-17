<?php

namespace App\Http\Controllers;
use App\Models\Servicio;
use Illuminate\Http\Request;

class DetalleServicioController extends Controller
{
    public function index($id){
        $ventas = Servicio::with('contadoventas')->where('id', $id)->get();
        return view('listadoVentaTipoServicio')->with('ventas', $ventas);

    }//fin de la función//
}
