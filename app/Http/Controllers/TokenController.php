<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TokenController extends Controller
{
    private $authToken;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->authToken = session('authToken', null);
            return $next($request);
        });
    }

    public function getNewToken()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://www.universal-tutorial.com/api/getaccesstoken', [
            'headers' => [
                'Accept' => 'application/json',
                'api-token' =>  env('API_TOKEN'),
                'user-email' => env('EMAIL')
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        if (isset($data['auth_token'])) {
            session(['authToken' => $data['auth_token']]);
            $this->authToken = $data['auth_token'];
        }

        return response()->json(['token' => $this->authToken]);
    }


    public function checkToken()
    {
        if (!$this->authToken) {
            $this->getNewToken();
        } else {
            $client = new Client();
            $response = $client->request('GET', 'https://www.universal-tutorial.com/api/countries/', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->authToken,
                    'Accept' => 'application/json'
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['error']) && $data['error']['name'] === 'TokenExpiredError') {
                $this->getNewToken();
            }
        }

        // Aquí puedes continuar con tu solicitud
    }
}
