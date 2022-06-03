<?php

namespace App\Http\Controllers;

use App\Http\Requests\Galerias\StoreRequest;
use App\Http\Requests\Galerias\UpdateRequest;
use App\Models\Evento;
use Illuminate\Http\Request;
use App\Models\Galeria;
use Illuminate\Support\Facades\DB;

class GaleriaController extends Controller
{
    protected $galerias;

    public function __construct(Galeria $galerias)
    {
        $this->galerias = $galerias;
    }

    public function index()
    {
        $galerias = $this->galerias->obtenerGalerias();
        return view('galerias.lista',  compact('galerias'));
    }

    public function create()
    {
        $eventos = Evento::all()->pluck('nombre_evento', 'id')->toArray();
        return view('galerias.crear', compact('eventos'));
    }

    public function store(StoreRequest $request)
    {
        //Valor para incrementar nombres
        $i=0;
        //Por cada imagen subida se ejecuta el bucle
        foreach($request->file('imagen') as $imagen){
            //Por cada imagen se asigna el nombre de la fecha de creación + el valor que se autoincrementa + la extensión
            $filename= time().$i++.'.'.$imagen->extension();
            //Se añade a la galería la imagen
            Galeria::create([
                'evento_id' => $request->evento_id,
                'imagen' => $filename
            ]);
            //Almacena la imagen en la carpeta users en /public/img/galerias
            $imagen-> move(public_path('img\\galerias'), $filename);
        }
        return redirect()->route('galerias.index')->with('success', 'Se registró correctamente');
    }

    public function show($id)
    {
        $galeria = Galeria::find($id);
        return view('galerias.ver', compact('galeria'));
    }

    public function edit(Galeria $galeria)
    {
        $eventos = Evento::all()->pluck('nombre_evento', 'id')->toArray();
        return view('galerias.editar', compact('galeria','eventos'));
    }

    public function update(UpdateRequest $request, Galeria $galeria)
    {
           //Almacenar foto_carnet
           if ($request->hasFile('imagen')) {
            $currentimagen = $galeria->imagen;
            //Obtiene los valores del archivo
            $file= $request->file('imagen');
            //Asigna un nombre aleatorio con la fecha de creación
            $filename= time().'.'.$file->extension();
            //Almacena el avatar en la carpeta users en /public/img/socios
            $file-> move(public_path('img\\galerias'), $filename);
            //Actualiza la información de la foto_carnet
            $galeria->update(['imagen' => $filename]);
            // Valida si existe imagen anterior y la elimina
            if ($currentimagen != '') {
                unlink(public_path('img\\galerias\\'.$currentimagen));
            }
        }
        return redirect()->route('galerias.index')->with('success', 'Se actualizó correctamente');
    }

    public function destroy($id)
    {
        $galeria = Galeria::find($id);
        $currentimagen = $galeria->imagen;
        $galeria->delete();
        // Valida si hay un valor en db
        if ($currentimagen != '') {
            // Valida si existe el archivo en la carpeta
            if (file_exists(public_path('img\\galerias\\'.$currentimagen))) {
                // Elimina el archivo de la carpeta
                unlink(public_path('img\\galerias\\'.$currentimagen));
            }
        }
        return redirect()->route('galerias.index')->with('success', 'Se eliminó correctamente');
    }

    public function datosGaleria()
    {
        $galerias = DB::table('galeria')
        ->join('eventos', 'galeria.evento_id', '=', 'eventos.id')
        ->select('galeria.id','galeria.imagen','eventos.nombre_evento')
        ->get();
        return $galerias;
    }
}
