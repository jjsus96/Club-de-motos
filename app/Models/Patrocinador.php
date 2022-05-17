<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrocinador extends Model
{
    use HasFactory;

    protected $table = "patrocinadores";
    protected $fillable = ['nombre_patrocinador', 'telefono_patrocinador', 'email_patrocinador'];
    protected $hidden = ['id'];

    public function obtenerPatrocinadores()
    {
        return Patrocinador::all();
    }

    public function obtenerPatrocinadorPorId($id)
    {
        return Patrocinador::find($id);
    }
}
