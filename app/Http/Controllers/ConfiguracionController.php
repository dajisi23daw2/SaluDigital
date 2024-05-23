<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class ConfiguracionController extends Controller
{
    public function index()
    {
        return view('configuracion');
    }

    public function cambiarPassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'different:current_password', 'min:8', 'confirmed', 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'],
        ], [
            'new_password.regex' => 'La contraseña debe contener al menos una mayúscula, un número y un carácter especial.'
        ]);

        $user = User::find(auth()->user()->id);
        $user->update(['password' => Hash::make($request->input('new_password'))]);

        $request->session()->flash('success', 'Contraseña cambiada correctamente.');

        return view('configuracion');
    }
}

