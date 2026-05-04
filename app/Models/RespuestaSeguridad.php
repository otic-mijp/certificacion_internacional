<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RespuestaSeguridad extends Model
{
    protected $table = 'respuestas_seguridad';
    protected $fillable = ['user_id', 'pregunta_seguridad_id', 'respuesta'];

    public function pregunta()
    {
        return $this->belongsTo(PreguntaSeguridad::class, 'pregunta_seguridad_id');
    }
}
