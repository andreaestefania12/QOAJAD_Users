<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

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
    }

    public function ipsCita($name)
    {
        $client = new Client([
            'base_uri' => 'http://thawing-stream-48846.herokuapp.com'
        ]);

        $response = $client->request('GET',"ips/{$name}");

        $espelist = json_decode($response->getBody()->getContents());

        return view('Citas.ipsCita', compact('espelist'));
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
