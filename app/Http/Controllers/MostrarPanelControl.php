<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\User;


class MostrarPanelControl extends Controller
{
    public function mostrarGestion()
    {
        $usuarios = User::all();
        return view('panel_control', ['usuarios' => $usuarios]);
    }
}

