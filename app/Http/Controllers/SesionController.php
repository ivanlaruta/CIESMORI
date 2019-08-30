<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;

class SesionController extends Controller
{
    public function index(Request $request)
    {   
        // return redirect()->route('administracion.empleados.index');


        if (Auth::user()->rol_id == '5')
        {
            return redirect()->route('administracion.empleados.index');
        }
        else{
        	return redirect()->route('vacio');
        }
    }

}
