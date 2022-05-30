<?php

namespace App\Http\Controllers;

use App\Http\Requests\Socio\StoreRequest;
use App\Http\Requests\Socio\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Socio;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SocioController extends Controller
{
    protected $socios;

    public function __construct(Socio $socios)
    {
        $this->socios = $socios;
    }

    public function index()
    {
        $socios = $this->socios->obtenerSocios();
        return view('socios.lista', ['socios' => $socios]);
    }

    public function create()
    {
        $users = User::all()->pluck('name', 'id')->toArray();
        return view('socios.crear', compact('users'));
    }

    public function store(StoreRequest $request)
    {
       $socio = Socio::create([
        'usuario_id' => $request->usuario_id,
        'nombre_socio' => ucwords($request->nombre_socio),
        'apellidos' => ucwords($request->apellidos),
        'fecha_nacimiento' => $request->fecha_nacimiento,
        'telefono' => $request->telefono,
        'direccion' => ucwords($request->direccion),
        'padrino' => ucwords($request->padrino),
        'motocicleta' => ucwords($request->motocicleta)
       ]);
       //Almacenar foto_carnet
       if ($request->hasFile('foto_carnet')) {
        //Obtiene los valores del archivo
        $file= $request->file('foto_carnet');
        //Asigna un nombre aleatorio con la fecha de creación
        $filename= time().'.'.$file->extension();
        //Almacena el avatar en la carpeta users en /public/img/socios
        $file-> move(public_path('img\\socios'), $filename);
        //Actualiza la información de la foto_carnet
        $socio->update(['foto_carnet' => $filename]);
    }
        return redirect()->route('socios.index')->with('success', 'Se registró correctamente');
    }

    public function show($id)
    {
        $socio = Socio::find($id);
        return view('socios.ver', compact('socio'));
    }

    public function edit(Socio $socio)
    {
        $users = User::all()->pluck('name', 'id')->toArray();
        return view('socios.editar', compact('socio', 'users'));
    }

    public function update(UpdateRequest $request, Socio $socio)
    {
        $socio->update([
            'usuario_id' => $request->usuario_id,
            'nombre_socio' => ucwords($request->nombre_socio),
            'apellidos' => ucwords($request->apellidos),
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono' => $request->telefono,
            'direccion' => ucwords($request->direccion),
            'padrino' => ucwords($request->padrino),
            'motocicleta' => ucwords($request->motocicleta)
           ]);
           //Almacenar foto_carnet
           if ($request->hasFile('foto_carnet')) {
            $currentImage = $socio->foto_carnet;
            //Obtiene los valores del archivo
            $file= $request->file('foto_carnet');
            //Asigna un nombre aleatorio con la fecha de creación
            $filename= time().'.'.$file->extension();
            //Almacena el avatar en la carpeta users en /public/img/socios
            $file-> move(public_path('img\\socios'), $filename);
            //Actualiza la información de la foto_carnet
            $socio->update(['foto_carnet' => $filename]);
            // Valida si existe imagen anterior y la elimina
            if ($currentImage != '') {
                unlink(public_path('img\\socios\\'.$currentImage));
            }
        }
        return redirect()->route('socios.index')->with('success', 'Se actualizó correctamente');
    }

    public function destroy($id)
    {
        $socio = Socio::find($id);
        $currentImage = $socio->foto_carnet;
        $socio->delete();
        // Valida si hay un valor en db
        if ($currentImage != '') {
            // Valida si existe el archivo en la carpeta
            if (file_exists(public_path('img\\socios\\'.$currentImage))) {
                // Elimina el archivo de la carpeta
                unlink(public_path('img\\socios\\'.$currentImage));
            }
        }
        return redirect()->route('socios.index')->with('success', 'Se eliminó correctamente');
    }

    public function vistaSocio()
    {
        return view('socio');
    }

    public function datosSocio()
    {
        $socios = DB::table('socios')
        ->select('id', 'nombre_socio', 'foto_carnet')
        ->where('estado', '=', 'activo')
        ->get();
        return $socios;
    }

    public function estado(Request $request, $id)
    {
        $socio = Socio::find($id);
        //dd($socio);
        $socio->update([
            'estado' => $socio->estado == 'inactivo' ? 'activo' : 'inactivo'
        ]);
        //dd($socio);
        return redirect()->route('socios.index')->with('success', 'Se Activo/Desactivo el socio!');
    }
}
