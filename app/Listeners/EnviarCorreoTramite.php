<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\TramiteProcesado;
use App\Mail\CorreoSolicitudAntecedente;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Throwable; // Importamos Throwable para el método failed

class EnviarCorreoTramite implements ShouldQueue
{
    use InteractsWithQueue;

    public string $queue = 'emails';

    public int $tries = 3;

    public function __construct()
    {
        //
    }

    /**
     * Procesa el evento de manera estrictamente asíncrona.
     */
    public function handle(TramiteProcesado $event): void
    {
        try {
            $tramite = $event->tramite;
            $persona = $event->persona;

            $numTramite = (string) $tramite->num_tramite;

            // Fallback en caso de que el país no venga definido en el modelo
            $paisNombreOficial = (string) ($tramite->pais_nombre_oficial ?? 'País no especificado');

            // Construir el nombre completo combinando campos del modelo o usando el array $persona
            $nombreCompleto = $persona['nombre'] ?? trim(($tramite->nombres ?? '') . ' ' . ($tramite->primer_apellido ?? ''));

            // 2. Extraer la dirección de correo destinatario
            $correoDestino = $tramite->correo ?? $persona['email'] ?? $persona['correo'] ?? null;

            // Contingencia: Si no viene en el payload, intentar recuperar desde el usuario autenticado
            if (!$correoDestino && auth()->check()) {
                $correoDestino = auth()->user()->email;
            }

            // Si a pesar de los esfuerzos no hay correo, registramos un Warning en logs y abortamos de forma segura
            if (!$correoDestino) {
                Log::warning("Cola asíncrona abortada para Trámite N° {$numTramite}: No se localizó una dirección de correo válida.");
                return;
            }

            // 3. Despachar tu clase original inyectando los parámetros en el orden requerido
            Mail::to($correoDestino)->send(
                new CorreoSolicitudAntecedente($numTramite, $paisNombreOficial, $nombreCompleto)
            );

        } catch (\Exception $e) {
            // Nota: Cambiamos a Log::warning aquí porque es un intento fallido, pero aún se va a reintentar
            Log::warning("Intento fallido en segundo plano para enviar correo del trámite {$event->tramite->num_tramite}. Reintentando en 15s...", [
                'intento' => $this->attempts(),
                'error'   => $e->getMessage()
            ]);

            // Si todavía nos quedan intentos disponibles, lo volvemos a encolar
            if ($this->attempts() < $this->tries) {
                $this->release(15);
            } else {
                // Si ya fue el último intento, dejamos que la excepción fluya para que Laravel invoque el método failed()
                throw $e;
            }
        }
    }

    /**
     * Este método se ejecuta AUTOMÁTICAMENTE cuando el trabajo agota todos sus reintentos ($tries = 3)
     * Aquí es donde registramos que el correo DEFINITIVAMENTE no se llegó a mostrar/enviar.
     */
    public function failed(TramiteProcesado $event, Throwable $exception): void
    {
        Log::error("CRÍTICO: El correo del trámite Nro: {$event->tramite->num_tramite} NO se llegó a enviar tras {$this->tries} intentos.", [
            'tramite_id' => $event->tramite->id,
            'correo'     => $event->tramite->correo,
            'error'      => $exception->getMessage(),
            'file'       => $exception->getFile(),
            'line'       => $exception->getLine()
        ]);
    }
}