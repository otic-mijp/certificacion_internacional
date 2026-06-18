<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecaudoTramite extends Model
{
    protected $connection = 'pgsql_recaudos';
    protected $table = 'tramites';

    protected $fillable = [
        'id_correlativo',
        'cedula_titular',
        'nacionalidad',
        'nombres',
        'primer_apellido',
        'segundo_apellido',
        'pais_nombre_oficial',
        'tipo_solicitante',
        'tipo_titular',
        'apostilla',
        'id_motivo',
        'id_estatus',
        // 'id_descargas',
        'usuario',
        'id_diseno_tramite',
        'num_tramite',
        'id_persona',
        'correo',
    ];

    public function diseno(): BelongsTo
    {
        return $this->belongsTo(RecaudoDiseno::class, 'id_diseno_tramite');
    }

    public function motivo(): BelongsTo
    {
        return $this->belongsTo(RecaudoMotivo::class, 'id_motivo');
    }
}
