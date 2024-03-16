<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TokenController extends Controller
{
    private $authToken;
    private $apiToken;
    private $userEmail;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->authToken = $request->session()->get('authToken', null);
            $this->apiToken = config('app.api_token');
            $this->userEmail = config('app.user_email');
            return $next($request);
        });
    }

    public function getNewToken()
{
    $waitTime = 1;

    while (true) {
        try {
            $client = new Client();
            $response = $client->request('GET', 'https://www.universal-tutorial.com/api/getaccesstoken', [
                'headers' => [
                    'Accept' => 'application/json',
                    'api-token' => $this->apiToken,
                    'user-email' => $this->userEmail
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['auth_token'])) {
                session(['authToken' => $data['auth_token']]);
                $this->authToken = $data['auth_token'];
                return response()->json(['token' => $this->authToken]);
            }
        } catch (\Exception $e) {
            sleep($waitTime);
            $waitTime *= 2;
        }
    }
}


    public function checkToken()
    {
        try {
            $client = new Client();
            $response = $client->request('GET', 'https://www.universal-tutorial.com/api/countries/', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->authToken,
                    'Accept' => 'application/json'
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['error']) && $data['error']['name'] === 'TokenExpiredError') {
                $this->authToken = $this->getNewToken();
                return $this->checkToken();
            } else {
                return $data;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function verifyToken()
    {
        try {
            $client = new Client();
            $response = $client->request('GET', 'https://www.universal-tutorial.com/api/user-profile', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->authToken,
                    'Accept' => 'application/json'
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['error'])) {
                $this->authToken = $this->getNewToken();
                return $this->verifyToken();
            } else {
                return $data;
            }
        } catch (\Exception $e) {
            return null;
        }
    }
}
