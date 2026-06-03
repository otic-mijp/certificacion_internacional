<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\Usuario;
use Carbon\Carbon;

#[Signature('usuarios:eliminar-no-verificados')] 
#[Description('Elimina las cuentas de usuarios que no han verificado su correo después de 6 meses')]
class EliminarUsuariosNoVerificados extends Command
{
    /**
     * Ejecuta el comando de la consola.
     */
    public function handle()
    {
        try {
            // Volvemos a activar la fecha límite de 6 meses
            $fechaLimite = Carbon::now()->subMonths(6);

            // Buscamos usuarios creados hace más de 6 meses y sin verificar
            $usuariosParaEliminar = Usuario::whereNull('email_verified_at')
                ->where('created_at', '<', $fechaLimite);

            $cantidad = $usuariosParaEliminar->count();

            if ($cantidad === 0) {
                $this->info('No se encontraron usuarios sin verificar antiguos.');
                return Command::SUCCESS;
            }

            $usuariosParaEliminar->delete();
            $this->info("Se han eliminado {$cantidad} usuarios no verificados correctamente.");
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }

        return Command::SUCCESS;
    }
}
