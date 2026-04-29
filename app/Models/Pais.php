<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{

    protected $table = 'paises';

    protected $fillable = [
        'nombre',
        'nombre_oficial',
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}
