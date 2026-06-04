<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;
    protected $guarded = [];

    public function zona()
    {
        return $this->belongsTo(Zona::class, 'id_zona');
    }

    public function roles()
    {
        return $this->belongsToMany(
            Rol::class,
            'usuario_rol',
            'id_usuario',
            'id_rol'
        );
    }

    public function interesados()
    {
        return $this->hasMany(Interesado::class, 'id_usuario');
    }
}