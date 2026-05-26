<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DVPais extends Model 
{
    protected $connection = 'recaudos';
    protected $table = 'n_pais';

    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $keyType = 'string'; 
}
