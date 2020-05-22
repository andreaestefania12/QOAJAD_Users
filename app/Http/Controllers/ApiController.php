<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Cookie;

class ApiController extends Controller
{
    public function getClient()
    {
        $client = new Client([
            'base_uri' => 'http://91.134.137.144:9092/'
        ]);

        return $client;
    }

    public function getCookie()
    {
        $jwt=Cookie::get('authentication');

        return $jwt;
    }
}
