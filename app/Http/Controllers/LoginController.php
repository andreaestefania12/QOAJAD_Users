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
            'base_uri' => 'http://91.134.137.144:9090/authentication/authenticate/'
        ]);
    	
        $response = $client->request('GET',"{$user}/{$passw}");
        

        $jwtComple =$response->getBody()->getContents();
        $jwt = substr($jwtComple, 15); 

        $cookie= cookie('authentication',$jwt,1);

        return view('temp')->with('cookie',$cookie);
        
    }
}
