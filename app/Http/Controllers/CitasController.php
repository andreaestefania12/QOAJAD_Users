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

    public function espCita($ips, $esp)
    {
        $client = (new ApiController())->getClient();
        $jwt =  (new ApiController())->getCookie();

        $response = $client->request('GET',"appointment/all_available_appointments/{$ips}/{$esp}",['headers' => ['authentication' => $jwt]]);

        $horarios = json_decode($response->getBody());

        return view('Citas.espCita', compact('horarios'));
    }


    public function verCita()
    {
    	return view('Citas.verCita');
    }

    public function borrarCita()
    {
    	return view('Citas.borrarCita');
    }
}
