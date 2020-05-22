<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Cookie;
use stdClass;
use RealRashid\SweetAlert\Facades\Alert;

class UsuarioController extends Controller
{
    public function getUsuario()
    {
    	$client = (new ApiController())->getClient();
        $jwt =  (new ApiController())->getCookie();
        $user = json_decode(session()->get('usuario'));
        return $user;
    }

    public function index()
    {
    	$user = $this->getUsuario();
    	return view('Usuario.perfil',compact('user'));
    }
    
    public function Usuario()
    {
        $client = (new ApiController())->getClient();
        $jwt =  (new ApiController())->getCookie();
    	$user = $client->request('GET',"user/find",['headers' => ['authentication' => $jwt]]);
        $user = json_decode($user->getbody());
        
    	return view('Usuario.correo',compact('user'));
    }

    public function Contra()
    {
        $user = $this->getUsuario();
        return view('Usuario.contra',compact('user'));
    }


    public function setUsuario(Request $request)
    {
        try {
            $user = $this->getUsuario();
            $newUser = [ 'username' => $request->input('username'),'document' => $user->DNI, 'password' =>""];
            $json = json_encode($newUser);

            $jwt =  (new ApiController())->getCookie();

            $client = new Client([
                'base_uri' => 'http://91.134.137.144:9092/user/update',
                'headers' => ['authentication' => $jwt , 'Content-Type' => 'application/json']
            ]); 
            $response = $client->request('PUT','',['body' => $json]);
            Alert::success('Correo cambiado, vuelva a iniciar sesión','Correcto');
            return redirect()->route('cerrar');

        } catch (\Exception $e) {
            Alert::error('Hubo un error al cambiar el correo, intente más tarde','Error');
            return back();
        }   	

        
    }

    public function setContr(Request $request)
    {
        try {
            $client = (new ApiController())->getClient();
            $jwt =  (new ApiController())->getCookie();

            $user = $client->request('GET',"user/find",['headers' => ['authentication' => $jwt]]);
            $user = json_decode($user->getbody());
            $newUser = [ 'username' => $user->username,'document' => $user->document, 'password' => $request->input('contra')];
            $json = json_encode($newUser);

            $client = new Client([
                'base_uri' => 'http://91.134.137.144:9092/user/update',
                'headers' => ['authentication' => $jwt , 'Content-Type' => 'application/json']
            ]); 
            $response = $client->request('PUT','',['body' => $json]);

            Alert::success('Contraseña cambiada exitosamente','Correcto');
            return redirect()->route('perfil');

        } catch (\Exception $e) {
            Alert::error('Hubo un error al cambiar la contraseña, intente más tarde','Error');
            return back();
        }       
        
    }
}
