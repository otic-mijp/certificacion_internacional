<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'correo_electronico',
        'contrasena',
        'pais_id',
        'estado_id',
        'municipio_id',
        'parroquia_id',
        'profesion_id',
    ];

    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'verificacion_correo_en' => 'datetime',
            'contrasena' => 'hashed',
        ];
    }

    /**
     * Usar 'contrasena' en lugar de 'password'.
     */
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    /**
     * IMPORTANTE: Decirle a Laravel que use 'correo_electronico' para notificaciones.
     */
    public function routeNotificationForMail($notification)
    {
        return $this->correo_electronico;
    }

    /**
     * Relación: El usuario pertenece a un País.
     */
    public function pais(): BelongsTo
    {
        return $this->belongsTo(Pais::class);
    }

    /**
     * Relación: El usuario pertenece a un Estado.
     */
    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    /**
     * Relación: El usuario pertenece a un Municipio.
     */
    public function municipio(): BelongsTo
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }

    /**
     * Relación: El usuario pertenece a una Parroquia.
     */
    public function parroquia(): BelongsTo
    {
        return $this->belongsTo(Parroquia::class, 'parroquia_id');
    }

    /**
     * Relación: El usuario pertenece a una Profesión.
     */
    public function profesion(): BelongsTo
    {
        return $this->belongsTo(Profesion::class, 'profesion_id');
    }
}
