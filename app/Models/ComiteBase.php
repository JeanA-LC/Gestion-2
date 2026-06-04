<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComiteBase extends Model
{
    protected $table = 'comite_base';
    protected $primaryKey = 'id_comite';
    public $timestamps = false;
    protected $guarded = [];

    public function zona()
    {
        return $this->belongsTo(Zona::class, 'id_zona');
    }

    public function interesados()
    {
        return $this->hasMany(Interesado::class, 'id_comite');
    }
}