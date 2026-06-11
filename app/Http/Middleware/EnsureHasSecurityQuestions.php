<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureHasSecurityQuestions
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (!$user || !$user->respuestasSeguridad()->exists()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Preguntas de seguridad no configuradas.'], 403);
            }

            return redirect()->route('usuario.preguntas')->with('error', 'Debe configurar sus preguntas de seguridad antes de crear una solicitud.');
        }

        return $next($request);
    }
}
