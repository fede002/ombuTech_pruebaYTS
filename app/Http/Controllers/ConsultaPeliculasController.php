<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Servicios\srvYTS;

class ConsultaPeliculasController extends Controller
{
    public function verListadoDePeliculas(Request $rq)
    {
        $listadoDePeliculas = srvYTS::listarPeliculas(0);
        return view('home', compact("listadoDePeliculas"));
    }

    public function verListadoDePeliculas_json(Request $rq)
    {
        $listadoDePeliculas = srvYTS::listarPeliculas(0);
        //TODO: es feo pero ayuda a visualizar mejor la salida
        echo "<pre>";
        $listJson = json_encode($listadoDePeliculas, JSON_PRETTY_PRINT);
        return $listJson;
    }
}
