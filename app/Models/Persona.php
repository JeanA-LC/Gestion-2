<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';
    protected $primaryKey = 'id_persona';
    public $timestamps = false;
    protected $guarded = [];

    public function interesado()
    {
        return $this->hasOne(Interesado::class, 'id_persona');
    }

    public function historialPolitico()
    {
        return $this->hasMany(HistorialActorPolitico::class, 'id_persona');
    }
}