<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cesi_escuela extends Model
{
    /** @use HasFactory<\Database\Factories\CesiEscuelaFactory> */
    use HasFactory;
    protected $fillable = ['escuela_nombre',
    'escuela_escolaridad',
    'escuela_latitud',
    'escuela_longitud',
    'escuela_logo',
    ];

    public function uis(){
        return $this->hasMany(cesi_ui::class);
    }

    public function salones(){
        return $this->hasMany(cesi_salon::class);
    }

    public function administradores()
    {
        return $this->belongsToMany(cesi_administrador::class, 'cesi_escuela_maestro');
    }

}
