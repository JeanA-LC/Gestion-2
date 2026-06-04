<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table = 'distrito';
    protected $primaryKey = 'id_distrito';
    public $timestamps = false;
    protected $guarded = [];

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'id_provincia');
    }

    public function zonas()
    {
        return $this->hasMany(Zona::class, 'id_distrito');
    }
}