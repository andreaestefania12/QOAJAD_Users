<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    //
    public function PDF(){
        $pdf = \PDF::loadview('pdf');
        return $pdf->download('prueba.pdf');
    }
}
