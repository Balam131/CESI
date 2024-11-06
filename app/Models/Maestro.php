<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    /** @use HasFactory<\Database\Factories\MaestroFactory> */
    use HasFactory;

    protected $table = 'cesi_maestros';
    protected $fillable = ['maestro_usuario',
    'maestro_contraseña',
    'maestro_nombre',
    'maestro_telefono',
    'maestro_foto',];

    public function salones(){
        return $this->hasOne(Salon::class);
    }

    public function listas(){
        return $this->hasMany(Lista::class);
    }
}
