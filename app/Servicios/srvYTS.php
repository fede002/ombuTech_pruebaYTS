<?php

namespace App\Servicios;

use GuzzleHttp\Client;

class srvYTS
{
    public static function listarPeliculas($limite)
    {
        $listadoDePeliculas = srvYTS::consultarServicio($limite);
        $listadoDePeliculas = $listadoDePeliculas->data->movies;

        $listadoDePeliculas_filtrado = [];
        foreach ($listadoDePeliculas as $key => $v) {
            //TODO: pasar a un entity model
            $pelicula = [
                "id" => $v->id, 
                "url"  =>  $v->url, 
                "titulo"  =>  $v->title_long, 
                "imagen" => $v->medium_cover_image, 
                "puntaje" => $v->rating
            ];
            $listadoDePeliculas_filtrado[] = $pelicula;
        }
        return $listadoDePeliculas_filtrado;
    }

    public static function consultarServicio($limite)
    {
        if (empty($limite)) {
            $limite = env("LIMITE_PELICULAS");
        }

        $url =  env("API_YTS"); // "https://yts.mx/api/v2/list_movies.json?minimum_rating=7&sort_by=year";
        $url = $url . "&limit=" .  $limite;
        $client = new Client();
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $respuesJson = ($response->getBody()->getContents());
        $listadoDePeliculas = json_decode($respuesJson);
        return $listadoDePeliculas;
    }
}
