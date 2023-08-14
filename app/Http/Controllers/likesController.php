<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class likesController extends Controller
{
    public function getAllLikes($idpublicacion)
    {
        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/likes/publicacion/$idpublicacion"; // Ajusta la URL según la ruta de tu microservicio
    
        try {
            $response = $guzzleClient->get($url);
    
            $statusCode = $response->getStatusCode();
           
           
            if ($statusCode === 200) {
                // $responseData ahora contiene las publicaciones obtenidas desde el microservicio
                // Puedes procesar los datos y pasarlos a la vista como sea necesario
                $responseData =$response->getBody();
            return $responseData;
            } else {
                return response()->json(['error' => 'Error getting publicaciones'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ha ocurrido un error, no se pudo procesar la petición'], 500);
        }
    }


    public function giveLike(Request $request,$idpublicacion,$idusuario)
    {
        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/likes/darlike/$idpublicacion/$idusuario";

        try {
            $response = $guzzleClient->post($url);
            $statusCode = $response->getStatusCode();
            if ($statusCode === 200) {
               return view("inicio");  
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ha ocurrido un error: ' . $e->getMessage()], 500);

        }
    }


    public function giveUnLike(Request $request,$idpublicacion,$idusuario)
    {
        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/likes/unlike/$idpublicacion/$idusuario";

        try {
            $response = $guzzleClient->delete($url);
            $statusCode = $response->getStatusCode();
            if ($statusCode === 200) {
               return view("inicio");  
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ha ocurrido un error: ' . $e->getMessage()], 500);

        }
    }
    
}
