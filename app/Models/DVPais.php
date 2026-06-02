<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DVPais extends Model 
{
    protected $connection = 'pgsql_recaudos';
    protected $table = 'n_pais';

    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $keyType = 'string'; 
}
