<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cesi_ui extends Model
{
    /** @use HasFactory<\Database\Factories\CesiUiFactory> */
    use HasFactory;

    protected $fillable = ['ui_color1','ui_color2','ui_color3','cesi_escuela_id'];


    public function escuelas(){
        return $this->belongsTo(cesi_escuela::class);
    }
}
