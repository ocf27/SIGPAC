<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function Termwind\render;

class SeguridadController extends Controller
{
    public function login(Request $request)
    {
        $session = $request->getSession();
        if ($session->has('identificador')) {
            return redirect()->route('home_page');
        } else {
//            $session->set('identificador', 'OMAR CRUZ FLORES');
//            $session->set('rol', 1);
            return view('Seguridad.login');
        }
    }

    public function logout(Request $request)
    {
        $session = $request->getSession();
        $session->clear();

        return redirect()->route('login');
    }
}
