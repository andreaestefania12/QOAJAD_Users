<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Cookie;

class UsuarioController extends Controller
{
    //
    public function index()
    {
    	$jwt=Cookie::get('authentication');

        $client = new Client([
            'base_uri' => 'http://91.134.137.144:9090/user/list_all',
            'headers' => ['authentication' => $jwt]
        ]);   
        $response = $client->request('GET');
        $userlist = json_decode($response->getBody());
        dd($ipslist);
    	return view('Usuario.perfil');
    	
    }
}
