<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Parroquia extends Model
{

    protected $table = 'parroquias';
    protected $fillable = ['nombre', 'estado_id'];


    public function municipio(): BelongsTo
    {
        return $this->belongsTo(Municipio::class);
    }
}
