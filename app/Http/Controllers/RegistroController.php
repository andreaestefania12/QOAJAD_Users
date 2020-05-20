<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Client;
use Cookie;

class RegistroController extends Controller
{
    public function index()
    {
    	return view('registro');
    }

    public function registrar(Request $request)
    {
    	$newUser = [ 'username' => $request->input('usuario'),'document' => $request->input('documento'), 'password' =>$request->input('passw')];
    	$json = json_encode($newUser);
    	$client = new Client([
            'base_uri' => 'http://91.134.137.144:9090/user/create',
            'headers' => ['Content-Type' => 'application/json']
        ]); 
        
    	try {
    		$response = $client->request('POST','',['body' => $json]);
    	} catch (BadResponseException  $e) {
    		 $response = $e->getResponse();
    $responseBodyAsString = json_decode($response->getBody()->getContents());
    	if($responseBodyAsString->status == 500)
    	{
    		return redirect()->route('registro')->with('alert','fallo');
    	}
    	return '<script type="text/javascript">alert("no fallo!");</script>';
    	}
    	
    	
    }
}
