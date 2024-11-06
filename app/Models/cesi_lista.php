<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cesi_lista extends Model
{
    /** @use HasFactory<\Database\Factories\CesiListaFactory> */
    use HasFactory;
    protected $fillable = ['listas_pdf',
    'cesi_maestro_id'
    ];

    public function maestros(){
        return $this->belongsTo(cesi_maestro::class);
    }
}
