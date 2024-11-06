<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cesi_responsable extends Model
{
    /** @use HasFactory<\Database\Factories\CesiResponsableFactory> */
    use HasFactory;

    protected $fillable = ['responsable_usuario',
    'responsable_contraseña',
    'responsable_nombre',
    'responsable_telefono',
    'responsable_foto',
    'responsable_activacion',
    'cesi_tutores_id',

    ];


    public function tutores(){
        return $this->belongsTo(cesi_tutores::class);
    }

    public function sesiones(){
        return $this->hasOne(cesi_sesion::class);
    }
}
