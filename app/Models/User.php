<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'nombres',
        'apellidos',
        'correo',
        'password',
        'telefono',
        'id_zona',
        'estado',
        'fecha_registro',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'estado' => 'boolean',
            'fecha_registro' => 'datetime',
            'password' => 'hashed',
        ];
    }

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
}