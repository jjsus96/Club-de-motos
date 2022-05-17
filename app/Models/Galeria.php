<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    use HasFactory;

    protected $table = "galeria";
    protected $fillable = ['evento_id', 'imagen'];
    protected $hidden = ['id'];

    public function obtenerGalerias()
    {
        return Galeria::all();
    }

    public function obtenerGaleriaPorId($id)
    {
        return Galeria::find($id);
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
