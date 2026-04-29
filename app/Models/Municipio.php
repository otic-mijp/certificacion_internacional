<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';

    protected $fillable = [
        'nombre',
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function parroquias()
    {
        return $this->hasMany(Parroquia::class);
    }
}
