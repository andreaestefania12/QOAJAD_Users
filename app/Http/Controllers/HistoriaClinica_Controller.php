<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Cookie;


class HistoriaClinica_Controller extends Controller
{
     public function VisualizarHC(Type $var = null)
    {
        $client = (new ApiController())->getClient();
        $jwt = (new ApicController())->getCookie();

        $response = $client->request('GET',"/medical_history/retrieve_information/{username}/{password}",['headers' => ['authentication' => $jwt]] );
    }
}
