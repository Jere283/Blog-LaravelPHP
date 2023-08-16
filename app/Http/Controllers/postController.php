<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function index()
    {
        return view('inicio');
    }

    public function indexOut()
    {
        return view('logout');
    }
    public function registerPublicacion(Request $request)
    {
        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/publicacion/crear";

        try {
            $response = $guzzleClient->post($url, [
                'json' => [
                    'contenido' => $request->input('contenido'),
                    'usuario' => session('user')['id'],
                    'titulo' => $request->input('titulo'),
                    'categoriaIds'=> json_decode($_POST['selectedIds'], true)
                ]
            ]);
            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody(), true);
            if ($statusCode === 200) {
                return view("inicio");
            } else {
                return response()->json(['error' => 'Error registering user'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ha ocurrido un error, no se pudo procesar la peticion'], 500);
        }
    }
    public function getAllPublicaciones()
    {
        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/publicacion/all"; // Ajusta la URL según la ruta de tu microservicio

        try {
            $response = $guzzleClient->get($url);

            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody(), true);

            if ($statusCode === 200) {
                // $responseData ahora contiene las publicaciones obtenidas desde el microservicio
                // Puedes procesar los datos y pasarlos a la vista como sea necesario
                return $responseData;
            } else {
                return response()->json(['error' => 'Error getting publicaciones'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ha ocurrido un error, no se pudo procesar la petición'], 500);
        }
    }
    public function getAllCategorias()
    {
        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/categorias/all"; // Ajusta la URL según la ruta de tu microservicio

        try {
            $response = $guzzleClient->get($url);

            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody(), true);

            if ($statusCode === 200) {
                // $responseData ahora contiene las publicaciones obtenidas desde el microservicio
                // Puedes procesar los datos y pasarlos a la vista como sea necesario
                return $responseData;
            } else {
                return response()->json(['error' => 'Error getting publicaciones'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ha ocurrido un error, no se pudo procesar la petición'], 500);
        }
    }



    public function getAllCategoriasforId($idpublicacion)
    {
        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/publicacion/$idpublicacion/categorias"; // Ajusta la URL según la ruta de tu microservicio

        try {
            $response = $guzzleClient->get($url);

            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody(), true);

            if ($statusCode === 200) {
                // $responseData ahora contiene las publicaciones obtenidas desde el microservicio
                // Puedes procesar los datos y pasarlos a la vista como sea necesario
                return $responseData;
            } else {
                return response()->json(['error' => 'Error getting publicaciones'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ha ocurrido un error, no se pudo procesar la petición'], 500);
        }
    }


}