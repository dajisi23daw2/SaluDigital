<?php



namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        $nombreUsuario = auth()->user()->name;
    
        return view('home', ['nombreUsuario' => $nombreUsuario]);
    }
    
}

