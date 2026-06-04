<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialActorPolitico extends Model
{
    protected $table = 'historial_actor_politico';
    protected $primaryKey = 'id_historial';
    public $timestamps = false;
    protected $guarded = [];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }

    public function tipoActor()
    {
        return $this->belongsTo(TipoActorPolitico::class, 'id_tipo_actor');
    }
}