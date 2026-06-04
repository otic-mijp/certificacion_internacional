<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


// Cambia la línea 12 por esta expresión Cron exacta:
Schedule::command('usuarios:eliminar-no-verificados')->cron('0 0 1 1,7 *');
