<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table='evento';
    protected $primaryKey='id_evento';
    public $timestamps=false;
    protected $guarded=[];

    public function tipoEvento()
    {
        return $this->belongsTo(TipoEvento::class,'id_tipo_evento');
    }

    public function participaciones()
    {
        return $this->hasMany(Participacion::class,'id_evento');
    }
}
