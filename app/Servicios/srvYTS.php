<?php
namespace App\Servicios;
use GuzzleHttp\Client;

class srvYTS 
{
    public static function listarPeliculas( $limite)
    {
        $listadoDePeliculas = srvYTS::consultarServicio($limite);                        
        $listadoDePeliculas = $listadoDePeliculas->data->movies;
        return $listadoDePeliculas;
    }

    public static function consultarServicio( $limite)
    {
        if(empty($limite)){            
            $limite = env("LIMITE_PELICULAS");
        }
        
        $url =  env("API_YTS") ; // "https://yts.mx/api/v2/list_movies.json?minimum_rating=7&sort_by=year";
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
