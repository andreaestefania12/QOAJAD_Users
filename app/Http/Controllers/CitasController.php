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
        $client = new Client([
            'base_uri' => 'http://thawing-stream-48846.herokuapp.com'
        ]);

        $response = $client->request('GET','ips');

        $ipslist = json_decode($response->getBody()->getContents());

    	return view('Citas.crearCita', compact('ipslist'));

        //  $jwt=Cookie::get('authentication');


        // $client = new Client([
        //     'base_uri' => 'http://91.134.137.144:9090/hpi/list_all',
        //     'headers' => ['authentication' => $jwt]
        // ]);
        // dd($response);
        // $response = $client->request('GET');
        
        // $ipslist = json_decode($response->getBody());

        // return view('Citas.crearCita', compact('ipslist'));
    }

    public function ipsCita($ips)
    {
        $client = new Client([
            'base_uri' => 'http://thawing-stream-48846.herokuapp.com'
        ]);

        $response = $client->request('GET',"ips/{$ips}");

        $espelist = json_decode($response->getBody());
        

        return view('Citas.ipsCita', compact('espelist','ips'));
    }

    public function espCita($ips, $esp)
    {
        $client = new Client([
            'base_uri' => 'http://thawing-stream-48846.herokuapp.com'
        ]);

        $response = $client->request('GET',"horarios/{$ips}/{$esp}");

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
