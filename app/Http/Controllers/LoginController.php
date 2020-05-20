<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\setcookie;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Cookie;


class LoginController extends Controller
{

    public function inicio()
        {
            return view('inicio');
        }


    public function cerrar()
    {
        $cookie = Cookie::forget('authentication');
        return view('login');   
    }
    public function index(Request $request)
    {
        try {
            $user= $request->input('user');

        $passw= $request->input('passw');

        $client = (new ApiController())->getClient();
        
        $response = $client->request('GET',"authentication/authenticate/{$user}/{$passw}");
        $response =json_decode($response->getBody());
        $jwt = $response->jwt;    

        Cookie::queue('authentication',$jwt,60);

        $response = $client->request('GET',"medical_history/retrieve_information/{$user}/{$passw}",['headers' => ['authentication' => $jwt]]);

        $response =json_decode($response->getBody());
        $historia = (json_decode($response->data))->data;
        $historia = json_encode($historia);

        $request->session()->put('historia',"{$historia}");


        $response = $client->request('GET',"user/retrieve_information/{$user}/{$passw}",['headers' => ['authentication' => $jwt]]);

        $response =json_decode($response->getBody());

        $usuario = (json_decode($response->data))->data;
        $usuario = json_encode($usuario);
        $request->session()->put('usuario',"{$usuario}");

        return redirect()->route('inicio');
        } catch (Exception  $e) {
            return redirect()->route('cerrar');
        }
    	

        
    }
}
