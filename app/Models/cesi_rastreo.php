<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cesi_rastreo extends Model
{
    /** @use HasFactory<\Database\Factories\CesiRastreoFactory> */
    use HasFactory;
    protected $fillable = ['rastreo_longitud',
    'rastreo_latitud',
    'cesi_recogida_id',
    ];


    public function recogidas() {
        return $this->belongsTo(cesi_recogida::class);

    }
}
