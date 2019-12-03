<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;

class SesionController extends Controller
{
    public function index(Request $request)
    {   
        @if(Auth::user()->rol->descripcion == 'ADMINISTRADOR'){
            return redirect()->route('encuesta.index');
        }
        @if(Auth::user()->rol->descripcion == 'GERENTE'){
            return redirect()->route('encuesta.dashboard');
        }
        @if(Auth::user()->rol->descripcion == 'CLIENTE'){
            return redirect()->route('encuesta.dashboard');
        }
        @if(Auth::user()->rol->descripcion == 'SUPERVISOR'){
            return redirect()->route('administracion.encuestadores.index');
        }
        @if(Auth::user()->rol->descripcion == 'SUPERVISOR'){
            return redirect()->route('encuesta.dashboard');
        }
        @if(Auth::user()->rol->descripcion == 'EDITOR/CODIFICADOR'){
            return redirect()->route('encuesta.index');
        }
        @if(Auth::user()->rol->descripcion == 'PROGRAMADOR'){
            return redirect()->route('encuesta.index');
        }
        @if(Auth::user()->rol->descripcion == 'GESTOR OPERACIONES'){
            return redirect()->route('encuesta.index');
        }
        @if(Auth::user()->rol->descripcion == 'GESTOR PROYECTO'){
            return redirect()->route('encuesta.index');
        }
        @if(Auth::user()->rol->descripcion == 'ADM. PERSONAL'){
            return redirect()->route('administracion.encuestadores.index');
        }
        @if(Auth::user()->rol->descripcion == 'ADM. BD'){
            return redirect()->route('encuesta.index');
        }
        @if(Auth::user()->rol->descripcion == 'USUARIO 1'){
            return redirect()->route('encuesta.index');
        }
        @if(Auth::user()->rol->descripcion == 'USUARIO 2'){
            return redirect()->route('encuesta.admin_libro');
        }
        @if(Auth::user()->rol->descripcion == 'USUARIO 3'){
            return redirect()->route('administracion.encuestadores.index');
        }
        @if(Auth::user()->rol->descripcion == 'USUARIO 4'){
            return redirect()->route('administracion.usuarios.index');
        }
    }

}
















