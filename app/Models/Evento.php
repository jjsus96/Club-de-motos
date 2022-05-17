<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = "eventos";
    protected $fillable = ['nombre_evento', 'fecha_inicio', 'cartel', 'colaborador_id', 'patrocinador_id', 'descripcion'];
    protected $hidden = ['id'];

    public function obtenerEventos()
    {
        return Evento::all();
    }

    public function obtenerEventoPorId($id)
    {
        return Evento::find($id);
    }

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }

    public function patrocinador()
    {
        return $this->belongsTo(Patrocinador::class);
    }
}
