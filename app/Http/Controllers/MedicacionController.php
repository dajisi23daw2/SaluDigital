<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicacion;
use App\Models\User;
use App\Models\Hospital;
use Illuminate\Support\Facades\Auth;

class MedicacionController extends Controller
{
    public function index()
    {

        $userId = Auth::id();
  
        $medicaciones = Medicacion::where('usuario_id', $userId)->get();

        $medicaciones = Medicacion::where('usuario_id', $userId)->paginate(5);
    
        return view('medicacion', ['medicaciones' => $medicaciones]);

    }

    public function listaMedicacion()
    {
        $medicaciones = Medicacion::paginate(5);
        return view('lista_medicacion', compact('medicaciones'));
    }

    public function eliminarMedicacion($id)
    {

        $medicaciones = Medicacion::find($id);

        $medicaciones->delete();

        return redirect()->back()->with('success', 'La medicación se eliminó correctamente.');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'usuario_id' => 'required|exists:users,id',
        ]);

        Medicacion::create($request->all());

        return redirect()->route('gestion_medicacion')->with('success', '¡Medicación creada correctamente!');
    }

    public function mostrarDetalles($id)
{
    $medicacion = Medicacion::findOrFail($id);

    return view('detalles_medicacion', compact('medicacion'));
}


    public function edit($id)
    {
        $medicacion = Medicacion::findOrFail($id);
        $hospitales = Hospital::all(); 
        $usuarios = User::all();
    
        return view('editar_medicacion', compact('medicacion', 'usuarios', 'hospitales'));
    }
    

    public function update(Request $request, $id)
    {
        $medicaciones = Medicacion::findOrFail($id); 

        $request->validate([
            'nombre' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'usuario_id' => 'required|exists:users,id',
        ]);

        $medicaciones->update($request->all());

        return redirect()->route('lista_medicacion')->with('success', 'Medicación actualizado correctamente.');
    }

    public function create()
    {
        $usuarios = User::all();
        return view('gestion_medicacion', ['usuarios' => $usuarios]);
    }
}
