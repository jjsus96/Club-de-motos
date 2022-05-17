<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoDetalle extends Model
{
    use HasFactory;

    protected $table = "eventos";
    protected $fillable = ['evento_id', 'usuario_id', 'acepta', 'rechaza'];
    protected $hidden = ['id'];

    public function obtenerEventodetalles()
    {
        return Eventodetalle::all();
    }

    public function obtenerEventodetalle($id)
    {
        return Eventodetalle::find($id);
    }
}
