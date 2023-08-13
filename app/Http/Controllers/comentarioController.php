<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;


class comentarioController extends Controller
{
    public function comentarioPublicacion($numero)
    {
       
        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/comentario/publicacion/$numero"; // Ajusta la URL según la ruta de tu microservicio
    
        try {
            $response = $guzzleClient->get($url);
    
            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody(), true);
    
            if ($statusCode === 200) {
                // $responseData ahora contiene las publicaciones obtenidas desde el microservicio
                // Puedes procesar los datos y pasarlos a la vista como sea necesario
                return  $responseData;
            } else {
                return response()->json(['error' => 'Error getting publicaciones'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ha ocurrido un error, no se pudo procesar la petición'], 500);
        }
    }


    public function registerComentary(Request $request,$idpublicacion)
    {
        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/comentario/crear/id/$idpublicacion";

        try {
            $response = $guzzleClient->post($url, [
                'json' => [
                    'contenido' => $request->input('contenidoComentario'),
                    'usuario'=>2

                   
                ]
            ]);
            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody(), true);
            if ($statusCode === 200) {
               return view("inicio");  
            } else {
                return view("inicio");  
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ha ocurrido un error, no se pudo procesar la peticion'], 500);
        }
    }
}
