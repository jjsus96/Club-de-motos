<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventoDetalle;

class EventoDetalleController extends Controller
{
    protected $eventodetalles;

    public function __construct(Eventodetalle $eventodetalles)
    {
        $this->eventodetalles = $eventodetalles;
    }

    public function index()
    {
        $eventodetalles = $this->eventodetalles->obtenerEventodetalles();
        return view('eventodetalles.lista', ['eventodetalles' => $eventodetalles]);
    }

    public function create()
    {
        return view('eventodetalles.crear');
    }

    public function store(Request $request)
    {
        Eventodetalle::create($request->all());
        return redirect()->route('eventodetalles.index')->with('success', 'Se registró correctamente');
    }

    public function show($id)
    {
        $eventodetalles = Eventodetalle::find($id);
        return view('eventodetalles.ver', compact('eventodetalle'));
    }

    public function edit($id)
    {
        $eventodetalle = Eventodetalle::find($id);
        return view('eventodetalles.editar', compact('eventodetalle'));
    }

    public function update(Request $request, $id)
    {
        $eventodetalle = Eventodetalle::find($id);
        $eventodetalle ->update($request->all());
        return redirect()->route('eventodetalles.index')->with('success', 'Se actualizó correctamente');
    }

    public function destroy($id)
    {
        $eventodetalle = Eventodetalle::find($id);
        $eventodetalle->delete();
        return redirect()->route('eventodetalles.index')->with('success', 'Se eliminó correctamente');
    }
}
