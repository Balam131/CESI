<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cesi_recogida extends Model
{
    /** @use HasFactory<\Database\Factories\CesiRecogidaFactory> */
    use HasFactory;

    protected $fillable = ['recogida_fecha',
    'recogida_observaciones',
    'recogida_estatus',
    ];


    protected function alumnos(){
        return $this->belongsToMany(cesi_alumno::class);
    }
}
