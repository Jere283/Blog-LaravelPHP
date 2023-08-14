<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registerUser(Request $request)
    {
        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/usuario/register";

        try {
            $response = $guzzleClient->post($url, [
                'json' => [
                    'nombre' => $request->input('nombre'),
                    'username' => $request->input('username'),
                    'email' => $request->input('email'),
                    'clave' => $request->input('clave'),
                ],
            ]);

            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody(), true);

            if ($statusCode === 200) {
                return view('signin');
            } else {
                return response()->json(['error' => 'Error Al registrar el usuario'], $statusCode, $responseData);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ha ocurrido un error, no se pudo procesar la peticion'], 500);
        }
    }

    public function loginUser(Request $request)
    {
        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/usuario/login";

        try {
            $response = $guzzleClient->post($url, [
                'json' => [
                    'usernameOrEmail' => $request->input('username'),
                    'clave' => $request->input('clave'),
                ],
            ]);

            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody(), true);

            if ($statusCode === 200) {
                return response()->json(['message' => 'El usuario inicio sesion de manera exitosa'], 200);
            } else if ($statusCode === 406) {
                return response()->json(['error' => 'La clave o usuario estan incorrectos'], 406);
            } else {
                return response()->json(['error' => 'Error al iniciar sesion'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'La clave o usuario estan incorrectos'], 500);
        }
    }
}