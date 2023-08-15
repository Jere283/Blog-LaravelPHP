<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
                $user = $responseData;
                session(['user' => $user]);
                return redirect()->route("show.profile");
            } else {
                return response()->json(['error' => 'Error al iniciar sesion'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'La clave o usuario estan incorrectos'], 500);
        }
    }

    public function getPostFromUser($idUsuario)
    {

        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/publicacion/user/$idUsuario";

        try {
            $response = $guzzleClient->get($url);

            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody(), true);

            if ($statusCode == 200) {
                return $responseData;
            } else {
                return response()->json(['error' => 'Error al obtener posts del usuario'], $statusCode);
            }

        } catch (\Exception $e) {
            return response()->json(['error' => 'El usuario no tiene posts'], 500);
        }
    }


    //get methods for routes

    public function logoutUser()
    {
        Session::forget('user');

        return redirect()->route('login.user');
    }

    public function index()
    {
        $user = session("user");

        return view('perfil', ['user' => $user]);
    }


}