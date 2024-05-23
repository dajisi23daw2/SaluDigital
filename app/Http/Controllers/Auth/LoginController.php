<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('home');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    public function login(Request $request)
    {
        $credentials = $request->only('dni', 'password');
    
        if (Auth::attempt($credentials)) {
            $username = Auth::user()->name;
            return view('login_completo', compact('username'));
        }
    
        return back()->withErrors([
            'dni' => 'El usuario o contraseña es incorrecto',
        ]);
    }
}

