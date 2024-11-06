<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cesi_maestro extends Model
{
    /** @use HasFactory<\Database\Factories\CesiMaestroFactory> */
    use HasFactory;

    protected $fillable = ['maestro_usuario',
    'maestro_contraseña',
    'maestro_nombre',
    'maestro_telefono',
    'maestro_foto',];

    public function salones(){
        return $this->hasOne(cesi_salon::class);
    }

    public function listas(){
        return $this->hasMany(cesi_lista::class);
    }

}
