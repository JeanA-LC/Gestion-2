<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkInvitacion extends Model
{
    protected $table = 'link_invitacion';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];

    public function coordinador()
    {
        return $this->belongsTo(Usuario::class, 'id_coordinador', 'id_usuario');
    }

    public function interesados()
    {
        return $this->hasMany(Interesado::class, 'id_link_invitacion');
    }

    public function getUrlAttribute(): string
    {
        return route('registro.show', $this->token);
    }
}
