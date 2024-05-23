<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacuna;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VacunasController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
    
        $vacunas = Vacuna::where('user_id', $userId)->get();

        $vacunas = Vacuna::where('user_id', $userId)->paginate(5);
    
        return view('vacunas', ['vacunas' => $vacunas]);
    }

    public function listaVacunas()
    {
        $vacunas = Vacuna::paginate(5);
        return view('lista_vacunas', compact('vacunas'));
    }
    
    public function buscar(Request $request)
    {
        $nombre = $request->input('nombre');
        $vacunas = Vacuna::where('nombre', 'like', "%$nombre%")->paginate(5);
        
        return view('vacunas', compact('vacunas'));
    }

    public function eliminarVacuna($id)
    {

        $vacunas = Vacuna::find($id);

        $vacunas->delete();

        return redirect()->back()->with('success', 'La vacuna se eliminó correctamente.');
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required',
            'motivo' => 'required',
            'nombre_comercial' => 'required',
            'lote' => 'required',
            'centro_administracion' => 'required',
            'via_administracion' => 'required',
            'localizacion_anatomica' => 'required',
            'origen_informacion' => 'required',
            'user_id' => 'required',
        ]);

        Vacuna::create($request->all());

        return redirect()->route('gestion_vacunas')->with('success', '¡Vacuna creada correctamente!');
    }

    public function edit($id)
    {
        $vacuna = Vacuna::findOrFail($id);
        $hospitales = Hospital::all(); 
        $usuarios = User::all();
        
        return view('editar_vacunas', compact('vacuna', 'usuarios', 'hospitales'));
    }
    
    
    public function update(Request $request, $id)
    {

        $vacunas = Vacuna::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required',
            'motivo' => 'required',
            'nombre_comercial' => 'required',
            'lote' => 'required',
            'centro_administracion' => 'required',
            'via_administracion' => 'required',
            'localizacion_anatomica' => 'required',
            'origen_informacion' => 'required',
            'user_id' => 'required',
        ]);
    
      
        $vacunas->update($request->all());
    
        return redirect()->route('lista_vacunas')->with('success', 'Vacuna actualizada correctamente.');
    }
    
    

    public function create()
    {
        $usuarios = User::all();
        $hospitales = Hospital::all();
        return view('gestion_vacunas', ['usuarios' => $usuarios, 'hospitales' => $hospitales]);
    }
}
