<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $table = "colaboradores";
    protected $fillable = ['nombre_colaborador', 'telefono_colaborador', 'email_colaborador'];
    // protected $hidden = ['id'];

    public function obtenerColaboradores()
    {
        return Colaborador::all();
    }

    public function obtenerColaboradorPorId($id)
    {
        return Colaborador::find($id);
    }
}
