<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table = 'zona';
    protected $primaryKey = 'id_zona';
    public $timestamps = false;
    protected $guarded = [];

    public function distrito()
    {
        return $this->belongsTo(Distrito::class, 'id_distrito');
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_zona');
    }

    public function comites()
    {
        return $this->hasMany(ComiteBase::class, 'id_zona');
    }

    public function centrosVotacion()
    {
        return $this->hasMany(CentroVotacion::class, 'id_zona');
    }
}