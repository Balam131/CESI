<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    /** @use HasFactory<\Database\Factories\TutorFactory> */
    use HasFactory;

    protected $table = 'cesi_tutores';
    protected $fillable = [ 'tutor_usuario',
    'tutor_contraseña',
    'tutor_nombre',
    'tutor_telefono',
    'tutor_foto',
    ];

    public function alumnos(){
        return $this->hasMany(Alumno::class);
    }
    public function responsables(){
        return $this->hasMany(Responsable::class);
    }
    public function reportes(){
        return $this->hasMany(Reporte::class);
    }
}
