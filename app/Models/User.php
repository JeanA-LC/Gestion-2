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
        'remember_token',
    ];

    // La tabla 'usuario' no tiene columna remember_token
    protected $rememberTokenName = false;

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

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona', 'id_persona');
    }

    public function linksInvitacion()
    {
        return $this->hasMany(LinkInvitacion::class, 'id_coordinador', 'id_usuario');
    }

    // Acceso directo: usuario → persona → interesado → postulacion → asignaciones
    public function asignaciones()
    {
        return $this->hasManyThrough(
            AsignacionPersonero::class,
            PostulacionPersonero::class,
            'id_interesado',   // FK en postulacion → interesado
            'id_postulacion',  // FK en asignacion → postulacion
            'id_usuario',      // PK de usuario
            'id_postulacion'
        );
    }

    /** Helpers de rol */
    public function hasRole(string $role): bool
    {
        return $this->roles->contains('nombre', $role);
    }

    public function hasAnyRole(array $roles): bool
    {
        return $this->roles->whereIn('nombre', $roles)->isNotEmpty();
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