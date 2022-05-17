<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    use HasFactory;

    protected $table = "socios";
    protected $fillable = ['usuario_id', 'nombre_socio', 'apellidos', 'fecha_nacimiento', 'telefono' , 'direccion', 'padrino', 'motocicleta', 'foto_carnet'];
    protected $hidden = ['id'];

    public function obtenerSocios()
    {
        return Socio::all();
    }

    public function obtenerSocioPorId($id)
    {
        return Socio::find($id);
    }
}
