<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function Termwind\render;

class VistasController extends Controller
{
    public function index(Request $request)
    {
        $session = $request->getSession();
        if ($session->has('identificador')) {
            switch ($session->get('rol')) {
                case 1:
                    return $session->get('identificador');
                    break;
                case 2:
                    break;
                case 3:
                    break;
                case 4:
                    break;
                case 5:
                    break;
                case 6:
                    break;
                case 7:
                    break;
                case 8:
                    break;
                default:
                    break;
            }
        } else {
            return redirect()->route('login');
        }
    }
}
