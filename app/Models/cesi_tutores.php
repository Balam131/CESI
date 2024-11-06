<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cesi_tutores extends Model
{
    /** @use HasFactory<\Database\Factories\CesiTutoresFactory> */
    use HasFactory;


    protected $fillable = [ 'tutor_usuario',
    'tutor_contraseña',
    'tutor_nombre',
    'tutor_telefono',
    'tutor_foto',
    ];

    public function alumnos(){
        return $this->hasMany(cesi_alumno::class);
    }
    public function responsables(){
        return $this->hasMany(cesi_responsable::class);
    }
    public function reportes(){
        return $this->hasMany(cesi_reporte::class);
    }
}
