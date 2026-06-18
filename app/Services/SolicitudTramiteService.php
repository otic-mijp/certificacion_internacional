<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\DVReo;
use App\Models\DVPais;
use App\Models\RecaudoDiseno;
use App\Models\RecaudoTramite;
use App\Events\TramiteProcesado;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class SolicitudTramiteService
{
    private const ESTATUS_APROBADO = 2;
    private const ESTATUS_RECHAZADO = 3;
    private const MOTIVO_PRODUCCION_RECHAZO = 9;

    public function procesarSolicitud(array $persona, array $data): RecaudoTramite
    {
        $idPersona = (string) $persona['id_persona'];
        $cedula    = (int) $persona['numero_cedula'];

        $this->validarMayoriaEdad($persona['fecha_nacimiento']);
        $this->validarLimitesTramites($idPersona);

        $tieneAntecedentes = DVReo::where('id_reo', $idPersona)->exists();

        $diseno = RecaudoDiseno::where('estado', true)->firstOrFail();
        $titular = (Str::lower($persona['letra_cedula']) === 'v') ? 'CIUDADANO MAYOR DE EDAD' : 'CIUDADANO EXTRANJERO';

        return DB::transaction(function () use ($persona, $data, $tieneAntecedentes, $diseno, $titular, $idPersona, $cedula) {

            $tramite = new RecaudoTramite();
            $tramite->cedula_titular   = $cedula;
            $tramite->nacionalidad     = Str::upper($persona['letra_cedula']);
            $tramite->nombres          = Str::lower($persona['nombres']);
            $tramite->primer_apellido  = Str::lower($persona['primer_apellido']);
            $tramite->segundo_apellido = Str::lower($persona['segundo_apellido']);
            $tramite->tipo_solicitante = 1; // Canal Web Obligatorio
            $tramite->tipo_titular     = $titular;
            $tramite->usuario          = 'Web';
            $tramite->id_diseno_tramite = $diseno->id;
            $tramite->id_persona       = $idPersona;
            $tramite->correo           = auth()->user()->email;

            if ($tieneAntecedentes) {

                $tramite->id_motivo           = self::MOTIVO_PRODUCCION_RECHAZO;
                $tramite->pais_nombre_oficial = 'asignación rechazada';
                $tramite->id_estatus          = self::ESTATUS_RECHAZADO;
                $tramite->apostilla           = false;
            } else {

                $pais = DVPais::where('id', $data['pais'])->firstOrFail();
                $tramite->id_motivo           = $data['motivo'];
                $tramite->pais_nombre_oficial = Str::lower($pais->nombre_oficial);
                $tramite->id_estatus          = self::ESTATUS_APROBADO;
                $tramite->apostilla           = filter_var($data['desea_apostillar'] ?? false, FILTER_VALIDATE_BOOLEAN);
            }

            $tramite->save();

            $anio = Carbon::now()->year;
            $tramite->num_tramite = "102{$anio}{$tramite->id}";
            $tramite->save();

            event(new TramiteProcesado($tramite, $persona));

            return $tramite;
        });
    }

    private function validarMayoriaEdad(?string $fechaNacimiento): void
    {
        if (!$fechaNacimiento || Carbon::parse($fechaNacimiento)->age < 18) {
            throw ValidationException::withMessages([
                'error' => 'Lo sentimos, este trámite solo está disponible para personas mayores de edad (18 años o más).'
            ]);
        }
    }

    private function validarLimitesTramites(string $idPersona): void
    {
        $ahora = Carbon::now();

        $conteos = RecaudoTramite::where('id_persona', $idPersona)
            ->selectRaw("
                COUNT(CASE WHEN created_at::date = ? THEN 1 END) as hoy,
                COUNT(CASE WHEN EXTRACT(YEAR FROM created_at) = ? AND EXTRACT(MONTH FROM created_at) = ? THEN 1 END) as mes,
                COUNT(CASE WHEN EXTRACT(YEAR FROM created_at) = ? THEN 1 END) as anio
            ", [$ahora->toDateString(), $ahora->year, $ahora->month, $ahora->year])
            ->first();

        if (($conteos->hoy ?? 0) >= 1) {
            throw ValidationException::withMessages([
                'error' => 'Ya has realizado un trámite el día de hoy. Solo se permite un (1) trámite por día.'
            ]);
        }

        if (($conteos->mes ?? 0) >= 3) {
            throw ValidationException::withMessages([
                'error' => 'Has alcanzado el límite máximo de 3 trámites para este mes.'
            ]);
        }

        if (($conteos->anio ?? 0) >= 10) {
            throw ValidationException::withMessages([
                'error' => 'Has alcanzado el límite máximo de 10 trámites para este año.'
            ]);
        }
    }
}
