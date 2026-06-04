<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MesaSufragio extends Model
{
    protected $table = 'mesa_sufragio';
    protected $primaryKey = 'id_mesa';
    public $timestamps = false;
    protected $guarded = [];

    public function centroVotacion()
    {
        return $this->belongsTo(CentroVotacion::class, 'id_centro_votacion');
    }
}
