<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Informe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Hospital;

class InformesController extends Controller
{

    public function index(Request $request)
    {
        $userId = Auth::id();
        $informes = Informe::where('usuario_id', $userId)->paginate(5);

    
        $hospitales = Hospital::all();
        $usuarios = User::all();
    
        return view('informes', compact('informes', 'hospitales', 'usuarios'));
    }
    
    public function filtrarInformes(Request $request)
{
    $userId = Auth::id();

    $fechaDesde = $request->input('fecha_desde');
    $fechaHasta = $request->input('fecha_hasta');
    $tipoInforme = $request->input('tipo_informe');
    $nombreHospital = $request->input('centro_medico');

    $informe = Informe::where('usuario_id', $userId);

    if ($fechaDesde) {
        $informe->whereDate('created_at', '>=', $fechaDesde);
    }
    if ($fechaHasta) {
        $informe->whereDate('created_at', '<=', $fechaHasta);
    }
    if ($tipoInforme) {
        $informe->where('tipo_informe', $tipoInforme);
    }
    if ($nombreHospital) {
        $informe->where('centro_medico', $nombreHospital);
    }

    $informes = $informe->paginate(5);

    $hospitales = Hospital::all();
    $usuarios = User::all();

    return view('informes', compact('informes', 'hospitales', 'usuarios', 'fechaDesde', 'fechaHasta', 'tipoInforme', 'nombreHospital'));
}

    
    public function guardarInforme(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'usuario_id' => 'required|exists:users,id',
            'tipo_informe' => 'required',
            'centro_medico' => 'required', 
            'observaciones' => 'required',
        ]);
    
        $hospital = Hospital::findOrFail($request->centro_medico);
    
        $informe = new Informe();
        $informe->titulo = $request->titulo;
        $informe->descripcion = $request->descripcion;
        $informe->usuario_id = $request->usuario_id;
        $informe->tipo_informe = $request->tipo_informe;
        $informe->centro_medico = $hospital->name;
        $informe->observaciones = $request->observaciones;
        $informe->save();
    
        return redirect()->route('gestion_informes')->with('success', 'El informe se ha creado correctamente.');
    }
    
    public function listaInformes()
    {
        $informes = Informe::paginate(5);
        return view('lista_informes', compact('informes'));
    }

    public function gestionInformes()
    {
        $usuarios = User::all();

        $hospitales = Hospital::all();
    
        return view('gestion_informes', ['usuarios' => $usuarios, 'hospitales' => $hospitales]);
    }
    
    public function descargarInforme($id)
    {
        $informe = Informe::findOrFail($id);

        $dompdf = new Dompdf();

        $html = view('informe_pdf', compact('informe'))->render();

        $dompdf->loadHtml($html);

        $dompdf->render();

        $filename = $informe->titulo . '.pdf';

        return $dompdf->stream($filename);
    }

    public function eliminarInforme($id)
    {

        $informe = Informe::find($id);
        if (!$informe) {
            return redirect()->back()->with('error', 'El informe no se encontró.');
        }

        $informe->delete();

        return redirect()->back()->with('success', 'El informe se eliminó correctamente.');
    }

    public function edit($id)
    {
        $informe = Informe::find($id);
        $hospitales = Hospital::all(); 
        $usuarios = User::all();
    
        return view('editar_informes', ['informe' => $informe, 'usuarios' => $usuarios, 'hospitales' => $hospitales]);
    }
    
    public function update(Request $request, $id)
    {
        $informe = Informe::findOrFail($id); 

        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'usuario_id' => 'required|exists:users,id',
            'tipo_informe' => 'required',
            'centro_medico' => 'required',
            'observaciones' => 'required',
        ]);

        $informe->update($request->all());

        return redirect()->route('lista_informes')->with('success', 'Informe actualizado correctamente.');
    }
    
}
