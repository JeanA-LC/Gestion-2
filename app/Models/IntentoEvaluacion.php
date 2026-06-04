<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IntentoEvaluacion extends Model
{
    protected $table = 'intento_evaluacion';
    protected $primaryKey = 'id_intento';
    public $timestamps = false;
    protected $guarded = [];

    public function postulacion()
    {
        return $this->belongsTo(PostulacionPersonero::class, 'id_postulacion');
    }

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class, 'id_evaluacion');
    }
}
