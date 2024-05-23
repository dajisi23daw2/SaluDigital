<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mensaje;

class MensajeController extends Controller
{
    public function enviarMensaje(Request $request)
    {
        $request->validate([
            'asunto' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        Mensaje::create([
            'asunto' => $request->asunto,
            'descripcion' => $request->descripcion,
            'fecha' => now(),
            'usuario_id' => Auth::id(),
        ]);

        return redirect()->route('enviar_mensaje')->with('success', 'Mensaje enviado exitosamente.');
    }

    public function verMensajes()
    {
        $mensajes = Mensaje::where('usuario_id', auth()->id())->paginate(8);

        return view('ver_mensajes', compact('mensajes'));
    }

    public function marcarComoLeido($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        $mensaje->estado = 'leido';
        $mensaje->save();

        return redirect()->back()->with('success', 'Mensaje marcado como leído correctamente.');
    }

    public function eliminarMensaje($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        $mensaje->delete();

        return redirect()->back()->with('success', 'Mensaje eliminado correctamente.');
    }

    public function recibirMensajes()
    {
        $mensajes = Mensaje::paginate(5);
        return view('recibir_mensaje', ['mensajes' => $mensajes]);
    }
}
