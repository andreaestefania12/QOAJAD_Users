<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;

class RegistroController extends Controller
{
    public function index()
    {
    	return view('registro');
    }
}
