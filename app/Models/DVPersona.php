<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DVPersona extends Model
{
    protected $connection = 'pgsql_venezuela';
    protected $table = 't_persona';
}
