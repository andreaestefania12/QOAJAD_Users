<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Client;
use Cookie;

use RealRashid\SweetAlert\Facades\Alert;
class RegistroController extends Controller
{
    public function index()
    {
    	return view('registro');
    }

    public function registrar(Request $request)
    {
        try {
            $newUser = [ 'username' => $request->input('usuario'),'document' => $request->input('documento'), 'password' =>$request->input('passw')];
        $json = json_encode($newUser);
        $client = new Client([
            'base_uri' => 'http://91.134.137.144:9092/user/create',
            'headers' => ['Content-Type' => 'application/json']
        ]); 
        
            $response = $client->request('POST','',['body' => $json]);
        Alert::success('Registro exitoso','Correcto');
        return redirect()->route('cerrar');
        } catch (\Exception  $e) {
            Alert::error('No se pudo registrar, intente de nuevo','Error');
            return back();
        }
    	
    	
    	
    	
    }
}
