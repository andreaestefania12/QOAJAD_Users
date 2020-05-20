<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Cookie;
use stdClass;

class UsuarioController extends Controller
{
    public function getUsuario()
    {
    	$client = (new ApiController())->getClient();
        $jwt =  (new ApiController())->getCookie();
  
        $response = $client->request('GET',"user/find",['headers' => ['authentication' => $jwt]]);

        $user = json_decode($response->getBody());
        return $user;
    }

    public function index()
    {
    	$user = $this->getUsuario();
    	return view('Usuario.perfil',compact('user'));
    }
    public function Usuario()
    {
    	$user = $this->getUsuario();
    	return view('Usuario.correo',compact('user'));
    }

    public function setUsuario(Request $request)
    {
    	$user = $this->getUsuario();
    	$newUser = [ 'username' => $request->input('username'),'document' => $user->document, 'password' =>""];
    	$json = json_encode($newUser);
        $jwt =  (new ApiController())->getCookie();

        $client = new Client([
            'base_uri' => 'http://91.134.137.144:9090/user/update',
            'headers' => ['authentication' => $jwt , 'Content-Type' => 'application/json']
        ]); 
        $response = $client->request('PUT','',['body' => $json]);


        
    }

    public function setContr(Request $request)
    {
    	$user = $this->getUsuario();
    	return view('Usuario.correo',compact('user'));
    }
}
