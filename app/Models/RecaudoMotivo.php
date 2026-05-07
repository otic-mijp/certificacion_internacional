<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecaudoMotivo extends Model
{
    protected $connection = 'pgsql_recaudos';
    protected $table = 'motivos_tramites';
}
