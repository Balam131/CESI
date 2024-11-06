<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cesi_notificaciones extends Model
{
    /** @use HasFactory<\Database\Factories\CesiNotificacionesFactory> */
    use HasFactory;

    protected $fillable = ['notificaciones_mensaje',
    'notificaciones_prioridad',
    'notificaciones_tipo',
    'cesi_alumno_id',];

    public function alumnos(){
        return $this->belongsTo(cesi_alumno::class);
    }
}
