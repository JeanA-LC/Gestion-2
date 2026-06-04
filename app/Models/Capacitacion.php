<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    protected $table = 'capacitacion';
    protected $primaryKey = 'id_capacitacion';
    public $timestamps = false;
    protected $guarded = [];

    public function postulacionCapacitaciones()
    {
        return $this->hasMany(PostulacionCapacitacion::class, 'id_capacitacion');
    }
}
