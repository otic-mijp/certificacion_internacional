<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreguntaSeguridad extends Model
{
    protected $table = 'preguntas_seguridad';
    protected $fillable = ['pregunta'];
}
