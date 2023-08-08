<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registerUser(Request $request)
    {
        $guzzleClient = new Client();
        $url = "http://localhost:8080/api/auth/signup";

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
                return response()->json(['message' => 'User registered successfully'], 200);
            } else {
                return response()->json(['error' => 'Error registering user'], $statusCode);
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the request
            return response()->json(['error' => 'An error occurred while processing the request'], 500);
        }
    }
}