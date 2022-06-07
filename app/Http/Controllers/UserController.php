<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        $users = User::all();
        return view('users.lista', compact('users'));
    }

    public function create()
    {
        $roles = Role::all()->pluck('name', 'id')->toArray();
        return view('users.crear', compact('roles'));
    }

    public function store(StoreRequest $request)
    {
        $rol = Role::findById($request->role_id);
        $user = User::create([
            'name' => ucwords($request->name),
            'email' => mb_strtolower($request->email),
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);
        //asigna el rol al usuario
        $user->assignRole($rol->name);
        //Almacenar avatar
        if ($request->hasFile('avatar')) {
            //Obtiene los valores del archivo
            $file = $request->file('avatar');
            //Asigna un nombre aleatorio con la fecha de creación
            $filename = time() . '.' . $file->extension();
            //Almacena el avatar en la carpeta users en /public/img/users
            $file->move(public_path('img\\users'), $filename);
            //Actualiza la información del avatar
            $user->update(['avatar' => $filename]);
        }
        return redirect()->route('users.index')->with('success', 'Se registró correctamente');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.ver', compact('user'));
    }

    public function edit($id)
    {
        $roles = Role::all()->pluck('name', 'id')->toArray();
        $user = User::find($id);
        return view('users.editar', compact('user', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $rol = Role::findById($request->role_id);
        $user->update([
            'name' => ucwords($request->name),
            'email' => mb_strtolower($request->email),
            'role_id' => $request->role_id,
        ]);
        // En caso que tenga datos el password
        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }
        $user->syncRoles($rol->name);
        //Almacenar avatar
        if ($request->hasFile('avatar')) {
            $currentAvatar = $user->avatar;
            //Obtiene los valores del archivo
            $file = $request->file('avatar');
            //Asigna un nombre aleatorio con la fecha de creación
            $filename = time() . '.' . $file->extension();
            //Almacena el avatar en la carpeta users en /public/img/users
            $file->move(public_path('img\\users'), $filename);
            //Actualiza la información del avatar
            $user->update(['avatar' => $filename]);
            // Valida si existe imagen anterior y la elimina
            if ($currentAvatar != '') {
                unlink(public_path('img\\users\\' . $currentAvatar));
            }
        }
        return redirect()->route('users.index')->with('success', 'Se actualizó correctamente');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $currentAvatar = $user->avatar;
        $user->delete();
        // Valida si hay un valor en db
        if ($currentAvatar != '') {
            // Valida si existe el archivo en la carpeta
            if (file_exists(public_path('img\\users\\' . $currentAvatar))) {
                // Elimina el archivo de la carpeta
                unlink(public_path('img\\users\\' . $currentAvatar));
            }
        }
        return redirect()->route('users.index')->with('success', 'Se eliminó correctamente');
    }
}
