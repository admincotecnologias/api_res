<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

/*
Artisan::command('alerta_semanal', function () {
    $date = \Carbon\Carbon::now();
    $users = \App\User::all();
    \Illuminate\Support\Facades\Mail::bcc($users)->send(new \App\Mail\TemplateMail($date));
})->describe('Ejecuta alerta mail');
*/

Artisan::command('crear_semana', function () {
    $monday = \Carbon\Carbon::now()->addDays(2);
    $friday = \Carbon\Carbon::parse($monday)->addDays(4);
    \App\Week::create([
        'start_date'=>$monday->toDateString(),
        'end_date'=>$friday->toDateString()
    ]);
})->describe('Ejecuta alerta mail');
