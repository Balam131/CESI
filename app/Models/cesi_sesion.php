<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cesi_sesion extends Model
{
    /** @use HasFactory<\Database\Factories\CesiSesionFactory> */
    use HasFactory;
    protected $fillable = ['sesion_estado',
    'sesion_inicio',
    'sesion_fin',
    'sesion_usuario',
    'cesi_responsable_id',
    ];

    public function responsables(){
        return $this->belongsTo(cesi_responsable::class);
    }


}
