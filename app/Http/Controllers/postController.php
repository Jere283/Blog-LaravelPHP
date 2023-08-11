<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function registerPublicacion(Request $request)
    {
        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/publicacion/crear";

        try {
            $response = $guzzleClient->post($url, [
                'json' => [
                    'contenido' => $request->input('contenido'),
                    'likes'=> 0,
                    'usuario'=> 1,
                    'titulo' => $request->input('titulo')
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody(), true);

            if ($statusCode === 200) {
                return response()->json(['message' => 'User registered successfully'], 200);
            } else {
                return response()->json(['error' => 'Error registering user'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ha ocurrido un error, no se pudo procesar la peticion'], 500);
        }
    }

}
