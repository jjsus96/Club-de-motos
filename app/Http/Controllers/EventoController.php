<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Patrocinador;

class EventoController extends Controller
{
    protected $eventos;

    public function __construct(Evento $eventos)
    {
        $this->eventos = $eventos;
    }

    public function index()
    {
        $eventos =Evento::all();
        return view('eventos.lista', compact('eventos'));
    }

    public function create()
    {
        $colaboradores = Colaborador::all()->pluck('nombre_colaborador', 'id')->toArray();
        $patrocinadores = Patrocinador::all()->pluck('nombre_patrocinador', 'id')->toArray();
        return view('eventos.crear', compact('colaboradores', 'patrocinadores'));
    }

    public function store(Request $request)
    {
        $evento = Evento::create([
            'nombre_evento'=> ucwords($request->nombre_evento),
            'fecha_inicio' => $request->fecha_inicio,
            'descripcion' => $request->descripcion,
            'colaborador_id' => $request->colaborador_id,
            'patrocinador_id' => $request->patrocinador_id,
           ]);
           //Almacenar cartel
           if ($request->hasFile('cartel')) {
            //Obtiene los valores del archivo
            $file= $request->file('cartel');
            //Asigna un nombre aleatorio con la fecha de creación
            $filename= time().'.'.$file->extension();
            //Almacena el avatar en la carpeta cartel en /public/img/eventos
            $file-> move(public_path('img\\eventos'), $filename);
            //Actualiza la información del cartel
            $evento->update(['cartel' => $filename]);
        }
        return redirect()->route('eventos.index')->with('success', 'Se registró correctamente');
    }

    public function show($id)
    {
        $evento = Evento::find($id);
        return view('eventos.ver', compact('evento'));
    }

    public function edit(Evento $evento)
    {
        $colaboradores = Colaborador::all()->pluck('nombre_colaborador', 'id')->toArray();
        $patrocinadores = Patrocinador::all()->pluck('nombre_patrocinador', 'id')->toArray();
        return view('eventos.editar', compact('evento', 'colaboradores', 'patrocinadores'));
    }

    public function update(Request $request, Evento $evento)
    {
        $currentImage = $evento->cartel;
        $evento->update([
            'nombre_evento'=> ucwords($request->nombre_evento),
            'fecha_inicio' => $request->fecha_inicio,
            'descripcion' => $request->descripcion,
            'colaborador_id' => ucwords($request->colaborador_id),
            'patrocinador_id' => ucwords($request->patrocinador_id),
           ]);
           //Almacenar cartel
           if ($request->hasFile('cartel')) {
            //Obtiene los valores del archivo
            $file= $request->file('cartel');
            //Asigna un nombre aleatorio con la fecha de creación
            $filename= time().'.'.$file->extension();
            //Almacena el avatar en la carpeta users en /public/img/eventos
            $file-> move(public_path('img\\eventos'), $filename);
            //Actualiza la información del cartel
            $evento->update(['cartel' => $filename]);
             // Valida si existe imagen anterior y la elimina
             if ($currentImage != '') {
                unlink(public_path('img\\eventos\\'.$currentImage));
            }
        }
        return redirect()->route('eventos.index')->with('success', 'Se registró correctamente');
    }

    public function destroy($id)
    {
        // La vez pasada te lo comente que agregaras esto a los demas, sigue
        $evento = Evento::find($id);
        $currentImage = $evento->cartel;
        $evento->delete();
        // Valida si hay un valor en db
        if ($currentImage != '') {
            // Valida si existe el archivo en la carpeta
            if (file_exists(public_path('img\\eventos\\'.$currentImage))) {
                // Elimina el archivo de la carpeta
                unlink(public_path('img\\eventos\\'.$currentImage));
            }
        }
        return redirect()->route('eventos.index')->with('success', 'Se eliminó correctamente');
    }
}
