<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class seguidoresController extends Controller
{
    public function seguirUsuario(Request $request, $seguidorId, $seguidoId)
    {
        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/seguidores/$seguidorId/seguir/$seguidoId";

        try {
            $response = $guzzleClient->post($url);
            $statusCode = $response->getStatusCode();
            if ($statusCode === 200) {
                return redirect()->route('inicio');
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ha ocurrido un error: ' . $e->getMessage()], 500);

        }
    }

    public function quitarFollow(Request $request, $seguidorId, $seguidoId)
    {
        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/seguidores/eliminar-seguimiento/$seguidorId/$seguidoId";

        try {
            $response = $guzzleClient->delete($url);
            $statusCode = $response->getStatusCode();
            if ($statusCode === 200) {
                return redirect()->route('inicio');
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ha ocurrido un error: ' . $e->getMessage()], 500);

        }
    }


    public function getAllSeguidores($idusuario)
    {
        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/seguidores/$idusuario/seguidos"; // Ajusta la URL según la ruta de tu microservicio

        try {
            $response = $guzzleClient->get($url);

            $statusCode = $response->getStatusCode();


            if ($statusCode === 200) {
                // $responseData ahora contiene las publicaciones obtenidas desde el microservicio
                // Puedes procesar los datos y pasarlos a la vista como sea necesario
                $responseData = $response->getBody();
                return $responseData;
            } else {
                return response()->json(['error' => 'Error getting publicaciones'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ha ocurrido un error, no se pudo procesar la petición'], 500);
        }
    }


}
