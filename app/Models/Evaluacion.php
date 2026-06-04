<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = 'evaluacion';
    protected $primaryKey = 'id_evaluacion';
    public $timestamps = false;
    protected $guarded = [];

    public function intentos()
    {
        return $this->hasMany(IntentoEvaluacion::class, 'id_evaluacion');
    }
}
