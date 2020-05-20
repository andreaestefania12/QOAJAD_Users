<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    // Download, Stream ( visualiza archivo en otra pestaña)
    public function PDF(){
        $pdf = \PDF::loadview('HistoriaClinica');
        return $pdf->download('HistoriaClinica.pdf');
    }
}
