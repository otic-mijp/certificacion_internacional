<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecaudoTramite extends Model
{
    protected $connection = 'pgsql_recaudos';
    protected $table = 'tramites';

    protected $fillable = [
        'id_dato',
        'cedula_titular',
        'nacionalidad',
        'nombres',
        'primer_apellido',
        'segundo_apellido',
        'pais',
        'tipo_solicitante',
        'tipo_titular',
        'apostilla',
        'id_motivo',
        'id_estatus',
        'id_descargas',
        'id_diseno_tramite',
    ];
}
