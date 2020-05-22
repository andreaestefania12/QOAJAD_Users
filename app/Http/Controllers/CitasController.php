<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Cookie;

class CitasController extends Controller
{

    public function index()
    {   

    	return view('Citas.menuCitas');
    }

    public function crearCita()
    {
        $client = (new ApiController())->getClient();
        $jwt =  (new ApiController())->getCookie();
       
        $response = $client->request('GET',"hpi/list_all",['headers' => ['authentication' => $jwt]]);
        
        $ipslist = json_decode($response->getBody());

        return view('Citas.crearCita', compact('ipslist'));
    }

    public function ipsCita($ips)
    {
        $client = (new ApiController())->getClient();
        $jwt =  (new ApiController())->getCookie();

        $response = $client->request('GET',"specialty/list_all/{$ips}",['headers' => ['authentication' => $jwt]] );

        $espelist = json_decode($response->getBody());
        

        return view('Citas.ipsCita', compact('espelist','ips'));
    }

    public function espCita(Request $request,$ips, $esp)
    {
        $client = (new ApiController())->getClient();
        $jwt =  (new ApiController())->getCookie();

        $response = $client->request('GET',"appointment/all_available_appointments/{$ips}/{$esp}",['headers' => ['authentication' => $jwt]]);

        $horarios = json_decode($response->getBody());
        $request->session()->put('ips',"{$ips}");

        return view('Citas.espCita', compact('horarios'));

    }

    public function guardarCita($doctorDocument,$date)
    {
        $user = json_decode(session()->get('usuario'));
        $client = (new ApiController())->getClient();
        $jwt =  (new ApiController())->getCookie();
        $ips = session()->get('ips');
        $date = date('M d, yy h:m:s A',strtotime($date));
        $appointment = [ 'patientDocument' => $user->DNI,'date' => $date, 'doctorDocument' => $doctorDocument, 'healthProviderInstituteName' => $ips];
        $json = json_encode($appointment);
        
        $client = new Client([
            'base_uri' => 'http://91.134.137.144:9090/appointment/create',
            'headers' => ['authentication' => $jwt , 'Content-Type' => 'application/json']
        ]); 
        $response = $client->request('POST','',['body' => $json]); 
    }



    public function verCita()
    {

        $client = (new ApiController())->getClient();
        $jwt =  (new ApiController())->getCookie();
        $userDocument = ((new UsuarioController())->getUsuario())->DNI;
        $response = $client->request('GET',"/appointment/all_user_appointments/{$userDocument}",['headers' => ['authentication' => $jwt]]);
              
        $lista=json_decode($response->getBody()); 
        // dd($lista);
    	return view('Citas.verCita',compact('lista'));
    }

    public function borrarCita()
    {
    	return view('Citas.borrarCita');
    }
}
