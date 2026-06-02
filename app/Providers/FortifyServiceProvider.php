<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Usuario;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Fortify::registerView(function () {
            return view('auth.register.buscar_cedula');
        });

        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::verifyEmailView(function () {
            return view('auth.verify-email');
        });

        Fortify::authenticateUsing(function (\Illuminate\Http\Request $request) {

            $request->validate([
                Fortify::username() => 'required|string',
                'password' => 'required|string',
            ]);

            $user = Usuario::where(Fortify::username(), $request->{Fortify::username()})->first();

            if ($user && \Illuminate\Support\Facades\Hash::check($request->password, $user->contrasena)) {

                // 1. Obtenemos el tiempo de vida de la sesión en segundos (por defecto de config/session.php)
                // Convertimos los minutos a segundos. Ejemplo: 120 minutos = 7200 segundos.
                $sessionLifetimeInSeconds = config('session.lifetime') * 60;

                // 2. Calculamos el timestamp mínimo que se considera "activo"
                $activityThreshold = time() - $sessionLifetimeInSeconds;

                // 3. Contamos solo las sesiones cuya 'last_activity' sea mayor a ese umbral
                $activeSessions = \Illuminate\Support\Facades\DB::table('sesiones')
                    ->where('user_id', $user->id)
                    ->where('last_activity', '>=', $activityThreshold) // <-- FILTRO CRUCIAL
                    ->count();

                if ($activeSessions > 0) {
                    throw \Illuminate\Validation\ValidationException::withMessages([
                        Fortify::username() => ['Ya existe una sesión activa para este usuario en otro dispositivo. Por favor, cierre la sesión en el otro dispositivo antes de iniciar sesión aquí o espere a que expire.'],
                    ]);
                }

                // OPCIONAL: Si quieres limpiar la basura de la tabla de una vez
                \Illuminate\Support\Facades\DB::table('sesiones')
                    ->where('user_id', $user->id)
                    ->where('last_activity', '<', $activityThreshold)
                    ->delete();

                return $user;
            }

            return null;
        });

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
