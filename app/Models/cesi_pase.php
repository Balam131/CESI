<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cesi_pase extends Model
{
    /** @use HasFactory<\Database\Factories\CesiPaseFactory> */
    use HasFactory;
    protected $fillable = ['pase_estatus',
    'cesi_alumno_id',
    'cesi_asistencia_id',
    ];


}
