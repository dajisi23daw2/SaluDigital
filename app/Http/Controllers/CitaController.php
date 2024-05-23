<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use Illuminate\Support\Facades\Auth;
use App\Models\TipoCita;
use Carbon\Carbon;

class CitaController extends Controller
{
    public function create()
    {
        $tiposCitas = TipoCita::all();

        $userId = Auth::id();
     
        $citas = Cita::where('usuario_id', $userId)->get();

        return view('solicitud_citas', ['tiposCitas' => $tiposCitas, 'citas' => $citas]);
    }

        
    public function gestionCitas()
    {
        $citas = Cita::all();
        $citas = Cita::paginate(5);

        foreach ($citas as $cita) {
            $cita->fecha = Carbon::parse($cita->fecha);
        }

        return view('gestion_citas', ['citas' => $citas]);
    }


    public function destroy2(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();
        
        return redirect()->route('gestion_citas')->with('success', 'Cita cancelada correctamente.');
    }

    public function edit($id)
    {
        $cita = Cita::findOrFail($id);
        return view('editar_cita', compact('cita'));
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);

        $cita->save();

        return redirect()->route('gestion_citas')->with('success', 'Cita actualizada correctamente.');
    }

    public function store(Request $request)
    {
    $userId = Auth::id();

    $existingCita = Cita::where('fecha', $request->input('fecha'))
                        ->where('hora', $request->input('hora'))
                        ->where('estado', 'Aprobada')
                        ->first();

    if ($existingCita) {
        return redirect()->route('solicitud_citas')->with('error', 'Ya hay una cita aprobada en esta fecha y hora.');
    }

    $request->validate([
        'fecha' => 'required',
        'hora' => 'required',
        'tipo_cita' => 'required',
        'estado' => 'Pendiente'
    ]);

    $cita = new Cita([
        'fecha' => $request->input('fecha'),
        'hora' => $request->input('hora'),
        'tipo' => $request->input('tipo_cita'),
        'usuario_id' => $userId,
        'estado' => 'Pendiente',
    ]);
    $cita->save();

    $request->session()->flash('success', 'Solicitud de cita completada.');

    return redirect()->route('solicitud_citas');
}

    

    public function destroy(Request $request)
    {
        $userId = Auth::id();
        
        $cita = Cita::where('usuario_id', $userId)->first();
        
        $cita->delete();
        
        return redirect()->route('solicitud_citas')->with('success', 'Cita cancelada correctamente.');
    }

    public function aprobarCita($id) {
        $cita = Cita::find($id);
        $cita->estado = 'Aprobada';
        $cita->save();
    
        return redirect()->back()->with('success', 'Cita aprobada con éxito');
    }

    public function agenda()
    {
        $userId = Auth::id();
        $citas = Cita::where('usuario_id', $userId)->get();

        return view('agenda', compact('citas'));
    }
    

    public function listadoEspera()
    {
        $userId = Auth::id();

        $citas = Cita::where('usuario_id', $userId)->get();

        return view('solicitud_citas', ['citas' => $citas]);
    }
}
