<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CentroVotacion extends Model
{
    protected $table = 'centro_votacion';
    protected $primaryKey = 'id_centro_votacion';
    public $timestamps = false;
    protected $guarded = [];

    public function zona()
    {
        return $this->belongsTo(Zona::class, 'id_zona');
    }

    public function mesas()
    {
        return $this->hasMany(MesaSufragio::class, 'id_centro_votacion');
    }
}
