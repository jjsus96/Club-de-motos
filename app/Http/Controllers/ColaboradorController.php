<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;

class ColaboradorController extends Controller
{
    protected $colaboradores;

    public function __construct(Colaborador $colaboradores)
    {
        $this->colaboradores = $colaboradores;
    }

    public function index()
    {
        $colaboradores = $this->colaboradores->obtenerColaboradores();
        return view('colaboradores.lista', ['colaboradores' => $colaboradores]);
    }

    public function create()
    {
        return view('colaboradores.crear');
    }

    public function store(Request $request)
    {
        Colaborador::create($request->all());
        return redirect()->route('colaboradores.index')->with('success', 'Se registró correctamente');
    }

    public function show($id)
    {
        $colaborador = Colaborador::find($id);
        return view('colaboradores.ver', compact('colaborador'));
    }

    public function edit($id)
    {
        $colaborador = Colaborador::find($id);
        return view('colaboradores.editar', compact('colaborador'));
    }

    public function update(Request $request, $id)
    {
        $colaborador = Colaborador::find($id);
        $colaborador ->update($request->all());
        return redirect()->route('colaboradores.index')->with('success', 'Se actualizó correctamente');
    }

    public function destroy($id)
    {
        $colaborador = Colaborador::find($id);
        $colaborador->delete();
        return redirect()->route('colaboradores.index')->with('success', 'Se eliminó correctamente');
    }
}
