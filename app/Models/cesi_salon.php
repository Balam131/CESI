<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cesi_salon extends Model
{
    /** @use HasFactory<\Database\Factories\CesiSalonFactory> */
    use HasFactory;
    protected $fillable = ['salon_grado',
    'salon_grupo',
    'cesi_escuela_id',
    'cesi_maestro_id',];


    public function maestros(){
        return $this->belongsTo(cesi_maestro::class);
    }

    public function escuelas(){
        return $this->belongsTo(cesi_escuela::class);
    }

    public function alumnos(){
        return $this->hasMany(cesi_alumno::class);
    }
}
