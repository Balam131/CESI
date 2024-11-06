<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cesi_asistencia extends Model
{
    /** @use HasFactory<\Database\Factories\CesiAsistenciaFactory> */
    use HasFactory;
    protected $fillable = ['asistencia_fecha',
    'asistencia_hora',
    ];

    public function alumnos() {
        return $this->belongsToMany(cesi_alumno::class);

    }
}

