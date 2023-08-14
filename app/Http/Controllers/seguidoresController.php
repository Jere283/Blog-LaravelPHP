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

}
