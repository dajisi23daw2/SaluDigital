<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnostico;
use App\Models\User;
use App\Models\Hospital;
use Illuminate\Support\Facades\Auth;


class DiagnosticoController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
    
        $diagnosticos = Diagnostico::where('usuario_id', $userId)->get();

        $diagnosticos = Diagnostico::where('usuario_id', $userId)->paginate(5);
    
        return view('diagnosticos', ['diagnosticos' => $diagnosticos]);
    }

    public function edit($id)
    {
        $diagnostico = Diagnostico::find($id);
        $hospitales = Hospital::all(); 
        $usuarios = User::all();
    
        return view('editar_diagnostico', ['diagnostico' => $diagnostico, 'usuarios' => $usuarios, 'hospitales' => $hospitales]);
    }
    

    public function update(Request $request, $id)
    {
        $diagnostico = Diagnostico::findOrFail($id); 

        $request->validate([
            'problema_salud' => 'required',
            'centro' => 'required',
            'fecha' => 'required|date',
            'activo' => 'required|boolean',
            'usuario_id' => 'required|exists:users,id',
        ]);

        $diagnostico->update($request->all());

        return redirect()->route('lista_diagnosticos')->with('success', 'Diagnóstico actualizado correctamente.');
    }


    public function create()
    {
        $usuarios = User::all();
        $hospitales = Hospital::all();
        return view('gestion_diagnosticos', ['usuarios' => $usuarios, 'hospitales' => $hospitales]);
    }

    public function listaDiagnostico()
    {
        $diagnosticos = Diagnostico::paginate(5);
        return view('lista_diagnosticos', compact('diagnosticos'));
    }

    public function eliminarDiagnostico($id)
    {
        $diagnosticos = Diagnostico::find($id);

        $diagnosticos->delete();

        return redirect()->back()->with('success', 'El diágnostico se eliminó correctamente.');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'problema_salud' => 'required',
            'centro' => 'required',
            'fecha' => 'required|date',
            'activo' => 'required|boolean',
            'usuario_id' => 'required|exists:users,id',
        ]);
    
        Diagnostico::create($request->all());
    
        return redirect()->route('gestion_diagnosticos')->with('success', 'Diagnóstico creado correctamente!');
    }
    

    public function guardar(Request $request)
    {
        $request->validate([
            'problema_salud' => 'required',
            'centro' => 'required',
            'fecha' => 'required|date',
            'activo' => 'required|boolean',
            'usuario_id' => 'required|exists:users,id',
        ]);

        Diagnostico::create($request->all());

        return redirect()->route('gestion_diagnosticos')->with('success', 'Diagnóstico creado correctamente!');
    }


}
