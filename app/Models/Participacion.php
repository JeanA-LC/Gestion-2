<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participacion extends Model
{
    protected $table='participacion';
    protected $primaryKey='id_participacion';
    public $timestamps=false;
    protected $guarded=[];

    public function interesado()
    {
        return $this->belongsTo(Interesado::class,'id_interesado');
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class,'id_evento');
    }
}
