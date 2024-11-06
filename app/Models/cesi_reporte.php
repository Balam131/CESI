<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cesi_reporte extends Model
{
    /** @use HasFactory<\Database\Factories\CesiReporteFactory> */
    use HasFactory;
    protected $fillable = ['reporte_pdf',
    'cesi_tutores_id',
    ];


    public function tutores(){
        return $this->belongsTo(cesi_tutores::class);
    }
}
