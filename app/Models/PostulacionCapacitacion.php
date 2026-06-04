<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostulacionCapacitacion extends Model
{
    protected $table = 'postulacion_capacitacion';
    protected $primaryKey = 'id_postulacion_capacitacion';
    public $timestamps = false;
    protected $guarded = [];

    public function postulacion()
    {
        return $this->belongsTo(PostulacionPersonero::class, 'id_postulacion');
    }

    public function capacitacion()
    {
        return $this->belongsTo(Capacitacion::class, 'id_capacitacion');
    }
}
