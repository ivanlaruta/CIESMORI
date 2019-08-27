<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SesionController extends Controller
{
    public function index(Request $request)
    {   
        return redirect()->route('administracion.empleados.index');
    }
}
