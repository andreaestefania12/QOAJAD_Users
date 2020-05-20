<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    //
    public function getHistoria()
    {
    	return view('historia');
    }
    public function PDF(){
    	$historia = json_decode(session()->get('historia'));

    	$usuario = json_decode(session()->get('usuario'));

        $pdf = \PDF::loadview('HistoriaClinica',compact('historia','usuario'));
        return $pdf->download('HistoriaClinica.pdf');
    }
}
