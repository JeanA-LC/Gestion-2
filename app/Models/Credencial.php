<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credencial extends Model
{
    protected $table = 'credencial';
    protected $primaryKey = 'id_credencial';
    public $timestamps = false;
    protected $guarded = [];

    public function postulacion()
    {
        return $this->belongsTo(PostulacionPersonero::class, 'id_postulacion');
    }
}
