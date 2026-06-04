<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoActorPolitico extends Model
{
    protected $table = 'tipo_actor_politico';
    protected $primaryKey = 'id_tipo_actor';
    public $timestamps = false;
    protected $guarded = [];

    public function interesados()
    {
        return $this->hasMany(Interesado::class, 'id_tipo_actor');
    }

    public function historiales()
    {
        return $this->hasMany(HistorialActorPolitico::class, 'id_tipo_actor');
    }
}