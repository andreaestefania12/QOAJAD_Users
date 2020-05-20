<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\setcookie;
use Cookie;


class LoginController extends Controller
{
    public function index(Request $request)
    {

    	$user= $request->input('user');

    	$passw= $request->input('passw');

    	$client = new Client([
            'base_uri' => 'http://91.134.137.144:9090/authentication/authenticate/'
        ]);
    	
        $response = $client->request('GET',"{$user}/{$passw}");
        $response =json_decode($response->getBody()->getContents());
        $jwt = $response->jwt;
        Cookie::queue('authentication',$jwt,60);

        return redirect()->route('citasIndex');

        
    }
}
