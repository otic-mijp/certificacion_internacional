<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecaudoDiseno extends Model
{
    protected $connection = 'pgsql_recaudos';
    protected $table = 'disenos_tramites';
}
