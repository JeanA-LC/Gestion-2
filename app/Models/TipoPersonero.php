<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPersonero extends Model
{
    protected $table = 'tipo_personero';
    protected $primaryKey = 'id_tipo_personero';
    public $timestamps = false;
    protected $guarded = [];

    public function asignaciones()
    {
        return $this->hasMany(AsignacionPersonero::class, 'id_tipo_personero');
    }
}
