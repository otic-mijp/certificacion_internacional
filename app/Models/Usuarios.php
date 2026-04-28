<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Tabla asociada al modelo.
     */
    protected $table = 'usuarios';

    /**
     * Los atributos que se pueden asignar masivamente.
     */
    protected $fillable = [
        'nombre',
        'correo_electronico',
        'contrasena',
    ];

    /**
     * Los atributos que deben ocultarse para la serialización.
     */
    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    /**
     * Atributos que deben ser convertidos.
     */
    protected function casts(): array
    {
        return [
            'verificacion_correo_en' => 'datetime',
            'contrasena' => 'hashed',
        ];
    }

    /**
     * Sobrescribir para decirle a Laravel que use 'contrasena' en lugar de 'password'.
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
}