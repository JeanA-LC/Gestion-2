<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interesado extends Model
{
    protected $table = 'interesado';
    protected $primaryKey = 'id_interesado';
    public $timestamps = false;
    protected $guarded = [];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function tipoActor()
    {
        return $this->belongsTo(TipoActorPolitico::class, 'id_tipo_actor');
    }

    public function comite()
    {
        return $this->belongsTo(ComiteBase::class, 'id_comite');
    }

    public function postulacion()
    {
        return $this->hasOne(PostulacionPersonero::class, 'id_interesado');
    }

    public function participaciones()
    {
        return $this->hasMany(Participacion::class, 'id_interesado');
    }
}