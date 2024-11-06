<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    /** @use HasFactory<\Database\Factories\SalonFactory> */
    use HasFactory;
    protected $table = 'cesi_salons';
    protected $fillable = ['salon_grado',
    'salon_grupo',
    'cesi_escuela_id',
    'cesi_maestro_id',];


    public function maestros(){
        return $this->belongsTo(Maestro::class);
    }

    public function escuelas(){
        return $this->belongsTo(Escuela::class);
    }

    public function alumnos(){
        return $this->hasMany(Alumno::class);
    }
}
