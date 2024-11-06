<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cesi_administrador extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'administrador_usuario',
        'administrador_contraseña',
        'administrador_nombre',
        'administrador_telefono',
        'administrador_foto',
    ];

    public function escuelas()
    {
        return $this->belongsToMany(cesi_escuela::class, 'cesi_escuela_maestro');
    }

}
