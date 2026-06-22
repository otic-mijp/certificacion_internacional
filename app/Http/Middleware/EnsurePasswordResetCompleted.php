<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsurePasswordResetCompleted
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->estatus_contrasena_reiniciada) {
            $allowedRoutes = [
                'usuario.clave.obligatoria',
                'usuario.clave.obligatoria.update',
            ];

            if ($request->route() && in_array($request->route()->getName(), $allowedRoutes, true)) {
                return $next($request);
            }

            return redirect()->route('usuario.clave.obligatoria');
        }

        return $next($request);
    }
}
