<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cesi_alumno extends Model
{
    /** @use HasFactory<\Database\Factories\CesiAlumnoFactory> */
    use HasFactory;

    protected $fillable = ['alumno_nombre',
    'alumno_nacimiento',
    'alumno_foto',
    'cesi_salon_id',
    'cesi_tutores_id',
    ];


    public function salones(){
        return $this->belongsTo(cesi_salon::class);
    }

    public function tutores(){
        return $this->belongsTo(cesi_tutores::class);
    }

    public function recogidas(){
        return $this->belongsToMany(cesi_recogida::class);
    }

    public function notificaciones(){
        return $this->hasMany(cesi_notificaciones::class);
    }

    public function asistencias() {
        return $this->belongsToMany(cesi_asistencia::class);

    }
}

