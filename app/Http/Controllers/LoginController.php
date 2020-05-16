<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    public function index(Request $request)
    {
    	$user= $request->input('user');
    	$passw= $request->input('passw');

    	$client = new Client([
            'base_uri' => 'http://18.221.11.31:9090/authentication/authenticate/'
        ]);
    	dd($user);
        $response = $client->request('GET','{$user}/{$passw}');
        

        $ipslist = json_decode($response->getBody()->getContents());
    }
}
