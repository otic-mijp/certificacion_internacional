<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    protected $table = 'profesiones';

    protected $fillable = [
        'nombre',
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}
