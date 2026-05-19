<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DVReo extends Model
{
    protected $connection = 'pgsql_venezuela';
    protected $table = 't_reo';
}
