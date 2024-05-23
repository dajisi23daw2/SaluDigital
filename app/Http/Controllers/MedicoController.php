<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::all();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        return view('medicos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:medicos',
            'correo' => 'required|string|email|max:255|unique:medicos',
            'especialidad_id' => 'required|exists:especialidades,id',
            'codigo' => 'required|string|max:50|unique:medicos',
        ]);

        Medico::create($request->all());

        return redirect()->route('medicos.index')->with('success', 'Médico creado correctamente.');
    }

    public function show($id)
    {
        $medico = Medico::findOrFail($id);
        return view('medicos.show', compact('medico'));
    }

    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        return view('medicos.edit', compact('medico'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:medicos,dni,' . $id,
            'correo' => 'required|string|email|max:255|unique:medicos,correo,' . $id,
            'especialidad_id' => 'required|exists:especialidades,id',
            'codigo' => 'required|string|max:50|unique:medicos,codigo,' . $id,
        ]);

        $medico = Medico::findOrFail($id);
        $medico->update($request->all());

        return redirect()->route('medicos.index')->with('success', 'Médico actualizado correctamente.');
    }

    public function destroy($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->delete();

        return redirect()->route('medicos.index')->with('success', 'Médico eliminado correctamente.');
    }
}
