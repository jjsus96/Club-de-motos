<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patrocinador;

class PatrocinadorController extends Controller
{
    protected $patrocinadores;

    public function __construct(Patrocinador $patrocinadores)
    {
        $this->patrocinadores = $patrocinadores;
    }

    public function index()
    {
        $patrocinadores = $this->patrocinadores->obtenerPatrocinadores();
        return view('patrocinadores.lista', ['patrocinadores' => $patrocinadores]);
    }

    public function create()
    {
        return view('patrocinadores.crear');
    }

    public function store(Request $request)
    {
        Patrocinador::create($request->all());
        return redirect()->route('patrocinadores.index')->with('success', 'Se registró correctamente');
    }

    public function show($id)
    {
        $patrocinador = Patrocinador::find($id);
        return view('patrocinadores.ver', compact('patrocinador'));
    }

    public function edit($id)
    {
        $patrocinador = Patrocinador::find($id);
        return view('patrocinadores.editar', compact('patrocinador'));
    }

    public function update(Request $request, $id)
    {
        $patrocinador = Patrocinador::find($id);
        $patrocinador ->update($request->all());
        return redirect()->route('patrocinadores.index')->with('success', 'Se actualizó correctamente');
    }

    public function destroy($id)
    {
        $patrocinador = Patrocinador::find($id);
        $patrocinador->delete();
        return redirect()->route('patrocinadores.index')->with('success', 'Se eliminó correctamente');
    }
}
