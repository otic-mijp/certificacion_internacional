<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\TramiteProcesado;
use App\Mail\CorreoSolicitudAntecedente;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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
            Log::error("Falla en segundo plano al procesar CorreoSolicitudAntecedente para el trámite {$event->tramite->num_tramite}", [
                'error' => $e->getMessage(),
                'line'  => $e->getLine()
            ]);

            // Reclama el Job para volverlo a intentar en 15 segundos si no ha superado el límite ($tries)
            $this->release(15);
        }
    }
}
